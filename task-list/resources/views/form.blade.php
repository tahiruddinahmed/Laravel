@extends('Layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('heading', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task) 
            @method('PUT')
        @endisset    
        <div class="mb-4">
            <label for="title">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ $task->title ?? old('title') }}"
                class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500
                @enderror"
            >
    
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea 
                name="description" 
                id="description" cols="30" rows="5" 
                class="@error('description') border-red-500
                @enderror shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none
                focus:shadow-outline">{{ $task->description ?? old('description') }}
            </textarea>

            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea 
                name="long_description" 
                id="long_description" 
                cols="30" rows="10"
                class="@error('long_description') border-red-500
                    @enderror shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none 
                    focus:shadow-outline">{{ $task->long_description ?? old('long_description') }}
            </textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn-primary">
                @isset($task)
                    Update Task
                @else 
                    Add Task
                @endisset
            </button>
        </div>
    </form>
@endsection