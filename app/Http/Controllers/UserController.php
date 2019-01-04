<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UserController extends Controller
{
     public function index()
    {

    	return view('Users.editprofile');
    }

    public function update(Request $request )
    {
    	$request->file('avatar')->store('avatars');

    	$request->user()->update([
    		'nama' => $nama,
    		'avatar' => $avatar
    	]);
    }
}
