
@extends('layouts.app')

@section('content')
    <a href="{{ route('note.index') }}">Back</a>
    <form method="POST" action="{{ route('note.store') }}">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
        </div>
        <input type="submit" value="Create">
    </form>
@endsection