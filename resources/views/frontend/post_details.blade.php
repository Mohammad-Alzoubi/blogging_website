@extends('frontend.layouts.app')

@section('title')
{{$post->title}} @stop

@section('content')


    <!-- Page content-->
    <!-- Container-->
    <section class="container pt-5 mt-5">
        <!-- Breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="pt-lg-3 pb-lg-4 pb-2 breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('post.index')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-9 col-xl-8 pe-lg-4 pe-xl-0">
                <!-- Post title + post meta-->
                <h1 class="pb-2 pb-lg-3">{{$post->title}}</h1>
                <div class="d-flex flex-wrap align-items-center justify-content-between border-bottom mb-4">
                    <div class="d-flex align-items-center mb-4 me-4"><span class="fs-sm me-2">By:</span><a class="nav-link position-relative fw-semibold p-0" href="#" data-scroll data-scroll-offset="80">{{$post->user->name}}<span class="d-block position-absolute start-0 bottom-0 w-100" style="background-color: currentColor; height: 1px;"></span></a></div>
                    <div class="d-flex align-items-center mb-4"><span class="fs-sm me-2">Share post:</span>
                        <div class="d-flex"><a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="ai-instagram"></i></a><a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i class="ai-facebook"></i></a><a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Telegram"><i class="ai-telegram fs-sm"></i></a><a class="nav-link p-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"><i class="ai-twitter"></i></a></div>
                    </div>
                </div>
                <!-- Post content-->
                <p class="fs-lg pt-2 pt-sm-3">{{$post->description}}</p>
                <p class="fs-lg mb-3">Ut pellentesque bibendum dignissim a molestie. Ultrices diam ut vel neque tincidunt eget. Sed ut quis sit semper nunc at etiam lacinia. Quam laoreet eget id sapien a pharetra, ornare diam dignissim. Lorem amet nisl, enim mi aenean mauris. Porta nisl a ultrices ut libero id. Gravida a mi neque, tristique justo, et pharetra. Laoreet nulla est nulla cras ac arcu sed mattis tristique. Morbi convallis suspendisse enim blandit massa. Cursus augue dui mattis morbi velit.</p>

            </div>
            <!-- Sidebar (offcanvas on sreens < 992px)-->
            <aside class="col-lg-3 offset-xl-1">
                <div class="offcanvas-lg offcanvas-end" id="sidebar">
                    <div class="offcanvas-header">
                        <h4 class="offcanvas-title">Sidebar</h4>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" data-bs-target="#sidebar"></button>
                    </div>
                    <div class="offcanvas-body">
                        <!-- Popular posts-->
                        <h4 class="pt-1 pt-lg-0 mt-lg-n2">Related by Author:</h4>
                        <div class="mb-lg-5 mb-4">
                            @foreach($posts_most as $post1)
                            <article class="position-relative">
                                <h5 class="h6 mt-3 mb-0"><a class="stretched-link" href="{{route('post.details', $post1->slug)}}">{{$post1->title}}</a></h5>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <!-- Related articles (carousel) -->
    <section class="container py-5 mt-sm-2 my-md-4 my-xl-5">
        <div class="d-flex align-items-center pb-3 mb-3 mb-lg-4 mt-2 mt-xxl-3">
            <h2 class="h1 mb-0 me-4">Related articles</h2>
            <div class="d-flex ms-auto">
                <button class="btn btn-prev btn-icon btn-sm btn-outline-primary rounded-circle me-3" type="button" id="prev-post"><i class="ai-arrow-left"></i></button>
                <button class="btn btn-next btn-icon btn-sm btn-outline-primary rounded-circle" type="button" id="next-post"><i class="ai-arrow-right"></i></button>
            </div>
        </div>
        <div class="swiper pb-2 pb-sm-3 pb-md-4" data-swiper-options="
      {
        &quot;spaceBetween&quot;: 24,
        &quot;loop&quot;: true,
        &quot;autoHeight&quot;: true,
        &quot;navigation&quot;: {
          &quot;prevEl&quot;: &quot;#prev-post&quot;,
          &quot;nextEl&quot;: &quot;#next-post&quot;
        },
        &quot;breakpoints&quot;: {
          &quot;576&quot;: { &quot;slidesPerView&quot;: 2 },
          &quot;1000&quot;: { &quot;slidesPerView&quot;: 3 }
        }
      }
    ">
            <div class="swiper-wrapper">
                <!-- Post-->
                @foreach($posts_related as $post2)
                <article class="swiper-slide">
                    <div class="position-relative">
                        <img class="rounded-5" src="{{asset('frontend/assets/img/blog/list/02.jpg')}}" alt="Post image">

                        <h3 class="h4 mt-4 mb-0"><a class="stretched-link" href="{{route('post.details', $post2->slug)}}">{{$post2->title}}</a></h3>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
@stop




