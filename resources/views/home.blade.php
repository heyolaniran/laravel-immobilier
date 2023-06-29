@extends('base')


@section('title', 'Acceuil')

@section('content')

<x-alert type="warning">
lorem 
</x-alert>

<div class="container mt-5">

    <form action="" method="get" class="container d-flex gap-2 ">
    <div class="form-group">
    <input type="text"
    class="form-control" name="price" id="" aria-describedby="helpId" placeholder="Rechercher par prix" value="{{$input['price'] ?? ''}}"> 
    </div>
    <div class="form-group">
    <input type="text"
    class="form-control ml-2" name="surface" id="" aria-describedby="helpId" placeholder="Rechercher par surface" value="{{$input['surface'] ?? ''}}"> 
    </div>
    <div class="form-group mr-4">
        <input type="text"
        class="form-control ml-4" name="rooms" id="" aria-describedby="helpId" placeholder="Rechercher par chambre" value="{{$input['rooms'] ?? ''}}"> 
    </div>
    <div class="mr-6">
        <button class="btn btn-primary btn-md flex-grow-0 ">
        Rechercher 
    </button>
    </div>
    
    </form>

<div class="row">
    @foreach($properties as $property)
        <div class="col">
            @include('components.properties.card' , ['property' =>$property])
        </div>
    @endforeach
</div>



</div>
<div class="container my-4">
    {{
        $properties->links()
    }}
</div>



@endsection