@extends('admin.admin')

@section('title', $property->exists ? 'Editer le bien' : 'Créer un bien') 

@section('content') 

<h1>@yield('title')</h1>

<form action="{{ route($property->exists ? 'admin.properties.update' : 'admin.properties.store' , [
    'property' => $property
] ) }}" method="POST">
    @csrf
    @method($property->exists ? 'put' : 'post' )

    <div>
    <button class="btn btn-primary">
        @if ($property->exists)
            Modifier 
        @else
            Créer 
        @endif
    </button>
</form>



@endsection