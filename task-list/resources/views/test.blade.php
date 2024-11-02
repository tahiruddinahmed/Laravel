@extends('Layouts.app')

@section('title', 'Test Form')

@section('content')

<div>
    <form method="POST" action="{{ route('tasks.testStore') }}">
        @csrf
        <div>
            <label for="name">
                Enter Your Name
            </label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <button type="submit">Test Submit</button>
        </div>
    </form>
</div>

@endsection