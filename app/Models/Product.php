<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'stock', 'price', 'description'];

    protected $hidden = ['laravel_through_key', 'created_at', 'updated_at', 'deleted_at'];

    public function galleryImage(){
        return $this->hasOneThrough(
            Image::class, 
            Gallery::class,
            'product_id',
            'gallery_id',
            'id',
            'id'
            );
    }
}
