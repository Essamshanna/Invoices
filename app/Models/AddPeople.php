<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPeople extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'people_fname',
        'people_lname',
        'email',
        'addedInEmails',
    ];
}
