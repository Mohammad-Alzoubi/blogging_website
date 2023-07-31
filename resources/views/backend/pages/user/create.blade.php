@extends('backend.layouts.app')

@section('title')
Create User @stop

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
                            <li class="breadcrumb-item"><a href="{{route('backend.user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create User
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
            <div class="col-lg-10">
                <!-- alert Toast -->
                @if(Session::has('message'))
                    @include('backend.component.alert')
                @endif

                <div class="d-grid gap-3 gap-lg-5">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title h4">Create User</h2>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form action="{{route('backend.user.store')}}" method="POST" enctype="multipart/form-data">@csrf
                                <!-- Form -->

                                <!-- name -->
                                <div class="row mb-4">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name </label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="firstNameLabel" placeholder="Full name" aria-label="Full name" value="{{old('name')}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End name -->

                                <!-- email -->
                                <div class="row mb-4">
                                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="{{old('email')}}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End email -->

                                <!-- password -->
                                <div class="row mb-4">
                                    <label for="passwordLabel" class="col-sm-3 col-form-label form-label">Password</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="passwordLabel" placeholder="Password" aria-label="Password" value="{{old('password')}}">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End password -->


                                <!-- Assign Roles -->
                                <div id="accountType" class="row mb-4">
                                    <label for="roleName" class="col-sm-3 col-form-label form-label">Assign Roles</label>
                                    <div class="col-sm-9">
                                        <div class="mb-4">
                                            <!-- Select -->
                                            <select id="roleName" class="form-select form-select-lg mb-3 @error('roles') is-invalid @enderror" name="roles">
                                                <option selected disabled>Select Roles</option>
                                                @foreach($roles as $role)
                                                    <option class="text-capitalize" value="{{$role->id}}" {{$role->id==old('roles')?'selected':''}}>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong> Please Select User Role</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End Assign Roles -->



                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{route('backend.user.index')}}" class="btn btn-white">Back</a>
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

    {{--    add image upload--}}
    <script src="{{asset('backend/assets/vendor/hs-file-attach/dist/hs-file-attach.min.js')}}"></script>
    <script>
        (function() {
            // INITIALIZATION OF FILE ATTACH
            // =======================================================
            new HSFileAttach('.js-file-attach')
        })();
    </script>
@endpush



