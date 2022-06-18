@extends('layouts/main')

@section('content')

<div class="container-fluid mt-4">
    <div class="row mt-4">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h3 class="mt-4 mb-2 pl-4 pr-4">Login</h3>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('validError'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('validError')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('loginFail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('loginFail')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="container p-4">
                <form class="container mt-4 mb-4" action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
    
@endsection