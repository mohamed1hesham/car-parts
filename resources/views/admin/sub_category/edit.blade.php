@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Sub Category</h1>
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
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category <span style="color:red">*</span></label>
                                    <select class="form-control" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>


                                    
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Sub Category Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $data->name) }}" required placeholder="Sub Category Name">
                                </div>




                                <div class="form-group">
                                    <label for="slug">Slug <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ old('slug', $data->slug) }}" required placeholder="Example: unique-slug">
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
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        value="{{ old('meta_title', $data->meta_title) }}" placeholder="Meta Title">
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description">{{ old('meta_description', $data->meta_description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                        value="{{ old('meta_keywords', $data->meta_keywords) }}"
                                        placeholder="Meta Keywords">
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
