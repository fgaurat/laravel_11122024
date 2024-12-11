@extends('layouts.app')


@section('content')

    <h1>Créer une catégorie</h1>

    <form action="{{route("categories.store")}}" method="post">
        @csrf
        <input type="text" name="name" id="name">
        <button type="submit">Créer</button>
    </form>

@endsection
