<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\Edit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();

        $users = User::where('id', '!=', Auth::id())->get();

        return view('admin.users.index')->with(['users' => $users, 'request' => $request]);
    }

    public function edit(Request $request, $userId)
    {
        $user = User::find($userId);

        return view('admin.users.edit')
            ->with([
                'user' => $user,
                'request' => $request
            ]);
    }

    public function update(Edit $request, $userId)
    {
        $user = User::find($userId);

        $request->flash();

        $errors = [];

        if (Hash::check($request->post('password'), $user->password)) {
            dump('yes');
            $user->fill([
                'name' => $request->post('name'),
                'password' => Hash::make($request->post('newPassword')),
                'email' => $request->post('email'),
                'is_admin' => ($request->post('is_admin') == 'admin') ?? false
            ]);
            $user->save();

            Session::flash('success', 'Запись успешно сохранена');

            return redirect()->route('admin.users.index');
        } else {
            $errors['password'][] = 'Введен неверный текущий пароль';
        }

        Session::flash('danger', 'Не удалось добавить запись');

        return back()->withErrors($errors);
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return response()->json('ok');
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());

            return response()->json('error', 400);
        }
    }

    public function toggleAdmin(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();

            Session::flash('success', 'Права изменены');
        } else {
            Session::flash('error', 'Нельзя снять админа с себя');
        }

        return redirect()->route('admin.users.index');
    }
}
