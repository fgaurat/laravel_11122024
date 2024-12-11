@extends('layouts.app')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="mb-4">
        <a href="{{route('categories.create')}}" class="btn btn-success">Nouvel article</a>
    </div>

@endsection
