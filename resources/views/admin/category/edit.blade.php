@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Category</h4> 
        </div>
        <div class="card-body">
           <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">

                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text"  name="name" class="form-control {{ $errors->has('name') ? 'alert alert-danger' : '' }}"
                         value="{{ $category->name }}">
                    </div>

                    <div class="col-md-6">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control  {{ $errors->has('slug') ? 'alert alert-danger' : '' }}" 
                        name="slug" value="{{ $category->slug}}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description"  rows="3" class="form-control {{ $errors->has('description') ? 'alert alert-danger' : '' }}">
                            {{$category->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" {{$category->status == 1? 'checked':''}}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="popular">Popular</label>
                        <input type="checkbox" name="popular" {{ $category->popular == 1? 'checked': ''}}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control {{ $errors->has('meta_title') ? 'alert alert-danger' : '' }}" 
                        name="meta_title" value="{{$category->meta_title}}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords"  cols="3" class="form-control {{ $errors->has('meta_keywords') ? 'alert alert-danger' : '' }}">
                            {{ $category->meta_keywords }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description"  cols="3" class="form-control {{ $errors->has('meta_description') ? 'alert alert-danger' : '' }}">
                            {{ $category->meta_descrip}}</textarea>
                    </div>

                    @if($category->image)
                    <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="">
                    @endif
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
