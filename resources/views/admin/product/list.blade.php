@extends('admin.master')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Product List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Sub-Category Name</th>
                                        <th>Product Type</th>
                                        <th>Buying Price</th>
                                        <th>Regular Price</th>
                                        <th>Discount Price</th>
                                        <th>Quantity</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($products as $product)
                                        <tr class="align-middle">
                                        <td>{{$loop->index + 1}}</td>
                                        <td>
                                        <img src="{{ asset('admin/product/' . $product->image) }}" width="100" height="100"><br>
                                        {{ $product->name }}
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->subcategory->name ?? "Not Found" }}</td>
                                        <td>{{ $product->product_type }}</td>
                                        <td>{{ $product->buying_price }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>{{ $product->discount_price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>
                                        <a href="{{url('admin/edit/product/'.$product->id)}}"><span class="badge text-bg-info">Edit</span></a>
                                        <a href="{{url('admin/delete/product/'.$product->id)}}" onclick="return confirm('Are you sure?')"><span class="badge text-bg-danger">Delete</span></a>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$products->links('pagination::bootstrap-5')}}
                        <!-- /.card-body -->
                        {{-- <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
