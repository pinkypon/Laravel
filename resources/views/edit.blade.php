@extends('layouts.app')
@section('title', 'Add Task')
@section('content')

@section('style')
  <style>
    .error-message {
      color: red;
      font-size: 3mm;
    }
  </style>
@endsection

@section('content')

  <form method="POST" action="{{ route('tasks.update', ['task' => $tasks->id]) }}">
      @csrf
      @method('PUT')
      <div>
        <label for="title">Title</label>
        <input text="text" name="title" id="title" value="{{ $tasks->title }}"/>
        @error('title')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="description">description</label>
        <textarea name="description" id="description" rows="5">{{ $tasks->description}} </textarea>
        @error('description')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="long_desc">Long Description</label>
        <textarea name="long_desc" id="title" rows="10">{{ $tasks->long_desc }}</textarea>
        @error('long_desc')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <button type="submit">Edit Task</button>
      </div>
      
  </form>

@endsection