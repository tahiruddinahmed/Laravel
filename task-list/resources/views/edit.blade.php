@extends('Layouts.app')


    @include('back')


@section('content')
    @include('form', [
        'task' => $task
    ])
@endsection