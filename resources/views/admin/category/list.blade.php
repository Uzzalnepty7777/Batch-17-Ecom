@extends('admin.master')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Category List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Category Name</th>
                                        <th>Image</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($categories as $category)
                                    <tr class="align-middle">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <img src="{{asset('admin/category/'.$category->image)}}" alt="Category Image" width="100">
                                        </td>
                                        <td>
                                        <a href="{{url('/admin/edit/category/'.$category->id)}}"><span class="badge text-bg-info">Edit</span></a>
                                        <a href="{{url('/admin/delete/category/'.$category->id)}}" onclick="return confirm('Are you sure?')"><span class="badge text-bg-danger">Delete</span></a>
                                        </td>
                                    </tr>
                                       
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$categories->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
