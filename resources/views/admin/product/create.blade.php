@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card card-primary card-outline mt-5">
            <div class="card-header">
                <div class="card-title">Add New Product</div>
            </div>
            <form action="{{ url('admin/store/product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Product Name (*)</label>
                            <input type="text" class="form-control" placeholder="Enter Product Name*" name="name"
                                required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="sku_code" class="form-label">Product Code (Optional)</label>
                            <input type="text" class="form-control" id="sku_code" placeholder="Enter Product Code"
                                name="sku_code" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="cat_id" class="form-label">Select Category (*)</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option selected disabled> Select Category</option>
                                <option value="1">Category1</option>
                                <option value="2">Category2</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="sub_cat_id" class="form-label">Select Sub-Category (Optional)</label>
                            <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                <option selected disabled> Select Subcategory</option>
                                <option value="1">Subcategory1</option>
                                <option value="2">Subcategory2</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="buying_price" class="form-label">Buying Price (*)</label>
                            <input type="number" class="form-control" id="buying_price" placeholder="Enter Buying Price*"
                                name="buying_price" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="regular_price" class="form-label">Regular Price (*)</label>
                            <input type="number" class="form-control" id="regular_price" placeholder="Enter Regular Price*"
                                name="regular_price" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="discount_price" class="form-label">Discount Price (Optional)</label>
                            <input type="number" class="form-control" id="discount_price"
                                placeholder="Enter Discount Price" name="discount_price" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qty" class="form-label">Quantity (*)</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                placeholder="Enter Quantity*" required />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="product_type" class="form-label">Select Product Type (*)</label>
                            <select name="product_type" id="product_type" class="form-control">
                                <option value="hot">Hot Products</option>
                                <option value="new">New Arrivals</option>
                                <option value="regular">Regular Products</option>
                                <option value="discount">Discount Products</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="input-group mb-3 col-md-6">
                    <input type="file" accept="image/*" class="form-control" id="inputGroupFile02" name="image"
                        required />
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="summernote" class="form-label">Product Description</label>
                    <textarea class="form-control" id="summernote" placeholder="Enter Product Description*" name="description"></textarea>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="summernote2" class="form-label">Product Policy</label>
                    <textarea class="form-control" id="summernote2" placeholder="Enter Product Policy*" name="product_policy" required></textarea>
                </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Upload</button>
    </div>
    </form>
    </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
     <script>
        $(document).ready(function() {
            $('#summernote2').summernote();
        });
    </script>
@endpush
