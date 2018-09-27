<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Employee;
use App\User;

class AuthController extends Controller
{
    public function getLogin(){
        
        return view('Backend.pages.auth.login',[
                'pageTitle' => 'Login Administrator'
            ]);
    }

    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required|max:100',
            'password' => 'required|max:255'
        ]);

        $credentials =[
            'username' => $request->username,
            'password' => $request->password
        ];

        if(!auth()->guard('backend')->attempt($credentials) )
        {
            return back()
                        ->withMessages('<div class="alert alert-danger" > username atau password salah ! </div>');
        }
        return redirect()->route('backend.dashboard');
    }

    public function getDashboard(){

        return view('Backend.pages.app.dashboard',[
            'pageTitle' => 'Dashboard'
        ]);
    }

    public function getLogout(){
        auth()->guard('backend')->logout();

        return redirect()
                ->route('backend.login')
                ->withMessages('<div class="alert alert-success" > Anda sudah logout </div>');;
    }

}