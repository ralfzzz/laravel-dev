<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title' => 'Register',
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
        'name' => 'required|min:2|max:255',
        'username' => 'required|min:6|unique:users|max:255',
        'email' => 'required|email:rfc,dns|unique:users|max:255',
        'password' => 'required|max:255|min:8',
        ]);

        // dd($request);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        // $request->session()->flash('success', 'Registration was successful!');

        return redirect('/login')->with('success', 'Registration was successful!');


    }
}
