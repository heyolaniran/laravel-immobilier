@extends('base')


@section('title', "Details : $property->titre")

@section('content')

<div class="container">
    <h1>{{ $property->titre}}</h1>

    <h2> {{ $property->surface }} m² - {{$property->rooms}} chambres</h2>
    <div class="text-primary font-weight-bold mt-2">
       <h3>{{number_format($property->price, thousands_separator: ' ')}} XOF</h3> 
    </div>
</div>








@endsection