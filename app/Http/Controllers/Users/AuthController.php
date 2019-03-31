<?php

namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    use AuthenticatesUsers{
        logout as performLogout;
    }
    
    public function index()
    {

        if (Auth::check()) {
            return redirect('/');
        }

        return view('login');
    }

    public function indexAdmin()
    {

        if (Auth::check()) {
            return redirect('/');
        }

        return view('login_admin');
    }

    public function login(Request $request)
    {

        try{

            $getUser = User::with('roles')
                ->where('username' , '=' , $request->username)
                ->where('id_role' , '>' , 1)
                ->first();

            if(! $getUser){
                return redirect('/login')->withErrors(['You are not registered']);
            }else{

                if (Hash::check($request->password, $getUser->password)) {

                    Auth::login($getUser);
                    return redirect('/user-site');

                }

                return redirect('/login')->withErrors(['Your password is wrong']);

            }

        }catch (\Exception $exception){

            return redirect('/login')->withErrors(['Server In Down']);

        }

    }

    public function loginAdmin(Request $request)
    {

        try{

            $getUser = User::with('roles')
                ->where('username' , '=' , $request->username)
                ->where('id_role' , '=' , 1)
                ->first();

            if(! $getUser){
                return redirect('/login-admin')->withErrors(['You are not registered']);
            }else{

                if (Hash::check($request->password, $getUser->password)) {

                    Auth::login($getUser);
                    return redirect('/');

                }

                return redirect('/login-admin')->withErrors(['Your password is wrong']);

            }

        }catch (\Exception $exception){

            return redirect('/login-admin')->withErrors(['Server In Down']);

        }

    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('/login');
    }

    public function register(){

        return response()->view('register');

    }

    public function store(Request $request){

        try{

            $create = User::query()->create([
                "name" => $request->name,
                "password" => Hash::make($request->password),
                "username" => $request->username,
                "alamat" => $request->alamat,
                "id_role" => 2,
            ]);

            if ( ! $create){

                return redirect('/register')->withErrors(['gagal mendaftar']);

            }

            Auth::login($create);
            return redirect('/');

        }catch (\Exception $exception){

            return redirect('/register')->withErrors([$exception->getMessage()]);

        }

    }

}
