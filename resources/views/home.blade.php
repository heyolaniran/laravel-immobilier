@extends('base')


@section('title', 'Acceuil')

@section('content')


<div class="container mt-5">

<div class="row">
    @foreach($properties as $property)
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $property->titre }}</h5>
                <p class="card-text">{{ $property->description }}</p>
                <a href="{{ route('admin.properties.show' , $property) }}" class="btn btn-primary">Voir </a>
            </div>
        </div>
    @endforeach
</div>



</div>


@endsection