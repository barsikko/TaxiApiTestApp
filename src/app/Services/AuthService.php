<?php 

namespace App\Services;


use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class AuthService
{

private $user;

public function registerUser($name, $email, $password) : User
{
	$user = User::create([
       		'name' => $name,
       		'email' => $email,
       		'password' => bcrypt($password)
       	]);

	$this->user = $user;

	return $user;

}


public function authUser($email, $password) : User 
{

	$user = User::where('email', $email)->first();

	if (!$user || !Hash::check($password, $user->password))
    {
    	throw new AuthenticationException('Wrong login or password');
    }

    $this->user = $user;

    return $user;

}

public function createToken($device) : string
{

	$token = $this->user->createToken($device)->plainTextToken;

	return $token; 

}

public function getUser() : User
{
	return $this->user;
}


}