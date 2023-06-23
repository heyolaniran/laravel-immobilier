@extends('base')


@section('title', 'Acceuil')

@section('content')


<div class="container mt-5">

<div class="row">
    @foreach($properties as $property)
        <div class="col">
            @include('components.properties.card' , ['property' =>$property])
        </div>
    @endforeach
</div>



</div>


@endsection