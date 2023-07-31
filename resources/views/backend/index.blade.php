@extends('backend.layouts.app')

@section('title')
Dashboard @stop

@push('style')
    <style>
        .bg-overlay {
            background-color: rgb(255, 255, 255);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            z-index: -9999;
            pointer-events: none;
            opacity: 0.5;
        }

        .navbar-bordered{
            border-width:0 !important;
        }

        .avatar-xl.avatar-4x3 {
            width: 10.5625rem !important;
        }

    </style>
@endpush

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Dashboard</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    @if(auth()->user()->can('post.create'))
                    <a class="btn btn-primary" href="{{route('backend.post.create')}}">
                        <i class="bi-person-plus-fill me-1"></i> Create Post
                    </a>
                    @endif
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Start table -->
        <div class="card">

            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-12 col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-header-title">All Posts</h5>
                        </div>
                    </div>

                    <div class="col-auto">
                        <!-- Filter -->
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>
                                <input id="datatableWithSearchInput" type="search" class="form-control" placeholder="Search news" aria-label="Search news">
                            </div>
                            <!-- End Search -->
                        </form>
                        <!-- End Filter -->
                    </div>
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                       data-hs-datatables-options='{
                       "order": [],
                       "search": "#datatableWithSearchInput",
                       "isResponsive": false,
                       "isShowPaging": false,
                       "pagination": "datatableWithSearchPagination"
                    }'>
                    <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>title</th>
                        <th>description</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($posts as $key => $post)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="table-text-start">
                                <a class="d-flex align-items-center" href="{{route('backend.post.edit',[$post->id])}}">
                                    <div class="ms-3">
                                        <span class="d-block h5 text-inherit mb-0">{{$post->title}}</span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="text-wrap" style="">
                                    {!! Str::limit(strip_tags($post->description), 50) !!}
                                </div>
                            </td>
                            <td>
                                {{$post->user->name}}
                            </td>


                            <th class="table-column-ps-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    @if(auth()->user()->can('post.edit'))
                                        <a class="btn btn-white" href="{{route('backend.post.edit',[$post->id])}}">
                                            <i class="bi-pencil me-1"></i>
                                        </a>
                                    @endif
                                    @if(auth()->user()->can('post.delete'))
                                        <a class="btn btn-white text-danger" href="#" data-postid="{{$post->id}}" data-bs-toggle="modal" data-bs-target="#delete_post">
                                            <i class="bi-trash"></i>
                                        </a>
                                    @endif
                                </div>
                            </th>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="delete_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('backend.post.delete',$post->id)}}" method="POST">@csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="id_post" id="id_post">
                                            Are you sure you want to delete this post?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">No,Cancel</button>
                                            <button type="submit" class="btn btn-danger">Yes,Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    @empty
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                <div class="card-body card-body-centered">
                                    <img class="avatar avatar-xxl mb-3" src="{{asset('backend/assets/svg/illustrations/oc-lost.svg')}}" alt="Image Description" data-hs-theme-appearance="default">
                                    <img class="avatar avatar-xxl mb-3" src="{{asset('backend/assets/svg/illustrations-light/oc-error.svg')}}" alt="Image Description" data-hs-theme-appearance="dark">
                                    <p class="card-text">No data to show</p>
                                    <a class="btn btn-white btn-sm" href="{{route('backend.post.create')}}">Create new post</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>
            <!-- End Table -->

            <!-- Footer Pagination -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="d-flex justify-content-center justify-content-sm-end">
                    <nav id="datatableWithSearchPagination" aria-label="Activity pagination"></nav>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->

        </div>
        <!-- End table -->

    </div>
    <!-- End Content -->


{{--        @if(auth()->user()->can('homeService.menu'))--}}
{{--        @endif--}}
    <!-- End Content -->
@stop

@push('js')
@endpush
