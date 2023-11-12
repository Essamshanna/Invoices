<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBranches extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'branch_aname',
        'branch_ename',
        'address',
        'phone_1',
        'phone_2',
        'phone_3',
        'email',
    ];
}
