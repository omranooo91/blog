<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'logo' => asset($this->logo),
            'favicon' => asset($this->favicon),
            'title' => $this->title,
            'content' => $this->content,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'email' => $this->email,
        ];
        return $data;
    }
}
