<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'items_name',
        'product_id',
        'product_price',
        'Created_by',
        'description',
    ];
    public function productId(){
        return $this->belongsTo(Products::class, 'product_id');
}
}

