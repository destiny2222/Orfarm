@extends('layouts.master')
@section('content')
<!-- Start Container Fluid -->
<div class="container-xxl">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class=" d-flex justify-content-between">
                        <h4 class="card-title d-flex align-items-center gap-1">
                            <iconify-icon icon="solar:settings-bold-duotone" class="text-primary fs-20"></iconify-icon>
                            Three Banner Section
                        </h4>
                        <a href="{{ route('admin.home.bannerCreate') }}" class="btn btn-primary">Add new banner</a>
                    </div>
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

    <div class="text-end">
        <a href="#!" class="btn btn-danger">Cancel</a>
        <a href="#!" class="btn btn-success">Save Change</a>
    </div>
</div>
<!-- End Container Fluid -->
@endsection
