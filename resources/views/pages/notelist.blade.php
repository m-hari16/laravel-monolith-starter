@extends('layouts/main')

@section('content')
    <div class="container mt-4 p-3">
      <p class="lead">My Notes</p>

      {{-- Triger Modal --}}
      <button type="button" class="btn btn-primary btn-md mt-2 mb-4" data-toggle="modal" data-target="#addNote">
        Add Note
      </button>
      {{-- End Triger Modal --}}

      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('success')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      {{-- Modal Add Notes --}}
      <div class="modal fade" id="addNote" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add New Note</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              {{-- Content Modal --}}
              @include('components.formnote')
              {{-- End Content Modal --}}

            </div>
          </div>
        </div>
      </div>
      {{-- End Modal Add Notes --}}

      {{-- Data List Note --}}
      <div class="row row-cols-1 row-cols-md-4">
      @foreach ($data as $item)
        <div class="col mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{$item->title}}</h5>
              <h6 class="card-subtitle mb-4 mt-0.5 text-muted">{{$item->created_at}}</h6>
              <p class="mb-4 card-text">{{substr($item->body, 0, 50)}}</p>
              <a href="{{ URL::to('note/' . $item->slug) }}">Show Detail</a>
            </div>
          </div>  
        </div>
      @endforeach
      </div>
      {{-- End Data List Note --}}
    </div>
@endsection