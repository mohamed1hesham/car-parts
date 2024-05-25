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
                    <h1>Category list</h1>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-6" style="text-align:right">
                        <a href="{{ url('admin/category/add') }}" class="btn btn-primary">Add New Category</a>
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
                            <h3 class="card-title">Category List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>slug</th>
                                        <th>meta title</th>
                                        <th>meta description</th>
                                        <th>meta keywords</th>
                                        <th>created by</th>
                                        <th>Status</th>
                                        <th>created date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->slug }}</td>
                                            <td>{{ $value->meta_title }}</td>
                                            <td>{{ $value->meta_description }}</td>
                                            <td>{{ $value->meta_keywords }}</td>
                                            <td>{{ $value->created_by }}</td>
                                            <td>{{ $value->status == 0 ? 'Aactive' : 'Inactive' }}</td>
                                            <td>{{ date('d-m-y', strtotime($value->created_at)) }}</td>
                                            {{-- @dd($value->id) --}}
                                            <td><a href="{{ url('admin/category/edit/' . $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/category/delete/' . $value->id) }}"
                                                    class="btn btn-danger">delete</a>
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
