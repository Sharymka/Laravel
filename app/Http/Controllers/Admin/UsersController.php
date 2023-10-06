<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\Edit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index(Request $request) {

        $users =User::all();
        return view('admin.users.index')->with(['users' => $users, 'request' => $request ]);
    }

    public function edit(Request $request , $userId) {

        $user = User::find($userId);
        return view('admin.users.edit')
            ->with([
                'user' => $user,
                'request'=> $request
            ]);

//        $user = User::find($userId);
//
//        if($user->name == 'Admin') {
//            return back()->with('error', 'Нельзя менять роль у пользователя admin');
//        }
//
//        $user->is_admin? $user->is_admin = 0: $user->is_admin = 1;
//
//        if($user->save()) {
//            return back()->with('success', 'Запись успешно сохранена');
//        }
//
//        return back()->with('error', 'Не удалось добавить запись');
    }

    public function update(Edit $request, User $user) {

        $data = $request->only(['name', 'email', 'is_admin']);
        dump($data);

        $user->fill($data);
        $user->save();

        if($user->save()) {
            return redirect()->route('admin.users.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    public function destroy(User $user) {
        try{
            $user->delete();

            return response()->json('ok');

        }catch(\Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
