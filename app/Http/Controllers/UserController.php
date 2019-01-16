<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	return view('users.profil');
    }


    public function edit(User $user)
    {
        return view('users.sementara', compact('user'));
    }

    public function create()
    {
        return view('users.sementara');
    }

    
}
