@extends('layouts.master')
@section('heading', 'Shipping List')
@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:settings-bold-duotone" class="text-primary fs-20"></iconify-icon>
                        <a href="{{ route('admin.shipping.index') }}">Return back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.shipping.update', $shipping->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-name" class="form-label"> Title</label>
                                    <input type="text" id="meta-name" name="title" value="{{ $shipping->title }}"  class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-tag" class="form-label">Price</label>
                                    <input type="text" id="meta-tag" name="price" value="{{ $shipping->price }}" step="0.01"   class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="status">Status</label>
                                <div class="mb-3">
                                    <select name="status" class="form-control" id="status">
                                        <option value="1"  {{ $shipping->status == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $shipping->status == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button type="submit"  class="btn btn-success w-100">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container Fluid -->
@endsection
 