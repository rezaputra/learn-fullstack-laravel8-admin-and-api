<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'type' => 'product',
            'attributes' => [
                'name' => $this->name,
                'slug' => $this->slug,
                'stock' => (string)$this->stock,
                'price' => (string)$this->price,
                'description' => $this->name,
                'galleries' => [
                    'img0' => $this->galleryImage->img0,
                    'img1' => $this->galleryImage->img1,
                    'img2' => $this->galleryImage->img2,
                ]
            ]
        ];
    }
}
