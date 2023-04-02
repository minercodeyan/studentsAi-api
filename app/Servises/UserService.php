<?php

namespace App\Servises;

use App\Constants\ValidationConstant;
use App\Exceptions\UnauthorizedException;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService
{
    public function createUser($request){
        $validator = Validator::make($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return $validator->errors();
        }

        $user = new User;
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();

        return $user;
    }

    public function getAuthToken($credentials){
        if (! $token = JWTAuth::attempt($credentials)) {
            throw new UnauthorizedException('Неверный логин или пароль');
        }
        return $token;
    }
}
