@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('note.update', $myNote->id) }}">
        @method('PUT')
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{$myNote->title}}">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{$myNote->description}}">
        </div>
        <input type="submit" value="Update">
    </form>
@endsection