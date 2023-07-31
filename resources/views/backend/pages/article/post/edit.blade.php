@extends('backend.layouts.app')

@section('title')
Edit post @stop

@push('style')
@endpush

@section('content')

    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.post.index')}}">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit {{$post->title}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->


        <div class="row justify-content-center">
            <div class="col-lg-11">

                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="d-grid gap-3 gap-lg-5">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title h4">Edit {{$post->title}}</h2>
                        </div>


                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form  action="{{route('backend.post.update',$post->id)}}" method="POST">@csrf

                                <!-- Input title -->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="mb-4">
                                            <label for="titleLabel" class="form-label">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="titleLabel" placeholder="title" aria-label="title" value="{{$post->title}}">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End title -->
                                </div>
                                <!-- End title -->


                                <!-- Input description -->
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <label for="description" class="form-label">Description</label>
                                            <div class="editor-quill" id="editor-description">{!! $post->description !!}</div>
                                            <textarea id="description" class="form-control @error('description') is-invalid @enderror d-none" name="description" placeholder="Description Job">{{$post->description}}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End description -->

                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{route('backend.post.index')}}" class="btn btn-white">Back</a>
                                </div>

                            </form>
                            <!-- End Form -->
                        </div>
                        <!-- End Body -->

                    </div>
                    <!-- End Card -->

                </div>

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@stop

@push('js')

    {{-- Initialize QUill editor--}}
    <script>
        //editor-description
        var description = new Quill('#editor-description', {
            modules: {
                toolbar: toolbarOptions,
            },
            placeholder: '',
            theme: 'snow'
        });
        description.on('text-change', function (delta, oldDelta, source) {
            $('#description').val(description.container.firstChild.innerHTML);
        });
    </script>

    {{--add image upload--}}
    <script src="{{asset('backend/assets/vendor/hs-file-attach/dist/hs-file-attach.min.js')}}"></script>
    <script>
        (function() {
            // INITIALIZATION OF FILE ATTACH
            // =======================================================
            new HSFileAttach('.js-file-attach')
        })();
    </script>

@endpush
