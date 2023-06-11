<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
       return view('users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:5']
         ]);

         $formFields['password'] = bcrypt( $formFields['password']);
         $user = User::create($formFields);
         auth()->login($user);
         return redirect('/')->with('message', 'User created successfully!');
     }

     public function logout(Request $request){
       auth()->logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/')->with('message', 'User logged out successfully!');
     }

     public function login(){
        return view('users.login');
     }

     public function userauth(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'User logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
     }
}
