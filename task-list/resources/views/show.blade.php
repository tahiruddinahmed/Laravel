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

<div style="margin-top=1rem;">
    <a href="{{route('tasks.edit', ['task' => $task->id])}}">Edit Task</a>
</div>
@endsection