<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function login(Request $request){

        if (Auth::check()) {
            return redirect()->route('categories.index');
        }        
                    
        return view('login');
    }

    public function doLogin(Request $request)
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
           return redirect()->route('categories.index');
         }else{

          return redirect()->back()->withInput($request->only('email'))->with('error-message',"Invalid email or password");
         }        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('user.login');        
    }   
}
