@extends('admin.admin')

@section('title', $option->exists ? 'Edition de l\'option' : 'Creer une option')


@section('content')

<h1>@yield('title')</h1>

<form action="{{ route($option->exists ? 'admin.options.update' : 'admin.options.store', [
    'option' => $option 
    ]) }}" method="POST">

    @csrf 
    @method($option->exists ? 'put' : 'post')

    <div class="row">
        @include('admin.shared.input', ['type'=>'text', 'name' => 'name' , 'label'=>'Nom de l\'option' , 'value' => $option->name])
    </div>

    <button class="btn btn-primary">
        @if($option->exists) 
            Modifier
        @else 
            Créer
        @endif
    </button>



</form>



@endsection