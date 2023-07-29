<?php

namespace App\Http\Resources;

use App\Http\Resources\NoteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'notes' => NoteResource::collection($this->notes)
            // 'notes' => [
            //     'id' => $this->notes->id,
            //     'note' => $this->notes->note,
            //     'customer_id' => $this->notes->customer_id
            // ]
            // 'note' => new NoteResource($this->notes)
        ];
    }
}
