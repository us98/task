<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use DB;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('Frontend.pages.auth.login',[
            'pageTitle' => 'Area Login User'
        ]);
    }

    public function getSignup()
    {
        return view('Frontend.pages.auth.register',[
            'pageTitle' => 'Register User',
        ]);
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|max:100',
            'password' => 'required'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(!auth()->attempt($credentials) ){
            return back()
                    ->withMessages('<div class="alert alert-danger" > Username atau password salah ! </div>');
        }

        return redirect()
                -> route('index');
    }

    public function postSignUp(Request $request )
    {
        $request->validate([
            'username' => 'required|max:100|unique:users,username,'.$request->username,
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users,email,'.$request->email,
            'password' => 'required|min:5',
            'verify_password' =>'required|same:password'
        ]);

        try{
            DB::transaction(function() use($request){
                $user = new User;
                $user->username = $request->username;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
            });
                return back()
                    ->withMessages('<div class="alert alert-success" > Registrasi Berhasil </div>');
        }catch(Exception $e){
            abort(500);
        }
    }
}
