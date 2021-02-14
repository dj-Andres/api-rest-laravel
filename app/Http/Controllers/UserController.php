<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        $imputs= $request->all();
        $imputs['password'] = Hash::make($request->password);
        User::create($imputs);

        return response()->json([
            'succes'=>true,
            'message'=>'El usuario se creo exitosamente',
            'data'=>$imputs
                        
        ],status:200);
    }

    public function signin(Request $request){

        $user = User::whereEmail($request->email)->first();

        if(!is_null($user) && Hash::check($request->password, $user->password)){
            return response()->json([
                'succes'=>true,
                'message'=>'Login exitoso'            
            ],status:200);
        }else{
            return response()->json([
                'succes'=>false,
                'message'=>'Login exitoso'            
            ],status:200);
        }
    }

}
