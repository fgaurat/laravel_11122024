@extends('layouts.app')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <h1>Catégories</h1>

    <div class="mb-4">
        <a href="{{route('categories.create')}}" class="btn btn-success">Nouvelle catégorie</a>
    </div>


@endsection
