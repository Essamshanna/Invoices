<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersAndSuppliers extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
         'C_Name',
         'people_id',
         'email',
         'links_id',
         'country',
         'city',
         'address',
         'phone',
         'Tax_Nu',
    ];

    public function peopleId(){
        return $this->belongsTo(AddPeople::class, 'people_id');
    }
    public function linksId(){
        return $this->belongsTo(AddLink::class, 'links_id');
    }

}
