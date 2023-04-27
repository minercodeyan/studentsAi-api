<?php

namespace App\Http\Controllers;


use App\Servises\MessageService;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class ChatController extends Controller
{
    protected MessageService $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }


    public function messages(){
        return response()->json($this->messageService->getAllMessages(),ResponseAlias::HTTP_OK);
    }

    public function send(Request $request){
        return $this->messageService->createMessage($request->request->all());
    }
}
