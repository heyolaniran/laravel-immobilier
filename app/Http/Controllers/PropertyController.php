<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\PropertyContactMail;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PropertyContactForm;

class PropertyController extends Controller
{
    public function index(SearchRequest $request) { 

        $query = Property::query()->orderBy('created_at', 'desc') ; 

        if($request->validated('price')) { 
            $query = $query->where('price', '<=' , $request->validated('price')) ; 
        }
         if($request->validated('surface')) { 
            $query = $query->where('surface', '>=' , $request->validated('surface')) ; 
        }

        if($request->validated('rooms')) { 
            $query = $query->where('rooms', '>=' , $request->validated('rooms')) ; 
        }
       
        return view('home' , [
            'properties' => $query->paginate(10) , 
            'input' => $request->validated()
        ]) ; 
    }

    public function show(string $slug , Property $property) { 

        $expectedSlug = $property->getSlug() ; 
        if($slug !== $expectedSlug) { 
            return \to_route('property.show' , ['slug' => $expectedSlug , 'property' =>$property]) ; 
        }
        return view('property.show', [
            'property' =>$property
        ]) ; 
    }

    public function contact(PropertyContactForm $request, Property $property) { 

        Mail::send(new PropertyContactMail($property , $request->validated())) ; 

        return \back()->with('success' , 'Votre mail a été envoyé'); 
    }


}
