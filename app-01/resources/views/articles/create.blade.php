@extends('layouts.app')


@section('content')

<form action="{{route("articles.store")}}" method="POST">
@csrf
    <input type="text" name="title" id="title">
    <select name="category_id" id="category">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <button type="submit">Créer</button>
</form>


@endsection
