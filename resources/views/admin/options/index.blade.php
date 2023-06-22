@extends('admin.admin')
@section('title', 'Gestion des options')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1> Gestion des options </h1>

    <a href="{{ route('admin.options.create') }} " class="btn btn-primary">Ajouter une option </a>
</div>

<table class="table table-striped">
<thead>
        <tr>
            <th>ID</th>
            <th>Nom de l'option</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($options as $option)
            <tr>
                <td>
                    {{ $option->id }}
                </td>
                <td>
                    {{ $option->name  }}
                </td>
                <td>
                    <div class="d-flex gap-2 justify-content-center w-100">
                        <a href="{{ route('admin.options.edit' , $option) }}" class="btn btn-primary">Editer </a>
                        <form action="{{ route('admin.options.destroy', $option) }}" method="post">
                            @csrf 
                            @method('delete')

                            <button class="btn btn-danger ml-2">Supprimer </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection