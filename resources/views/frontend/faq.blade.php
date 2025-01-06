@extends('layouts.main')
@section('content')
<!-- breadcrumb-area-start -->
<div class="breadcrumb__area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                        <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                        <span class="dvdr">/</span>
                        <span>FAQs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->

<!-- faq-area-start -->
<section class="faq-area pb-80 pt100">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-10">
                <div class="tpfaq">
                    <div class="tpfaq__item mb-45">
                        <h4 class="tpfaq__title mb-40">How can we help you?</h4>
                        @foreach ($faqs as $faq)
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne-{{ $faq->id }}" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne-{{ $faq->id }}">
                                        {{ $faq->title }}
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne-{{ $faq->id }}" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        {!! $faq->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq-area-end -->
@endsection
