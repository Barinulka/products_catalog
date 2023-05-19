<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() 
    {

        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user) 
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user) 
    {

        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = 0;

        if ($request->is_admin) {
            $user->is_admin = 1;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Пользователь успешно обновлен');
        
    }

     
    public function destroy(int $id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'Пользователь удален');
    }
}
