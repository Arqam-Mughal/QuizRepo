<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validatedData->fails()){
            return response()->json([
                'success' => false,
                'message' => $validatedData->errors()
            ], 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken("MyApp")->plainTextToken;
        $success['name'] = $user->name;

        return response()->json([
            'data' => $success,
            'message' => 'User Registered SuccessFully!'
        ], 200);
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            $success['token'] = $user->createToken("MyApp")->plainTextToken;
            $success['name'] = $user->name;

            return response()->json([
                'data' => $success,
                'message' => 'User Registered SuccessFully!'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized!'
            ], 200);
        }
    }

}
