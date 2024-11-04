@extends('Layouts.app')

@section('title', 'Laravel Project 1 - Task List App')
@section('heading', 'The list of tasks')


@section('content')
    <di>
        <a href="{{ route('tasks.create') }}">Add Task</a>
    </div>
    @forelse($tasks as $task)
        <div>
            {{-- <a href="/{{ $task->id }}">{{ $task->title }}</a> --}}
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif

  
@endsection