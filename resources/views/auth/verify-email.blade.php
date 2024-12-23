@extends('layouts.main')
@section('content')
<section class=" auth">
    <div class="container">
        <div class="pb-3 row justify-content-center">

            <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xl-12">

               
                <form method="POST" action="{{ route('verification.send') }}" class="mt-4 login-form">
                <div class="bg-white shadow card login-page roundedd border-1 ">
                    <div class="card-body">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                        <p>{{ __('If you did not receive the email') }},</p>
                            @csrf
                            <div class="mb-0 col-lg-12">
                                <button class="btn btn-primary btn-block pad" type="submit">
                                    {{ __('Resend Verification Email') }}</button>
                            </div>
                            <!--end col-->
                        </form>
                    </div>
                    <!--end row-->
                    <form method="POST" action="{{ route('logout') }}" class="mt-4 login-form">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block pad">
                            {{ __('Log Out') }}
                        </button>
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