@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4> 
        </div>
        <div class="card-body">
           <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form_select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'alert alert-danger' : '' }}"  name="name" value={{ old('name') }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control {{ $errors->has('slug') ? 'alert alert-danger' : '' }}" name="slug" value={{ old('slug') }}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <input type="text" class="form-control {{ $errors->has('small_description') ? 'alert alert-danger' : '' }}" 
                        name="small_description" value={{ old('small_description') }}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description"   rows="3" 
                        class="form-control {{ $errors->has('description') ? 'alert alert-danger' : '' }}">
                        {{ old('description') }}
                        
                        </textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Original price</label>
                        <input type="number" class="form-control {{ $errors->has('original_price') ? 'alert alert-danger' : '' }}" 
                        name="original_price" value={{ old('original_price') }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Selling price</label>
                        <input type="number" class="form-control {{ $errors->has('selling_price') ? 'alert alert-danger' : '' }}" 
                        name="selling_price" value={{ old('selling_price') }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control {{ $errors->has('tax') ? 'alert alert-danger' : '' }}" 
                        name="tax" value={{ old('tax') }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control {{ $errors->has('qty') ? 'alert alert-danger' : '' }}" 
                        name="qty" value={{ old('qty') }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status">trending</label>
                        <input type="checkbox" name="trending" >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control {{ $errors->has('meta_title') ? 'alert alert-danger' : '' }}" 
                        name="meta_title" value={{ old('meta_title') }}>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords"  cols="3" class="form-control {{ $errors->has('meta_keywords') ? 'alert alert-danger' : '' }}">
                            {{ old('meta_keywords')  }}
                        </textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description"  cols="3" class="form-control {{ $errors->has('meta_description') ? 'alert alert-danger' : '' }}">
                            {{ old('meta_description')  }}
                        </textarea>
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
