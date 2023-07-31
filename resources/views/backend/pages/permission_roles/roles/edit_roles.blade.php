@extends('backend.layouts.app')

@section('title')
Edit Role @stop

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
                            <li class="breadcrumb-item"><a href="{{route('backend.index.roles')}}">Role</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Role
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

                <div class="d-grid gap-3 gap-lg-5">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title h4">Edit Role</h2>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form action="{{ route('backend.update.roles',$role->id)}}" method="POST">@csrf

                                <!-- Input name -->
                                <div class="row mb-4">

                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="NameLabel" class="form-label">Role Name</label>
                                            <input autofocus type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="NameLabel" aria-label="name Arabic" value="{{$role->name}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Col -->

                                </div>
                                <!-- End-->

                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{route('backend.index.roles')}}" class="btn btn-white">Back</a>
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

@endpush
