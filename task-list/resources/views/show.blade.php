@extends('Layouts.app')
@section('title', $task->title .' - Task List Application')
@include('back')

@section('heading', $task->title)
@section('content')
    

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif

    <p class="text-sm mb-4 text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if($task->completed)
           <span class="font-medium text-green-500">Completed</span>
           @else
           <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <div class="mt-1">
            <a href="{{route('tasks.edit', ['task' => $task->id])}}" class="btn">Edit Task</a>
        </div>

        
        <form method="POST" action="{{ route('tasks.toggle', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
             <button type="submit" class="btn">
                Mark as {{$task->completed ? 'Not Completed' : 'Completed'}}
             </button>
        </form>
    
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-red-600 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 ">Delete Task</button>
        </form>
    </div>
@endsection