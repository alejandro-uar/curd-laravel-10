@extends('layouts.app')

@section('content')
    @include('layouts.components.navbar')
    <a href="{{ route('note.create') }}">Create new note</a>
    <ul>
        @forelse($notes as $note)
            <li>
                <a href="">{{$note->title}}</a> | 
                <a href="{{route('note.edit',$note->id)}}">EDIT</a> | 
                <form method="POST" action="{{ route('note.destroy', $note->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE">
                </form> 
            </li>
        @empty
            <p>No data.</p>
        @endforelse
    </ul>
    
    <h2>Tareas</h2>
    @foreach($notes as $note)
        <article>
            <p>{{ $note->description }}</p>
        </article>
    @endforeach
@endsection