<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class RegisterController extends Controller
{
    public function registerForm()
    {
        if (Auth::check()) {
            return redirect()->route('events.index');
        }        
        return view('register');;
    }
    public function register(StoreRegisterRequest $request)
    {
            $data = $request->validated();
            $data['password'] = Hash::make($request->input('password'));
                $image=$request->file('profile_image');
                $path                  =    public_path('/uploads/profile_images');
                $profile_image    =    time()."_".$image->getClientOriginalName(); 
                $image->move($path."/", $profile_image);           
            $data['profile_image'] = $profile_image;
            User::create($data);

            return redirect()->route('user.login');            
    }
}
