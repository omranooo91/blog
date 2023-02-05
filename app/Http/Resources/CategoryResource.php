<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
         'image' => asset($this->image),
         'parent' => $this->parent,
         'created_at' => $this->created_at->format('Y-m-d'),
         'title' => $this->title,
         'children' => CategoryCollection::make($this->whenLoaded('children')),
           'posts' => $this->whenLoaded('posts'),
       ];
    }
}
