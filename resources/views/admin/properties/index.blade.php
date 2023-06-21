@extends('admin.admin')
@section('title',  'Tout nos biens ')
@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1> Les biens immobiliers</h1>

    <a href="{{ route('admin.properties.create') }} " class="btn btn-primary">Ajouter un bien </a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($properties as $property) 

            <tr> 
                <td> {{ $property->titre }}</td>
                <td> {{ $property->surface }} m</td>
                <td> {{ number_format($property->price, thousands_separator: ' ') }}</td>
                <td> {{ $property->city }}</td>
                <td>

                </td>
            </tr>

        @endforeach 
    </tbody>
</table>
{{
    $properties->links()
}}



@endsection