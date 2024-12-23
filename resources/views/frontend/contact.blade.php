@extends('layouts.main')
@section('content')

<!-- breadcrumb-area-start -->
<div class="breadcrumb__area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                        <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                        <span class="dvdr">/</span>
                        <span>Contact Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->




<!-- map-area-start -->
<section class="map-area tpmap__box">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10">
                <div class="tpform__wrapper pt-120 pb-80 ml-60">
                    <h4 class="tpform__title">LEAVE A REPLY</h4>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <div class="tpform__box">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row gx-7">
                                <div class="col-lg-6">
                                    <div class="tpform__input mb-20">
                                        <input type="text" name="name" placeholder="Your Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tpform__input mb-20">
                                        <input type="email" name="email" placeholder="Your Email *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tpform__input mb-20">
                                        <input type="text"  name="subject" placeholder="Subject *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tpform__input mb-20">
                                        <input type="text" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="tpform__textarea">
                                        <textarea name="message" placeholder="Message"></textarea>
                                        <div class="tpform__textarea-check mt-20 mb-25">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault01">
                                                <label class="form-check-label" for="flexCheckDefault01">
                                                    I am bound by the terms of the <a href="#">Service I accept Privacy Policy.</a>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit">Send message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- map-area-end -->

@endsection
