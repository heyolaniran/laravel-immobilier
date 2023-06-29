<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PropertyFormRequest ; 

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.properties.index", [ 
            'properties' =>Property::orderBy("created_at", 'desc')->paginate(1) 
        ]) ; 
    }

    public function show(Property $property){ 

        dd($property) ; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property() ; 
        $property->fill([
            'surface' => 40 , 
            'rooms' => 3, 
            'bedrooms' => 1, 
            'floor' => 0 , 
            'city' => 'Abomey-Calavi', 
            'sold' => false
        ]) ; 


        return view('admin.properties.form', [ 
            'property' => $property , 
            'options' => Option::pluck('name' , 'id')
        ]) ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $data = $this->extractData(new Property() , $request);
        $property = Property::create($data) ; 
        $property->options()->sync($request->validated('options')) ; 
        return to_route('admin.properties.index')->with('success', 'Votre bien a été enrégistré') ; 
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view("admin.properties.form", [
            'property' => $property , 
            'options' => Option::pluck('name' , 'id') 
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {

        $data = $this->extractData($property , $request);
        
        $property->update($data) ; 
            $property->options()->sync($request->validated('options')) ; 
        return to_route('admin.properties.index')->with('success', "Modification effectuée") ; 
    }

    private function extractData(Property $property , PropertyFormRequest $request) { 
        $data = $request->validated() ; 
        $image = $request->validated('image'); 
        /**
         * @var UploadedFile|null $image
         */

         if($image == null && $image->getError()){ 
            return $data ; 
         }

         if($property->image){ 
            Storage::disk('public')->delete($property->image);
         }
       
         $data['image'] = $image->store('properties' , 'public') ; 
    
         return $data ; 
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        
        $property->delete() ; 

        return to_route('admin.properties.index')->with('success', "Le bien a été supprimé") ; 
    }
}
