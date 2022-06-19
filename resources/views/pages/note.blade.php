@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <p class="lead">Title</p>
        <p>{{$data->title}}</p>
        <p class="lead">Notes</p>
        <p>{{$data->body}}</p>
    </div>
@endsection