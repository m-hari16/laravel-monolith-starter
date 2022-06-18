@extends('layouts/main')

@section('content')
    <div class="container mt-4 p-3">
      <p class="lead">My Notes</p>

      {{-- Triger Modal --}}
      <button type="button" class="btn btn-primary btn-md mt-2 mb-4" data-toggle="modal" data-target="#addNote">
        Add Note
      </button>
      {{-- End Triger Modal --}}

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
        <div class="col mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Title notes 1</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="/note" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>  
        </div>
        <div class="col mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>  
        </div>
        <div class="col mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>  
        </div>
        <div class="col mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>  
        </div>
        <div class="col mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>  
        </div>
        <div class="col mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>  
        </div>
      </div>
      {{-- End Data List Note --}}

    </div>
@endsection