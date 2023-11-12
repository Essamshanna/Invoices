<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureAccounts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nature_type_aname',
        'nature_type_ename',
    ];
    public function account(){
        return $this->belongsTo('App\Models\TreeAccounts','acc_nature_id');
}
}
