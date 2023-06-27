@extends('base')


@section('title', "Details : $property->titre")

@section('content')

<div class="container">
    <h1>{{ $property->titre}}</h1>

    <h2> {{ $property->surface }} m² - {{$property->rooms}} chambres</h2>
    <div class="text-primary font-weight-bold mt-2">
       <h3>{{number_format($property->price, thousands_separator: ' ')}} XOF</h3> 
    </div>

    @include('components.flash')
    <hr>
    <div class="container mt-4">
        <form action="{{route('property.contact' , $property)}}" method="post">
            @csrf
            <div class="row">
                @include('admin.shared.input' , ['class' => 'col' , 'name'=>'prenom' , 'label' => 'Prenoms'  , 'value' => 'John'])
                @include('admin.shared.input' , ['class' => 'col' , 'name'=>'nom' , 'label' => 'Nom' , 'value' => 'Doe'])
            </div>
            <div class="row">
            @include('admin.shared.input' , ['class' => 'col' , 'name'=>'telephone'  , 'value' => '+22996584394'])
                @include('admin.shared.input' , ['class' => 'col' , 'type'=>'email', 'name'=>'email' , 'label' => 'E-mail' , 'value' => 'loremipsum@gmail.com'])
            </div>

            @include('admin.shared.input', ['type' =>'textarea' , 'class' =>'col' , 'name' =>'message' , 'value' => 'lorem ipsum message'])

            <button class="btn btn-primary btn-md">Nous contacter </button>
        </form>
    </div>

    <div class="mt-4">
        {!! nl2br($property->description) !!}
    </div>

    <div class="mt-4">
        <h4>Caractéristiques</h4>
    </div>

    <div class="mt-4 mb-4">
        <h4>Spécificités</h4>
        <div class="mt-4">
            <ul class="list-group">
            @foreach($property->options as $option)
            <li href="#" class="list-group-item ">{{$option->name}}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>








@endsection