<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardTypees extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'card_name',
        'card_price',
        'description',
        'Created_by',
    ];
}
