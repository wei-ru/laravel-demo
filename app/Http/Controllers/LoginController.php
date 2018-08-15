<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login() {
        return view('login');
    }

    public function store(Request $request) {
        $data = $this->validate($request, [
            'email'=>'email|required',
            'password'=>'required|min:5' 
        ]);

        if(\Auth::attempt($data)) {
            session()->flash('success', 'Log in success!');
            return redirect('/');
        } 

        session()->flash('danger', 'account/password is wrong!');
        return back();
    }

    public function logout() {
        \Auth::logout();
        session()->flash('success', 'Logout');
        return redirect('/');
    }
}
