<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesOfRestrictions extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'typeOfRestr_aname',
        'typeOfRestr_ename',
        'description',
    ];
}
