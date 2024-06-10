@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Add New product</h1>
                </div>
            </div>
        </div>
        {{-- <div class="form-group">
            <label>Category <span style="color:red">*</span></label>
            <select class="form-control" name="category_id" required>
                @foreach ($categories as $category)
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
                        <form action="{{ url('admin/product/insert') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category <span style="color:red">*</span></label>
                                    <select class="form-control" name="category_id" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <label>Ptoduct Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        required placeholder="product Name">
                                </div>
                                <div class="form-group">
                                    <label>price <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}"
                                        required placeholder="price">
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
                                    <label>description</label>
                                    <input type="text" class="form-control" name="description"
                                        value="{{ old('description') }}" placeholder="description">
                                </div>
                                <div class="form-group">
                                    <label for="featured">Featured</label>
                                    <br>
                                    <input type="hidden" name="featured" value="0">
                                    <!-- hidden field for unchecked value -->
                                    <input type="checkbox" id="featured" name="featured" value="1">
                                </div>
                                <div class="form-group">
                                    <label>on sale</label>

                                    <br>
                                    <input type="hidden" name="on_sale" value="0">
                                    <!-- hidden field for unchecked value -->
                                    <input type="checkbox" id="on_sale" name="on_sale" value="1">
                                </div>
                                <div class="form-group">
                                    <label>top_rated</label>
                                    <br>
                                    <input type="hidden" name="top_rated" value="0">
                                    <!-- hidden field for unchecked value -->
                                    <input type="checkbox" id="top_rated" name="top_rated" value="1">
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
<script>
    document.getElementById('featured').addEventListener('change', function() {
        this.value = this.checked ? 1 : 0;
    });
    document.getElementById('on_sale').addEventListener('change', function() {
        this.value = this.checked ? 1 : 0;
    });
    document.getElementById('top_rated').addEventListener('change', function() {
        this.value = this.checked ? 1 : 0;
    });
</script>
@section('script')
@endsection
