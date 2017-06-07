<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Social;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Request $request)
    {
        try {
            $authUser = Socialite::driver($provider)->user();
        } catch (\Exception $error) {
            return redirect()->route('login');
        }
        $user = $this->findOrCreateUser($authUser, $provider);
        if (!$user) {
            return redirect()->route('login')->with(['fail' => trans('layout.msg.login-fail')]);
        }
        Auth::login($user);

        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        if (!$user->getEmail()) {
            $social = Social::where('provider_id', $user->getId())->first();
            if ($social) {
                return $social->user;
            }
        }

        DB::beginTransaction();
        try {
            $newUser = User::firstOrCreate([
                'email' => $user->getEmail() ?: '',
            ], [
                'name' => $user->getName(),
                'avatar' => $user->getAvatar(),
            ]);

            $newUser->socials()->firstOrCreate([
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ]);
            DB::commit();

            return $newUser;
        } catch (\Exception $e) {
            DB::rollback();

            return false;
        }
    }
}
