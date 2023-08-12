<?php

namespace Crm\Project\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
                'project_name' => $this->project_name,
                'status' => (bool)$this->status,
                'project_cost' => $this->project_cost,
                'customer_id' => $this->customer_id,
                'customer' => $this->customer,
        ];
    }
}
