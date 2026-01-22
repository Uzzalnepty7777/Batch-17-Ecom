@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card card-primary card-outline mt-5">
            <div class="card-header">
                <div class="card-title">Add New Category</div>
            </div>
            <form action="{{url('/admin/store/category')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name (*)</label>
                        <input type="text" class="form-control" id="name" name="name" required/>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" accept="image/*" class="form-control" id="inputGroupFile02" name="image" required />
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
