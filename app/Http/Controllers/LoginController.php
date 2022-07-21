<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function login(Request $request){

        if($request->method()=='post')
        {
            $this->validate($request, [
              'email'   => 'required|email',
              'password'  => 'required'
             ]);

             $user_data = array(
              'email'  => $request->get('email'),
              'password' => $request->get('password')
             );

             if(Auth::attempt($user_data))
             {
               return redirect()->route('events.index');
             }else{   
              return redirect()->back()->withInput($request->only('email'))->with('error-message',"Invalid email or password");
             }
        }
        
        return view('login');
    }    
}
