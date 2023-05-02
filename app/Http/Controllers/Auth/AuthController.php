<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash as FacadesHash;
use App\Rules\Captcha;
class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function postLogin(Request $request){

        //logic for loggging in user now
        $this->validate($request,[
            'g-recaptcha-response'=> new Captcha()
        ]);

        $user = User::where('email',$request->input('email'))->first();
        $credentials= $request->only('email','password');

        if($user){

            if(Auth::attempt($credentials)){
                return redirect('/home')->with('success','You have Logged in successfully');
            }else{

                return redirect('/login')->with('error','Invalid Login Credentials');
            }
        }else{

            return redirect('/login')->with('error','User not found');
        }
       

    }

    public function register(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $validator  = Validator::make($request->all(),[
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'first_name'=>'required|string|max:255',
            'surname'=>'required|string|max:255'
        ]);

        if($validator->fails()){
            return redirect('register')
            ->withErrors($validator)
            ->withInput();
        }

        

        $file = $request->file('resume_file');
        $profileImage = $request->file('profile_image');

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $profileImageFilename = uniqid() . '.' . $profileImage->getClientOriginalExtension();

        $filePath = $file->storeAs('documents', $filename);
        $profileImagePath = $profileImage->storeAs('profile_images', $profileImageFilename);


        $user = User::create([
            'first_name'=> $request->input('first_name'),
            'surname'=>$request->input('surname'),
            'last_name'=>$request->input('phone_number'),
            'country'=>$request->input('country'),
            'qualification'=>$request->input('qualification'),
            'email'=>$request->input('email'),
            'phone_number'=>$request->input('phone_number'),
            'city'=>$request->input('city'),
            'address'=>$request->input('address'),
            'resume_file_url'=>$filePath,
            'profile_image_url'=>$profileImagePath,
            'password'=> FacadesHash::make($request->input('password'))
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration was successful');
    }
}
