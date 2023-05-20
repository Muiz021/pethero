<?php

namespace App\Http\Controllers\back;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('roles','member')->get();
        return view('admin.pages.user.index',['user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::where('roles','member')->where('id',$id)->first();
        $user->delete();
        return redirect()->route('user.index');

    }
}
