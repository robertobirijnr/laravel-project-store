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
            <div class="card">
                <div class="card-header">Add New Food</div>

                <div class="card-body">
                    <form action="{{route('food.store')}}" method="POST" enctype="multipart/form-data">@csrf
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror">
                      @error('name')
                           <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                           </span>
                       @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control  @error('name') is-invalid @enderror">
                    </textarea>
                    @error('description')
                           <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                           </span>
                       @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control  @error('price') is-invalid @enderror">
                    @error('price')
                           <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                           </span>
                       @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    
                   <select name="category" class="form-control  @error('category') is-invalid @enderror">
                    <option value="">select</option>
                      @foreach (App\Category::all() as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                   </select>
                   @error('category')
                           <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                           </span>
                       @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror">
                    @error('image')
                           <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                           </span>
                       @enderror
                </div>
                <button type="submit" class="btn btn-outline-success">Add</button>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
