@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card card-primary card-outline mt-5">
            <div class="card-header">
                <div class="card-title">Edit Product</div>
            </div>
            <form action="{{ url('admin/update/product/' . $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Product Name (*)</label>
                            <input type="text" class="form-control" placeholder="Enter Product Name*"
                                value="{{ $product->name }}" name="name" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="sku_code" class="form-label">Product Code (Optional)</label>
                            <input type="text" value="{{ $product->sku_code }}" class="form-control" id="sku_code"
                                placeholder="Enter Product Code" name="sku_code" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="cat_id" class="form-label">Select Category (*)</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option selected disabled> Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"@if ($product->cat_id == $category->id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="sub_cat_id" class="form-label">Select Sub-Category (Optional)</label>
                            <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                <option selected disabled> Select Subcategory</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"
                                        @if ($product->sub_cat_id == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="form-group" id="color_fields">
                                <label for="color" class="form-label">Color (Optional)</label>
                                <input type="text" class="form-control mb-2" id="color" placeholder="Enter Color"name="color[]" multiple />
                                @foreach ($colors as $color)
                                    <input type="text" class="form-control" id="color" value="{{ $color->name }}" placeholder="Enter Color"name="color[]" multiple />
                                    <a href="{{url('admin/delete/color/'.$color->id) }}" class="btn btn-danger btn-sm mb-2">Delete</a>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-success float-end" id="add_color">Add Color</button>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="form-group" id="size_fields">
                                <label for="size" class="form-label">Size (Optional)</label>
                                <input type="text" class="form-control " id="size" placeholder="Enter Size"name="size[]" multiple />
                                @foreach ($sizes as $size)
                                    <input type="text" class="form-control mb-2" id="size" value="{{ $size->name }}" placeholder="Enter Size"name="size[]" multiple />
                                    <a href="{{url('admin/delete/size/'.$size->id) }}" class="btn btn-danger btn-sm mb-2">Delete</a>
                                    @endforeach
                            </div>
                            <button type="button" class="btn btn-success float-end" id="add_size">Add Size</button>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="buying_price" class="form-label">Buying Price (*)</label>
                            <input type="number" class="form-control" id="buying_price"
                                value="{{ $product->buying_price }}" placeholder="Enter Buying Price*" name="buying_price"
                                required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="regular_price" class="form-label">Regular Price (*)</label>
                            <input type="number" class="form-control" id="regular_price"
                                value="{{ $product->regular_price }}" placeholder="Enter Regular Price*"
                                name="regular_price" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="discount_price" class="form-label">Discount Price (Optional)</label>
                            <input type="number" class="form-control" value="{{ $product->discount_price }}"
                                id="discount_price" placeholder="Enter Discount Price" name="discount_price" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="qty" class="form-label">Quantity (*)</label>
                            <input type="number" class="form-control" value="{{ $product->qty }}" id="qty"
                                name="qty" placeholder="Enter Quantity*" required />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="product_type" class="form-label">Select Product Type (*)</label>
                            <select name="product_type" id="product_type" class="form-control">
                                <option value="hot" @if ($product->product_type == 'hot') selected @endif>Hot Products</option>
                                <option value="new" @if ($product->product_type == 'new') selected @endif>New Arrivals
                                </option>
                                <option value="regular" @if ($product->product_type == 'regular') selected @endif>Regular Products
                                </option>
                                <option value="discount" @if ($product->product_type == 'discount') selected @endif>Discount
                                    Products</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="input-group mb-3 col-md-6">
                    <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                    <label class="input-group-text" for="image">Upload Main Image(*)</label>
                </div>
                <img src="{{ asset('admin/product/' . $product->image) }}" width="100" height="100">
                <div class="input-group mb-3 col-md-6 mt-3" >
                    <input type="file" accept="image/*" class="form-control" id="gallery_image"
                        name="gallery_image[]" />
                    <label class="input-group-text" for="gallery_image">Upload Gallery Images(*)</label>
                </div>
                @foreach ($galleryImages as $galleryImage)
                    <img src="{{ asset('admin/galleryimage/'. $galleryImage->gallery_image) }}" width="100" height="100">
                @endforeach
                <div class="mb-3 col-md-12 mt-3">
                    <label for="summernote" class="form-label">Product Description</label>
                    <textarea class="form-control" id="summernote" placeholder="Enter Product Description*" name="description">{{ $product->description }}</textarea>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="summernote2" class="form-label">Product Policy</label>
                    <textarea class="form-control" id="summernote2" placeholder="Enter Product Policy*" name="product_policy">{{ $product->product_policy }}</textarea>
                </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
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
    {{-- Add More Color..... --}}
    <script>
        $(document).ready(function() {
            $("#add_color").click(function() {
                $("#color_fields").append(
                    '<input type="text" class="form-control mb-2" id="color" placeholder="Enter Color" name="color[]" multiple/>'
                    );
            })
        })
    </script>

    {{-- Add More Size..... --}}
    <script>
        $(document).ready(function() {
            $("#add_size").click(function() {
                $("#size_fields").append(
                    '<input type="text" class="form-control mb-2" id="size" placeholder="Enter Size" name="size[]" multiple/>'
                    );
            })
        })
    </script>
@endpush
