@extends('layouts.dash')
@section('content')
    <!--{ PAGE HEADER START }-->
    <div class="page-header">
        <h1 class="page-title">User Account</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account</li>
            </ol>
        </div>
    </div>
    <!--{ PAGE HEADER END }-->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="user-image-section">
                                <div class="d-flex align-items-center flex-column gap-4">
                                    <img class="img-fluid rounded-2" src="{{ asset('profile/'.$user->image) }}" alt="">
                                    <div class="user-info w-100 gap-2 d-flex justify-content-between align-items-center">
                                        <h3 class="mb-2">{{ $user->name }}</h3>
                                        <span class="badge bg-light-secondary fw-bold text-uppercase">Author</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-container">
                                <h5 class="mb-4 fw-semibold">Details</h5>
                                <ul>
                                    <li class="mb-3">
                                      <span class="fw-bold me-2">Full name:</span>
                                      <span>{{ $user->name }}</span>
                                    </li>
                                    <li class="mb-3">
                                      <span class="fw-bold me-2">Email:</span>
                                      <span>{{ $user->email }}</span>
                                    </li>
                                    <li class="mb-3">
                                      <span class="fw-bold me-2">Contact:</span>
                                      <span>{{ $user->phone  }}</span>
                                    </li>
                                    {{-- <li class="mb-3">
                                      <span class="fw-bold me-2">Country:</span>
                                      <span>Russia</span>
                                    </li> --}}
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Account information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user-profile-information.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row gy-4">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Profile Picture</label>
                                        <input type="file" name="image" class="form-control" id="inputGroupFile01">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label" for="name">Full Name</label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label" for="email">E-mail Address</label>
                                        <input class="form-control" type="email" id="email" name="email" readonly value="{{ $user->email }}">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label" for="Phone">Phone number</label>
                                        <input class="form-control" type="text" id="Phone" name="phone" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label" for="state">State</label>
                                        <input class="form-control" type="text" id="state" name="state" value="{{ $user->state }}">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label" for="city">City</label>
                                        <input class="form-control" type="text" id="state" name="city" value="{{ $user->city }}">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label" for="address">Address</label>
                                        <input class="form-control" type="text" id="address" name="address" value="{{ $user->address }}">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Change Password</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user-password.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label" for="NewPassword">New Password</label>
                                        <input class="form-control" type="password" id="NewPassword" name="password">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <label class="form-label" for="ConfirmPassword">Confirm New Password</label>
                                        <input class="form-control" type="password" id="ConfirmPassword" name="password_confirmation" placeholder="">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection