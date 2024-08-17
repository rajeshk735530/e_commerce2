<?php

namespace App\Http\Controllers\authLogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class authLoginController extends Controller
{
    public function loginUser(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string'
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => 400, 'message' => $validation->errors()->first()]);
        }else{
            $cred = array('email' => $request->email, 'password'=> $request->password);

            if (Auth::attempt($cred, false)) {

                if(Auth::User()->hasRole('admin')){
                    return response()->json([
                        'status' => 200, 
                        'message' => 'Admin User', 
                        'url' => url('admin/dashboard')
                    ]);
                }else {
                    return response()->json([
                        'status' => 200, 
                        'message' => 'Non User'
                    ]);
                }

            }else {
                return response()->json([
                    'status' => 404, 
                    'message' => 'Wrong Cred'
                ]);
            }
        }

    }
}
