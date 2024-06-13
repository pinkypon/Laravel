@extends('layouts.app')

@section('title', $tasks->title)

@section('content')
  <p> {{ $tasks->description }}</p>

  @if ($tasks->long_desc)

    <p>
      {{ $tasks->long_desc }}
    </p>
  @endif
  
  <p>{{ $tasks->created_at }}</p>
  <p>{{ $tasks->updated_at }}</p>

  <div>
    <form action="{{ route('tasks.destroy', ['task' => $tasks->id]) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit"> 
        Delete
      </button>
    </form>
  </div>
@endsection