@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card card-primary card-outline mt-5">
            <div class="card-header">
                <div class="card-title">Edit Subcategory</div>
            </div>
            <form action="{{url('/admin/update/sub-category/'.$subCategory->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Select Category (*)</label>
                       <select name="cat_id" class="form-control" id="cat_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"> @if ($category->id == $subCategory->cat_id)
                                selected
                            @endif{{$category->name}}</option>
                        @endforeach
                       </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Subcategory Name (*)</label>
                        <input type="text" class="form-control" value="{{$subCategory->name}}" id="name" name="name" required/>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
