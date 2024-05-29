@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Add New Sub Category</h1>
                </div>
            </div>
        </div>
        {{-- <div class="form-group">
            <label>Category <span style="color:red">*</span></label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div> --}}
        
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form action="{{ url('admin/sub_category/insert') }}" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category <span style="color:red">*</span></label>
                                    <select class="form-control" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Sub Category Name">
                                </div>
                                <div class="form-group">
                                    <label>Slug <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" required placeholder="Slug e.g., URL">
                                </div>
                                <div class="form-group">
                                    <label>Status <span style="color:red">*</span></label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}" placeholder="Meta Title">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" name="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="Meta Keywords">
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
