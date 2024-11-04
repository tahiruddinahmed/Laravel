@extends('Layouts.app')

@section('content')
    @include('form', [
        'task' => $task
    ])
@endsection