<?php

namespace App\Exceptions;
use Exception;
use Illuminate\Http\Response;
class UnauthorizedException extends Exception
{

    public function render($request): Response
    {
        $error = 'Пользователь не авторизован';
        $help = "Contact the sales team to verify";

        return response([
            "success"=>false,
            "message" => $error,
            "help" => $help], 401);
    }

}
