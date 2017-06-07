<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function show()
    {
        return view('user.profile');
    }

    public function update(UpdateUserRequest $request)
    {
        try {
            $user = User::find(Auth::user()->id);
        } catch (\Exception $e) {
            return redirect()->route('user.show');
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $user->avatar = Helper::upload($file, 'avatar', $user->avatar);
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return back()->with(['success' => trans('layout.user.msg-updated')]);
    }

    public function showFormPassword()
    {
        return view('user.password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        if (empty(Auth::user()->password)) {
            $user->password = $request->new_password;
            $user->save();

            return redirect()->route('user.password')->with(['success' => trans('layout.user.msg-updated')]);
        }

        if (Auth::user()->password && Hash::check($request->currentPassword, Auth::user()->password)) {
            $user->password = $request->new_password;
            $user->save();

            return redirect()->route('user.password')->with(['success' => trans('layout.user.msg-updated')]);
        }

        return redirect()->route('user.password')->with(['warning' => trans('layout.user.msg-old-password')]);
    }
}
