<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('index');
    }

    public function lista(){
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function delete($id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        $user->delete();
        return redirect()->route('users.index');
    }
}
