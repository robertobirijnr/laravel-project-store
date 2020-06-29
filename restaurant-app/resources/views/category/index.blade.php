@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
             {{Session::get('message')}}
                </div> 
         @endif
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories)>0)
                    @foreach ($categories as $key=>$category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td><a href="{{route('category.edit',[$category->id])}}" class="btn btn-outline-success">Edit</a></td>
                        <td>
                          
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                                  Delete
                                </button>
                            
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <form action="{{route('category.destroy',[$category->id])}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  Are you sure you want to do this?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                  </div>
                                </div>
                                </form>
                              </div>
                            </div>
                        </td>
                        
                    </tr>
                   
                        
                    @endforeach
                    @else
                        <td>No category found</td>
                    @endif
                   
                </tbody>
            </table>
        
            </div>
        </div>
    </div>
</div>
@endsection
