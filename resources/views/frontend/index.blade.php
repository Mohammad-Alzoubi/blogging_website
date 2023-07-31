@extends('frontend.layouts.app')

@section('title')
Blog list @stop

@section('content')
    <!-- Page content-->
    <div class="container pt-5 pb-lg-5 pb-md-4 pb-2 my-5">

        <div class="row align-items-center gy-2 mb-4 pb-1 pb-sm-2 pb-lg-3">
            <div class="col-lg-5">
                <h1 class="mb-lg-0">Blog list</h1>
            </div>
        </div>
        @foreach($posts as $post)
            <!-- Post-->
            <article class="row g-0 border-0 mb-4"><a class="col-sm-5 col-lg-4 bg-repeat-0 bg-size-cover bg-position-center rounded-5" href="#" style="background-image: url({{asset('frontend/assets/img/blog/list/02.jpg')}}); min-height: 16rem"></a>
                <div class="col-sm-7 col-lg-8">
                    <div class="pt-4 pb-sm-4 ps-sm-4 pe-lg-4">
                        <h3><a href="{{route('post.details', $post->slug)}}">{{$post->title}}</a></h3>
                        <p class="d-sm-none d-md-block">{{$post->description}}</p>
                        <div class="d-flex flex-wrap align-items-center mt-n2">
                            <a class="nav-link text-muted fs-sm fw-normal p-0 mt-2 me-3" href="#"></a><a class="nav-link text-muted fs-sm fw-normal d-flex align-items-end p-0 mt-2" href="#"></a><span class="fs-sm text-muted mt-2">{{$post->created_at->format('M d Y')}}</span><span class="fs-xs opacity-20 mt-2 mx-3">|</span></div>
                    </div>
                </div>
            </article>
            <!-- Post-->
        @endforeach

        <!-- Pagination-->
        <div class="row gy-3 align-items-center justify-content-center mt-lg-5 pt-2 pt-md-3 pt-lg-0 mb-md-2 mb-xl-4">

            <div class="col col-md-4 col-6 order-md-3 order-2">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm justify-content-end">
                        {{ $posts->links() }}
                    </ul>

                </nav>
            </div>
        </div>

    </div>
@stop




