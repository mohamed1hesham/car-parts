@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Add New Categry</h1>
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
                                    <label>Category Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" required placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label>slug <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="slug" value="{{old('slug')}}" required placeholder="slug Ex .URL">
                                </div>
                            
                                <div class="form-group">
                                    <label>status <span style="color:red">*</span></label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                
                                
                                <hr>
                                <div class="form-group">
                                    <label>meta title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{old('meta_keywords')}}" required placeholder="meta title">
                                </div>
                            
                            <div class="form-group">
                                <label>meta description </label>
                                <textarea class="form-control" name="meta_description" id=""  placeholder="meta description" >{{old('meta_description')}}</textarea>
                            </div>


                            <div class="form-group">
                                <label>meta keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" value="{{old('meta_keywords')}}" required placeholder="meta keywords">
                            </div>
                        </div>

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
