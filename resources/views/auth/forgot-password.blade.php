@extends('layouts.main')
@section('content')
<section class=" auth">
    <div class="container">
        <div class="pb-3 row justify-content-center">

            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xl-12">
               
                @if(Session::has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
                @endif

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif 
                    
                
                <div class="bg-white shadow card login-page roundedd border-1 ">
                    <div class="card-body">
                        <h4 class="text-center card-title">Password Reset</h4>
                        <form method="POST" action="{{ route('password.email') }}"  class="mt-4 login-form">
                             @csrf
                            <div class="row justify-content-center m-auto">
                                <div class="col-lg-12 mb-4">
                                    <div class="form-group">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input type="email" class="pl-5 form-control" name ="email" value="{{ old('email') }}" id="email" placeholder="name@example.com" required>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="mb-0 col-lg-12 text-center">
                                    <button class="btn btn-primary btn-block pad" type="submit">Email Password Reset Link</button>
                                </div>
                                <!--end col-->
                                <div class="text-center col-12">
                                    <p class="mt-3 mb-0"><small class="mr-2 text-dark">Repeat Login
                                            ?</small> <a href="{{route('login')}}"
                                            class="text-dark font-weight-bold">Login</a></p>
                                </div>
                                <!--end col-->
                                
                                <div class="text-center col-12">
                                    <p class="mt-4 mb-0"><small class="mr-2 text-dark">&copy; Copyright  {{date('Y')}} &nbsp; {{ config('app.name') }} &nbsp; All Rights Reserved.</small>
                                    </p>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
                <!---->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->



@endsection