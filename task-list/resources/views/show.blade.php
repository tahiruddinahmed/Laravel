@extends('Layouts.app')

@section('title', $task->title .' - Task List Application')
@section('heading', $task->title)

@section('content')
{{-- <h1>{{ $task->title }}</h1> --}}
<p>{{ $task->description }}</p>

@if($task->long_description)
    <p>{{$task->long_description}}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<p>
    @if($task->completed)
        Completed
    @else
        Not Completed
    @endif
</p>

<div>
    <form method="POST" action="{{ route('tasks.toggle', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{$task->completed ? 'Not Completed' : 'Completed'}}
        </button>
    </form>
</div>

<div style="margin-top=1rem;">
    <a href="{{route('tasks.edit', ['task' => $task->id])}}">Edit Task</a>
</div>

<div style="margin-top=1rem;">
    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Task</button>
    </form>
</div>
@endsection