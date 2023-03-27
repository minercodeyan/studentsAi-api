<?php

namespace App\Http\Resources\StudentResources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentStandardResource extends JsonResource
{
    public $preserveKeys = true;

    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'name' => $this->name,
        ];
    }
}
