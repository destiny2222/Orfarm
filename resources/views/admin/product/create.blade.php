@extends('layouts.master')
@section('heading', 'Create Product')
@section('content')
<div class="container-xxl">

    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product-name" class="form-label">Product Name</label>
                                    <input type="text" id="product-name" name="title" class="form-control" placeholder="Items Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="product-categories" class="form-label">Product Categories</label>
                                <select class="form-control" id="product-categories" data-choices data-choices-groups data-placeholder="Select Categories" name="category_id">
                                    <option value="">Choose a categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="product-stock" class="form-label">Stock</label>
                                    <input type="number" id="product-stock" name="availability" class="form-control" placeholder="Quantity">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="gender" class="form-label">Featured</label>
                                <select name="featured" class="form-control" id="gender" data-choices data-choices-groups data-placeholder="Select Gender">
                                    <option value="">Select Featured</option>
                                    @foreach ($featured as $featured)
                                    <option value="{{ $featured }}">{{ $featured }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="gender" class="form-label">Badge</label>
                                <select name="badge" class="form-control" id="gender" data-choices data-choices-groups data-placeholder="Select Gender">
                                    <option value="">Select Badge</option>
                                    @foreach ($badges as $badge)
                                    <option value="{{ $badge }}">{{ $badge }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control bg-light-subtle" id="description" name="description" rows="7" placeholder="Short description about the product"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pricing Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <form>
                                    <label for="product-price" class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text fs-20"><i class='bx bx-dollar'></i></span>
                                        <input type="number" id="product-price" name="price" step="0.01" class="form-control" placeholder="00.00">
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <label for="product-discount" class="form-label">Discount</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text fs-20"><i class='bx bxs-discount'></i></span>
                                    <input type="number" id="product-discount" name="discount" step="0.01" class="form-control" placeholder="000">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="product-stock" class="form-label">Status</label>
                                <select name="status" class="form-control" id="choices-multiple-remove-button" data-choices data-choices-removeItem">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Product Photo</h4>
                    </div>
                    <div class="card-body">
                        <!-- File Upload -->
                       <input type="file" name="images[]" id="actual-btn" class="form-control" multiple/>
                        

                        {{-- <div class="upload-box" id="uploadBox">
                            <div class="fallback">
                                <input id="fileInput" name="images[]" hidden type="file" multiple />
                            </div>
                            <div class="dz-message needsclick">
                                <i class="bx bx-cloud-upload fs-48 text-primary"></i>
                                <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to browse</span></h3>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary w-100">Create Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    // Select the elements
    const uploadBox = document.getElementById('uploadBox');
    const fileInput = document.getElementById('fileInput');

    // Add click event listener to the upload box
    uploadBox.addEventListener('click', () => {
        fileInput.click(); // Trigger the hidden input file dialog
    });

    // Add event listener for file selection
    fileInput.addEventListener('change', (event) => {
        const files = event.target.files;
        console.log('Selected files:', files); // You can handle the selected files here
    });
</script>
@endsection
