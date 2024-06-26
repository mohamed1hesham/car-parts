@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    @include('admin.layouts.message')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>product List</h1>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-6" style="text-align:right">
                        <a href="{{ url('admin/product/add') }}" class="btn btn-primary">Add New product</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        @include('admin.layouts.message')
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">product List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>image</th>
                                        <th>Product Name</th>
                                        <th>price</th>
                                        <th>description</th>
                                        <th>featured</th>
                                        <th>on sale</th>
                                        <th>top rated</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ optional($value->category)->name }}</td>

                                            <td>
                                                <img src="{{ asset('ProductImages/' . $value->image) }}" alt="Product Image"
                                                    class="product-image" style="width: 100px; height: auto;">
                                            </td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->price }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td>{{ $value->featured }}</td>
                                            <td>{{ $value->on_sale }}</td>
                                            <td>{{ $value->top_rated }}</td>
                                            <td>{{ $value->created_by }}</td>
                                            <td>{{ $value->status == 0 ? 'Inactive' : 'Active' }}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>

                                            <td>
                                                <a href="{{ url('admin/product/edit/' . $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a
                                                    href="{{ url('admin/product/delete/' . $value->id) }}"class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
