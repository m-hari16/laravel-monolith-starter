@extends('layouts/main')

@section('content')

<div class="container-fluid mt-4">
    <div class="row mt-4">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h3 class="mt-4 mb-2 pl-4 pr-4">Register</h3>

            @if (session()->has('validError'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('validError')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="container p-4">
                <form class="container mt-4 mb-4" action="/register" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    
                    <div class="form-group mt-1">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
            
        <div class="col-sm-4"></div>
    </div>
</div>
    
@endsection