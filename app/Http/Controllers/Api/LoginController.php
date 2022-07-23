<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;
class LoginController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
        'email'=>'required|email|exists:users,email',
        'password'=>'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors($validator)->first();
            return response()->json($response, 400);
        }

        $user_data = User::where('email',$request->email)->first();

        if (!(Hash::check($request->password, $user_data->password))) {

            return response()->json(['status' => 403, 'message' => 'Invalid credential'], 403);
        }               
        $user_data->access_token = $user_data->createToken('token')->plainTextToken;

        return response()->json(['status' => 200, 'message' => 'success', 'user_data' => $user_data], 200);
    }
}
