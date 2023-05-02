<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'text' => $this->message,
            'user'=>$this->user,
            'localDate'=>$this->created_at
        ];
    }
}
