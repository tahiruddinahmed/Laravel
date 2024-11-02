@extends('Layouts.app')

@section('title', 'The list of tasks')


@section('content')
    @forelse($tasks as $task)
        <div>
            {{-- <a href="/{{ $task->id }}">{{ $task->title }}</a> --}}
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    <div style="margin-top: 1rem">
        <a href="{{ route('tasks.test') }}">Test Form</a>
    </div>
@endsection