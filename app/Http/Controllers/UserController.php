<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function editUser(Request $request){
       
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return to_route('users.index');
    }
    public function loadUsers(){
        $user = auth()->user();
        $users = User::where('id','!=', $user->id)->get();
        return Inertia::render('Users/Users',['user' => $user,'users' => $users]);
    }

    public function loadEditForm($user_id){
        $user = auth()->user();
        $userDetails = User::find($user_id);
        return Inertia::render('Users/EditForm',['user' => $user,'user_details' => $userDetails]);
    }

    public function deleteUser($user_id){
        $user = User::find($user_id);

        $user->delete();

        return to_route('users.index');

    }
}
