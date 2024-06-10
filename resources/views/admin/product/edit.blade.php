@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Product</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        {{-- Ensure the action URL is correct for your route configuration --}}
                        <form action=" " method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category <span style="color:red">*</span></label>
                                    <select class="form-control" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" value="{{ old('name', $data->image) }}">
                                    </div>
                                    
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $data->name) }}" required placeholder="Product Name">
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">  price <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            value="{{ old('price', $data->price) }}" required placeholder="price">
                                    </div>


                                
                                <div class="form-group">
                                    <label for="status">Status <span style="color:red">*</span></label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ old('description', $data->description) }}" placeholder=" description">
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">featured</label>
                                    <input type="text" class="form-control" id="featured" name="featured"
                                        value="{{ old('featured', $data->featured) }}" placeholder=" featured">
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label for="on_sale"> on sale</label>
                                    <input type="text" class="form-control" id="on_sale" name="on sale"
                                        value="{{ old('on sale', $data->on_sale ) }}"
                                        placeholder="on sale ">
                                </div>
                                <div class="form-group">
                                    <label for="top_rated">top_rated </label>
                                    <input type="text" class="form-control" id="on_sale" name=" top_rated"
                                        value="{{ old('top_rated', $data->top_rated ) }}"
                                        placeholder="top_rated ">
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
