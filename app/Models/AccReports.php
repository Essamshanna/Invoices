<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccReports extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'acc_rep_aname',
        'acc_rep_ename',
    ];
}
