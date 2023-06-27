@extends('admin.admin')


@section('title', 'Connexion')

@section('content')

<div class="container">
    <h3>@yield('title')</h3>

    <form action="{{route('login')}}" method="post">
        @csrf 

        @include('admin.shared.input',  ['type' => 'email', 'name' => 'email', 'class' => 'col']) 
        @include('admin.shared.input', ['type' => 'password' , 'name' =>'password' , 'class' =>'col'])

        <div>
            <button class="btn btn-primary btn-md">
                Se connecter 
            </button>
        </div>

    </form>
</div>


@endsection