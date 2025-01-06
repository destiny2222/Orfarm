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
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->

<!-- blog-area-start -->
<section class="blog-area pt-80">
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-4">
                <div class="tpblog__item tpblog__item-2 mb-20">
                    <div class="tpblog__thumb fix">
                        <a href="{{ route('blog.details',$post->slug) }}"><img src="{{ asset('upload/post/'.$post->image) }}" alt=""></a>
                    </div>
                    <div class="tpblog__wrapper">
                        <div class="tpblog__entry-wap">
                            <span class="post-data"><a href="{{ route('blog.details',$post->slug) }}">{{ $post->created_at->format('M d Y') }}</a></span>
                        </div>
                        <h4 class="tpblog__title"><a href="{{ route('blog.details',$post->slug) }}">{{ \Str::limit($post->title, 100) }}</a></h4>
                        <p>{!! \Str::limit($post->description, 200) !!}</p>
                        <div class="tpblog__details">
                            <a href="{{ route('blog.details',$post->slug) }}">Continue reading <i class="icon-chevrons-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                <div class="basic-pagination text-center mb-80">
                    @if ($posts->hasPages())
                    <nav>
                        <ul class="justify-content-end mb-0">
                            {{-- Previous Page Link --}}
                            @if ($posts->onFirstPage())
                            <li class="page-item disabled">
                                <span class=""><i class="fa fa-angle-left"></i></span>
                            </li>
                            @else
                            <li>
                                <a class="" href="{{ $posts->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i></a>
                            </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                            @if ($page == $posts->currentPage())
                            <li class=" active">
                                <span class="current">{{ $page }}</span>
                            </li>
                            @else
                            <li>
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($posts->hasMorePages())
                            <li>
                                <a class="" href="{{ $posts->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <span class=""><i class="fa fa-angle-right"></i></span>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-area-end -->
@endsection
