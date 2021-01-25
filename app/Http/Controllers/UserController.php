<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(UserLoginRequest $request){
        $phone = $request->input('phone');
        $password = $request->input('password');


        $user = User::where('phone',$phone)->first();
        if($user){
            if(Hash::check($password, $user->password)){
                Auth::login($user);
                return redirect()->route('admin-home')->with('info',$request->get('rememberMe') ?? 'off');
            }else{
                return redirect()->back()->with('error','Password Error!');
            }
        }else{
            return redirect()->back()->with('error','Creditial Error');
        }



        if($request->rememberMe == 'on'){
            echo "Remember Me is On";
        }else{
            echo "Remember Me is Off";
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function test(){
        // $roles = Role::all();

        // Auth::user()->roles()->attach(2);
    }
}
