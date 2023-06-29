@extends('admin.admin')

@section('title', $property->exists ? 'Editer le bien' : 'Créer un bien') 

@section('content') 

<h1>@yield('title')</h1>

<form class=" gap-2" action="{{ route($property->exists ? 'admin.properties.update' : 'admin.properties.store' , [
    'property' => $property
] ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($property->exists ? 'put' : 'post' )

    
       <div class="row">
       @include('admin.shared.input', [ 'class'=> 'col','name' => 'titre' , 'type'=>'text', 'value' => $property->titre])
        <div class="col row">
            @include('admin.shared.input',  [ 'name' => 'surface' , 'type'=>'number', 'value' => $property->surface])
            @include('admin.shared.input',  ['class' =>'ml-2', 'label' =>"Prix" ,  'name' => 'price' , 'type'=>'number', 'value' => $property->price])
        </div>
    </div>
    @include('admin.shared.input',  ['label' =>"Description" ,  'name' => 'description' , 'type'=>'textarea', 'value' => $property->description])

    <div class="row">
        @include('admin.shared.input', [ 'class'=> 'col','name' => 'rooms' , 'type'=>'number', 'value' => $property->rooms])
        @include('admin.shared.input', [ 'class'=> 'col','name' => 'bedrooms' , 'type'=>'number', 'value' => $property->bedrooms])
        @include('admin.shared.input', [ 'class'=> 'col','name' => 'floor' , 'type'=>'number', 'value' => $property->floor])
    </div>

    <div class="row">
        @include('admin.shared.input', [ 'class'=> 'col','name' => 'address' , 'type'=>'text', 'value' => $property->address])
        @include('admin.shared.input', [ 'class'=> 'col','name' => 'city' , 'type'=>'text', 'value' => $property->city])
    </div>
    <div class="row">
        @include('admin.shared.file', ['name' => 'image']) 
    </div>
    <div class="row">
        @include('admin.shared.checkbox', [ 'name' => 'sold' ,  'value' => $property->sold])
    </div>
    <div class="row">
            @include('admin.shared.select', [ 'class' => 'my-2', 'name' =>'options' , 'label'=>'Options' , 'multiple'=>true , 'value' => $property->options()->pluck('id') , 'options' => $options])
    </div>

   
    <div class="mt-4">
    <button class="btn btn-primary px-4">
        @if ($property->exists)
            Modifier 
        @else
            Créer 
        @endif
    </button>
</form>



@endsection