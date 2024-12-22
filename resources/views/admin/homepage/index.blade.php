@extends('layouts.master')
@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:settings-bold-duotone" class="text-primary fs-20"></iconify-icon>
                        Three Banner Section
                    </h4>
                    <a href=""></a>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between g-3">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                 <thead class="bg-light-subtle">
                                      <tr>
                                           <th style="width: 20px;">
                                               S/N
                                           </th>
                                           <th>Image</th>
                                           <th>Title</th>
                                           <th>Subtitle</th>
                                           <th>Description</th>
                                           <th>Action</th>
                                      </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($banners as $banner)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td><img src="{{ asset('upload/banner/'.$banner->image) }}" width="50" height="50" alt="" ></td>
                                        <td>
                                            {{ $banner->title }}
                                        </td>
                                        <td>{{ $banner->sub_title }}</td>
                                        
                                        <td>{!! $banner->description !!}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                    <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                    <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                    <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                            </table>
                       </div>
                       <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:settings-bold-duotone" class="text-primary fs-20"></iconify-icon>
                        Two Banner Section
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.home.promotion.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-name" class="form-label"> Title</label>
                                    <input type="text" id="meta-name" name="title" value="{{ $promotion->title ?? ''  }}" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-tag" class="form-label">Subtitle</label>
                                    <input type="text" id="meta-tag" name="subtitle" value="{{ $promotion->subtitle ?? ''  }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <div class="mb-3">
                                            <label for="meta-description" class="form-label">Image</label>
                                            <input type="file" name="image" value="" id="" value="{{ $promotion->image ?? ''  }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="mb-3">
                                            <img src="" class="img-flui" alt="" style="width: 50%; height: auto;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" {{ ($promotion?->status == 1) ? 'checked' : '' }}  type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Active/Inactive</label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="meta-description" class="form-label">Description</label>
                                    <textarea class="form-control bg-light-subtle" id="meta-description" name="description" cols="30" rows="4" placeholder="Type description">{{ $promotion->description ?? ''  }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button type="submit"  class="btn btn-success">Save Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:shop-2-bold-duotone" class="text-primary fs-20"></iconify-icon>Store Settings
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.home.promotion.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-name" class="form-label"> Title</label>
                                    <input type="text" id="meta-name" name="title" value="{{ $dealOfDay->title ?? ''  }}" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="meta-tag" class="form-label">Subtitle</label>
                                    <input type="text" id="meta-tag" name="subtitle" value="{{ $dealOfDay->subtitle ?? ''  }}" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="">Offer time</label>
                                    <input type="datetime" name="offer_end_time" class="form-control" value="{{ $dealOfDay->offer_end_time ?? ''  }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <div class="mb-3">
                                            <label for="meta-description" class="form-label">Image</label>
                                            <input type="file" name="image" value="" id="" value="{{ $dealOfDay->image ?? ''  }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="mb-3">
                                            <img src="" class="img-fluid" alt="" style="width: 50%; height: auto;object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" {{ ($dealOfDay?->status == 1) ? 'checked' : '' }}  type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Active/Inactive</label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="meta-description" class="form-label">Description</label>
                                    <textarea class="form-control bg-light-subtle" id="meta-description" name="description" cols="30" rows="4" placeholder="Type description">{{ $dealOfDay->description ?? ''  }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <button type="submit"  class="btn btn-success">Save Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:box-bold-duotone" class="text-primary fs-20"></iconify-icon>Categories Settings
                    </h4>
                </div>
                <div class="card-body">
                    <p>Category Product Count </p>
                    <div class="d-flex gap-2 align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                No
                            </label>
                        </div>
                    </div>
                    <form>
                        <div class="mb-1 pb-1">
                            <label for="items-par-page" class="form-label">Default Items Per Page</label>
                            <input type="number" id="items-par-page" class="form-control" placeholder="000">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:chat-square-check-bold-duotone" class="text-primary fs-20"></iconify-icon>Reviews Settings
                    </h4>
                </div>
                <div class="card-body">
                    <p>Allow Reviews </p>
                    <div class="d-flex gap-2 align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault3" checked>
                            <label class="form-check-label" for="flexRadioDefault3">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">
                                No
                            </label>
                        </div>
                    </div>
                    <p class="mt-3 pt-1">Allow Guest Reviews </p>
                    <div class="d-flex gap-2 align-items-center mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault5">
                            <label class="form-check-label" for="flexRadioDefault5">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault6" checked>
                            <label class="form-check-label" for="flexRadioDefault6">
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:ticket-bold-duotone" class="text-primary fs-20"></iconify-icon>Vouchers Settings
                    </h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="min-vouchers" class="form-label">Minimum Vouchers</label>
                            <input type="number" id="min-vouchers" class="form-control" placeholder="000" value="1">
                        </div>
                    </form>
                    <form>
                        <div class="">
                            <label for="mex-vouchers" class="form-label">Maximum Vouchers</label>
                            <input type="number" id="mex-vouchers" class="form-control" placeholder="000" value="12">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:ticket-sale-bold-duotone" class="text-primary fs-20"></iconify-icon>Tax Settings
                    </h4>
                </div>
                <div class="card-body">
                    <p>Prices with Tax</p>
                    <div class="d-flex gap-2 align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault7" checked>
                            <label class="form-check-label" for="flexRadioDefault7">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault8">
                            <label class="form-check-label" for="flexRadioDefault8">
                                No
                            </label>
                        </div>
                    </div>
                    <form>
                        <div class="mb-1 pb-1">
                            <label for="items-tax" class="form-label">Default Tax Rate</label>
                            <input type="text" id="items-tax" class="form-control" placeholder="000" value="18%">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   

    <div class="text-end">
        <a href="#!" class="btn btn-danger">Cancel</a>
        <a href="#!" class="btn btn-success">Save Change</a>
    </div>
</div>
<!-- End Container Fluid -->
@endsection
