<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre' , 
        'description' , 
        'surface' , 
        'rooms'  ,
        'bedrooms'  , 
        'floor' , 
        'price' , 
        'city' , 
        'address' , 
        'sold'
    ]  ; 
}
