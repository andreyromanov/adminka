@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Categories
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
          New Category
        </button>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>id</th>
              <th>Image</th>
              <th>Name</th>
              <th>Description</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $cat)
            <tr>            
              <td>{{$cat->id}}</td>
              <td><img src="{{$cat->image}}" style="width: 100px;height:100px;border-radius: 50%"></td>
              <td>{{$cat->name}}</td>
              <td>{{$cat->description}}</td>
              <th>
                <form action="{{route('category.destroy')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$cat->id}}">
                  <button type="submit" class="btn btn-danger">
                      <i class="fa fa-trash"></i>
                  </button>
                </form>
              </th>
            </tr>
            @endforeach
          </tbody>
        </table>  
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('category.create')}}">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label>Image Link</label>
                <input type="text" name="image" class="form-control" placeholder="Link">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
