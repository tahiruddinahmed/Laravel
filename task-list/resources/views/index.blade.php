@extends('Layouts.app')

@section('title', 'Laravel Project 1 - Task List App')
@section('heading', 'The list of tasks')


@section('content')
    @forelse($tasks as $task)
        <div>
            {{-- <a href="/{{ $task->id }}">{{ $task->title }}</a> --}}
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    <div style="margin-top: 1rem">
        <a href="{{ route('tasks.create') }}">Add Task</a>
    </div>
@endsection