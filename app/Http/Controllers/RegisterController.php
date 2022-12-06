<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function index() {

        return view('Register.index');
    }

     

    public function store(request $request) {

    
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]); 

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData); 
 
        return redirect('/')->with('success', 'Registration Successful ! Please Login');
        




    }
}
