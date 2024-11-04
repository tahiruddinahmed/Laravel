@extends('Layouts.app')

@section('title', 'Laravel Project 1 - Task List App')
@section('heading', 'The List Of Tasks')


@section('content')
    <nav class="mb-5">
        <a href="{{ route('tasks.create') }}" class="btn-primary"
        >Add New Task</a>
    </nav>
    @forelse($tasks as $task)
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="block">
            <div class="p-2 border rounded-md mb-2 cursor-pointer">
                {{-- <a href="/{{ $task->id }}">{{ $task->title }}</a> --}}
                <span @class(['font-medium', 'line-through' => $task->completed])>
                    {{ $task->title }}
                </span>
            </div>
        </a>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-5">
            {{ $tasks->links() }}
        </nav>
    @endif

  
@endsection