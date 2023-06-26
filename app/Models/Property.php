<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

   /**
     * The options that belong to the Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug() : string { 
        return Str::slug($this->titre) ; 
    }
}
