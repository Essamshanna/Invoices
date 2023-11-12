<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyTypess extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'currency_type_aname',
        'currency_type_ename',
    ];

}
