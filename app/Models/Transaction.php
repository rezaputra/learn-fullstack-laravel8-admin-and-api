<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = ['uuid', 'name', 'number', 'address', 'total', 'status'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'laravel_through_key'];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_transaction')->withPivot('id','status', 'total');
    }
}