@extends('layouts.app')

@section('title', 'List of Tasks')

@section('content')
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
    </div>
    @empty
      <div>No Task!</div>
    @endforelse
@endsection