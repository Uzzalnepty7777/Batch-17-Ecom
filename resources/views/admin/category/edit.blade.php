@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card card-primary card-outline mt-5">
            <div class="card-header">
                <div class="card-title">Edit Category</div>
            </div>
            <form action="{{url('/admin/update/category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name (*)</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $category->name }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" accept="image/*" class="form-control" id="inputGroupFile02" name="image"/>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <img src="{{asset('admin/category/'.$category->image)}}" height="100" width="100">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
