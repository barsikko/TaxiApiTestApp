<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
	/**
	 * 	Register user to application
	 * 
	 * @param string $name
	 * @param email $email
	 * @param string $password
	 * 
	 * @return \Illuminate\Http\JsonResponse
	 */

     public function register(RegisterAuthRequest $request) : JsonResponse
       {

       	$user = (new AuthService)->registerUser($request->name, $request->email, $request->password);

       	$token = $user->createToken('my-device-token');

       	$response = [
       		'user' => $user,
       		'token' => $token
       	];

       	return response()->json($response, Response::HTTP_CREATED);

       }

    /**
	 * 	Login user to application
     *	
  	 * @param email $email
	 * @param string $password
	 * 
	 * @return \Illuminate\Http\JsonResponse
	 */

     public function login(LoginAuthRequest $request) : JsonResponse
    {
        $user = (new AuthService())->authUser($request->email, $request->password);

        $token = $user->createToken('my-device-token');

          $response = [
       		'user' => $user,
       		'token' => $token
       	];

    	return response()->json($response, Response::HTTP_OK);
    }

     /**
	 * 	Logout user from application
     *	
  	 * @param Bearer $token
	 * 
	 * @return \Illuminate\Http\JsonResponse
	 */

   	 public function logout() : JsonResponse
    {
    	auth()->user()->tokens()->delete();

    	return response()->json('You were succesefully logged out', Response::HTTP_OK);
    }




}
