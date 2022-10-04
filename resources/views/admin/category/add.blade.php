@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4> 
        </div>
        <div class="card-body">
           <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">

                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text"
                         class="form-control {{ $errors->has('name') ? 'alert alert-danger' : '' }}" name="name" value={{ old('name') }}>
                    </div>

                    <div class="col-md-6">
                        <label for="slug">Slug</label>
                        <input type="text" 
                        class="form-control {{ $errors->has('slug') ? 'alert alert-danger' : '' }}" name="slug" value={{ old('slug') }}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description"  rows="3"
                         class="form-control {{ $errors->has('description') ? 'alert alert-danger' : '' }}"
                         > {{   old('description') }}</textarea>
                         
                    </div>

                   <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="popular">Popular</label>
                        <input type="checkbox" name="popular" >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title"
                        class= "form-control {{ $errors->has('meta_title') ? 'alert alert-danger' : '' }}" 
                        value={{ old('meta_title') }}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords"  cols="3" 
                        class="form-control {{ $errors->has('meta_keywords') ? 'alert alert-danger' : '' }}"
                       >{{   old('meta_keywords') }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description"  cols="3"
                         class="form-control {{ $errors->has('meta_description') ? 'alert alert-danger' : '' }}"
                        >{{   old('meta_description') }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <input type="file"  name="image" class="form-control">
                    </div>
                  
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> 
                   

                </div>
           </form>
           @if($errors->any())
           <div class="alert alert-danger"  role="alert">
            <p>There was an error, try again latter!</p>
           </div>
           @endif
        </div>
    </div>
@endsection
