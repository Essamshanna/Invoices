<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccTypees extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'acc_type_aname',
        'acc_type_ename',
    ];
}
