<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'images';

    protected $fillable = ['gallery_id','img0', 'img1', 'img2'];

    protected $hidden = ['laravel_through_key', 'created_at', 'updated_at', 'deleted_at'];
}
