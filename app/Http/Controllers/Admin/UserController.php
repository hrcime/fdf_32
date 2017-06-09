<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\CreateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(CreateUserRequest $request)
    {
        $input = $request->only([
            'name',
            'email',
            'password',
            'phone',
            'address',
            'is_admin',
            'avatar',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $input['avatar'] = Helper::upload($file, 'avatar');
        }
        User::create($input);

        return redirect()->route('admin.user.create')->with(['success' => trans('layout.user.msg-created')]);
    }

    public function edit($id)
    {
        try {
            $user = User::find($id);
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index');
        }

        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::find($id);
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index');
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $user->avatar = Helper::upload($file, 'avatar', $user->avatar);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email') ?: '';
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->is_admin = $request->input('is_admin');
        if (!empty($request->input('password'))) {
            $user->password = $request->input('password');
        }
        $user->save();

        return redirect()->route('admin.user.edit', $id)->with(['success' => trans('layout.user.msg-updated')]);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.user.index')->with(['success' => trans('layout.user.msg-deleted')]);
    }
}
