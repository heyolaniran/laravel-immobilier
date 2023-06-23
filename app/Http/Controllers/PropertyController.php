<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index() { 
        $properties = Property::orderBy('created_at',  'desc')->paginate(15) ; 
        return view('home' , [
            'properties' => $properties
        ]) ; 
    }

    public function show(string $id , Property $property) { 
        return view('property.show', $property) ; 
    }


}
