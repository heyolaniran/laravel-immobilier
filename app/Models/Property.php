<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes ; 
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
        'sold' , 
        'image'
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

    public function url() : string { 
        return Storage::url($this->image) ; 
    }

    public function scopeAvailable(Builder $builder) : Builder { 
        return $builder->where('sold', false) ; 
    }

    public function scopeRecent(Builder $builder) : Builder { 
        return $builder->orderBy('created_at', 'desc') ; 
    }
}
