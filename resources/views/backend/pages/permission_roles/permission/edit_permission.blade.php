@extends('backend.layouts.app')

@section('title')
    Create Permission @stop

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
                            <li class="breadcrumb-item"><a href="{{route('backend.permission.index')}}">Permission</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Permission
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
                            <h2 class="card-title h4">Create Permission</h2>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form id="#myForm" action="{{ route('backend.update.permission', $permission->id) }}" method="POST">@csrf

                                <!-- Input name -->
                                <div class="row mb-4">

                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="NameLabel" class="form-label">Permission Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="NameLabel" aria-label="name Arabic" value="{{$permission->name}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Col -->

                                    <!-- complex -->
                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="group_name" class="form-label">Group Name</label>
                                            <!-- Select -->
                                            <select id="group_name" class="form-select form-select-lg mb-3 @error('group_name') is-invalid @enderror" id="group_name" name="group_name">
                                                <option selected disabled>Select Group</option>

                                                <option  value="Users" {{$permission->group_name == 'Users'?'selected':''}} > Users </option>
                                                <option  value="Complexes" {{$permission->group_name == 'Complexes'?'selected':''}} > Complexes </option>
                                                <option  value="Clinics" {{$permission->group_name == 'Clinics'?'selected':''}} > Clinics </option>
                                                <option  value="Doctors" {{$permission->group_name == 'Doctors'?'selected':''}} > Doctors </option>
                                                <option  value="Home Service" {{$permission->group_name == 'Home Service'?'selected':''}} > Home Service </option>
                                                <option  value="Customers feedback" {{$permission->group_name == 'Customers feedback'?'selected':''}} > Customers feedback</option>
                                                <option  value="news and articles" {{$permission->grou_name == 'news and articles'?'selected':''}} > news and articles </option>
                                                <option  value="Jobs" {{$permission->grou_name == 'Jobs'?'selected':''}} > Jobs</option>
                                                <option  value="Applied Job" {{$permission->grou_name == 'Applied Job'?'selected':''}} > Applied Job</option>
                                                <option  value="Departments" {{$permission->grou_name == 'Departments'?'selected':''}} > Departments</option>
                                                <option  value="Slide show" {{$permission->grou_name == 'Slide show'?'selected':''}} > Slide show</option>
                                                <option  value="All Images website" {{$permission->grou_name == 'All Images website'?'selected':''}} > All Images website</option>
                                                <option  value="Statistics Numbers" {{$permission->grou_name == 'Statistics Numbers'?'selected':''}} > Statistics Numbers</option>
                                                <option  value="Translations" {{$permission->grou_name == 'Translations'?'selected':''}} > Translations</option>
                                                <option  value="All Permission" {{$permission->grou_name == 'All Permission'?'selected':''}} > All Permission</option>

{{--                                            @foreach(\App\Models\Complex::get() as $complex)--}}
{{--                                                    <option value="{{$complex->id}}" {{$complex->id==old('complex_id')?'selected':''}}>{{$complex->name_ar}}</option>--}}
{{--                                                @endforeach--}}
                                            </select>
                                            <!-- End Select -->
                                            @error('group_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End-->

                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{route('backend.permission.index')}}" class="btn btn-white">Back</a>
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
