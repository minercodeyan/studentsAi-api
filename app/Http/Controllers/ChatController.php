<?php

namespace App\Http\Controllers;


use App\Http\Resources\MessageResource;
use App\Servises\MessageService;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class ChatController extends Controller
{
    protected MessageService $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }


    public function messages(){
        return response()->json(MessageResource::collection($this->messageService->getGroupMessages()),ResponseAlias::HTTP_OK);
    }

    public function send(Request $request){
        return response()->json(new MessageResource(
            $this->messageService->createMessage($request->all())),
            ResponseAlias::HTTP_OK);

    }
}
