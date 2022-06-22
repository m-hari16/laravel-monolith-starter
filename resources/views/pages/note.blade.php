@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <table class="table mt-3 bg-light">
            <thead>
              <tr class="table-active">
                <th scope="col">Title</th>
              </tr>
            </thead>
            <tbody>
                <tr height="65px">
                  <td>{{$data->title}}</td>
                </tr>
            </tbody>
            <thead>
                <tr class="table-active">
                  <th scope="col">Notes</th>
                </tr>
            </thead>
            <tbody>
                  <tr height="380px">
                    <td>{{$data->body}}</td>
                  </tr>
            </tbody>
        </table>

        {{-- Triger Modal --}}
        <button type="button" class="float-left btn btn-primary btn-md mt-2 mb-4" data-toggle="modal" data-target="#editNote">
            Edit Note
        </button>

        <form class="float-left mt-2 ml-2" action="/note" method="post">
            @csrf
            @method('delete')
            <input type="hidden" value="{{$data->slug}}" name="slug">
            <button type="submit" class="btn btn-danger">Delete Note</button>
        </form>
        

        <div class="modal fade" id="editNote" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Edit Note</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  {{-- Content Modal --}}
                  <div class="container mt-4">
                        <form class="container mt-4 mb-4" method="post" action="/note">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input value="{{$data->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" required>
                            </div>
                            <input type="hidden" value="{{$data->slug}}" name="slug">
                    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Note</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="17" name="body" required>{{$data->body}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                  {{-- End Content Modal --}}
    
                </div>
              </div>
            </div>
        </div>

    </div>

    

@endsection