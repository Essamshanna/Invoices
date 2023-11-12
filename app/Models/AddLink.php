<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'link_name',
        'description',
    ];
}
