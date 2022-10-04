@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4> 
        </div>
        <div class="card-body">
           <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form_select">


                        {{-- <select class="form_select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach --}}

                            <option value="">{{ $products->category->name }}</option>
                          </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'alert alert-danger' : '' }}" name="name" value="{{ $products->name}}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control {{ $errors->has('slug') ? 'alert alert-danger' : '' }}" name="slug" value="{{ $products->slug}}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <input type="text" class="form-control {{ $errors->has('small_description') ? 'alert alert-danger' : '' }}" name="small_description"  value="{{ $products->small_description }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description"  rows="3" class="form-control {{ $errors->has('description') ? 'alert alert-danger' : '' }}">
                            {{ $products->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Original price</label>
                        <input type="number" class="form-control {{ $errors->has('original_price') ? 'alert alert-danger' : '' }}" name="original_price" 
                        value="{{ $products->original_price }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Selling price</label>
                        <input type="number" class="form-control {{ $errors->has('selling_price') ? 'alert alert-danger' : '' }}"
                         name="selling_price" value="{{ $products->selling_price}}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control {{ $errors->has('tax') ? 'alert alert-danger' : '' }}"
                         name="tax" value="{{ $products->tax }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control {{ $errors->has('qty') ? 'alert alert-danger' : '' }}" 
                        name="qty" value="{{ $products->qty }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status"  {{ $products->status == "1" ? 'checked' : '' }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">trending</label>
                        <input type="checkbox" name="trending" {{ $products->trending == "1" ? 'checked' : ''}}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control  {{ $errors->has('meta_title') ? 'alert alert-danger' : '' }}"
                         name="meta_title" value="{{ $products->meta_title }}">
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea name="meta_keywords"  cols="3" class="form-control   {{ $errors->has('meta_keywords') ? 'alert alert-danger' : '' }}">
                            {{ $products->meta_keywords }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description"  cols="3" class="form-control {{ $errors->has('meta_description') ? 'alert alert-danger' : '' }}">
                            {{ $products->meta_description }}</textarea>
                    </div>

                    @if ($products->image)
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="">
                    @endif
                    <div class="col-md-12">
                        <input type="file"  name="image" class="form-control">
                    </div>
                   
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
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
