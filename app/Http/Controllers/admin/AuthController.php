<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function listAll(){
        $users=User::where('is_active',1)
        ->orderBy('id','desc')
        ->get();
        return view('admin.users')->with('users',$users);
    }
    public function create(){
        return view('create_user');
    }
    public function register(Request $request){
        Validator::validate($request->all(),[
            'name'=>['required','min:3','max:50'],
            'email'=>['required','email','unique:users,email'],
            'user_pass'=>['required','min:5'],
            'confirm_pass'=>['same:user_pass']


        ],[
            'name.required'=>'this field is required',
            'name.min'=>'can not be less than 3 letters', 
            'email.unique'=>'there is an email in the table',
            'email.required'=>'this field is required',
            'email.email'=>'incorrect email format',
            'user_pass.required'=>'password is required',
            'user_pass.min'=>'password should not be less than 3',
            'confirm_pass.same'=>'password dont match',


        ]);

        $u=new User();
        $u->name=$request->name;
        $u->password=Hash::make($request->user_pass);
        $u->email=$request->email;
       
        if($u->save()){
            $u->attachRole('admin');
            return redirect()->route('login')
            ->with(['success'=>'user created successful']);
        }

      
        return back()->with(['error'=>'can not create user']);
      
    }

    public function showLogin(){
        if(Auth::check())
        return redirect()->route($this->checkRole());
        else 
        return view('login');
    }


    public function checkRole(){
        
        if(Auth::user()->hasRole('admin'))
             return 'admin';
            else 
            return 'home';
    }

    public function login(Request $request){
        Validator::validate($request->all(),[
            'email'=>['email','required','min:3','max:50'],
            'user_pass'=>['required','min:5']


        ],[
            'email.required'=>'email field is required',
            'email.min'=>'can not be less than 3 letters', 
            'user_pass.required'=>'user_pass field is required',
            'user_pass.min'=>'can not be less than 5 letters', 
           
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->user_pass,'is_active'=>1])){

            
            if(Auth::user()->hasRole('admin'))
            return redirect()->route('admin');
            else 
            return redirect()->route('home');

        
        }
        else {
            return redirect()->route('login')->with(['message'=>'incorerct username or password or your account is not active ']);
        }

        
    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }



}

