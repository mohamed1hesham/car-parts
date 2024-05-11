@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Admin</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{old('name',$getRecord->name)}}" name="name" required placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{old('email',$getRecord->email)}}" name="email" required placeholder="Enter Email">
                                    <div style="color:red">{{$errors->first('email')}}</div>

                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password"  placeholder="Password">
                                    <p>do you want change password so pleass add </p>

                                </div>
                                <div class="form-group">
                                    <label>status</label>
                                    <select class="form-control"  name="status" required>
                                        <option {{($getRecord->status == 0)?'selected':''}} value="0">Active</option>
                                        <option {{($getRecord->status == 1)?'selected':''}} value="0">Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
