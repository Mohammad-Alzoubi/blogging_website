@extends('backend.layouts.app')

@section('title'){{auth()->user()->name}}@stop

@push('style')
@endpush

@section('content')

    <div class="content container-fluid">
            <nav aria-label="breadcrumb">
                <ol id="w0" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{auth()->user()->name}}</li>
                </ol>
            </nav>
            <div class="content container-fluid">

                <!-- alert Toast -->
                @if(Session::has('message'))
                    @include('backend.component.alert')
                @endif

                <div class="row justify-content-lg-center">
                    <div class="col-lg-10">
                        <!-- Profile Cover -->
                        <div class="profile-cover">
                            <div class="profile-cover-img-wrapper">
                                <img class="profile-cover-img" src="{{asset('backend/assets/img/1920x400/img2.jpg')}}" alt="{{auth()->user()->name}}">
                            </div>
                        </div>
                        <!-- End Profile Cover -->

                        <!-- Profile Header -->
                        <div class="text-center mb-5">
                            <!-- Avatar -->
                            <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
                                <img class="avatar-img"
                                     src="{{asset('backend/assets/img/160x160/img1.jpg')}}"
                                     alt="{{auth()->user()->name}}">
                            </div>
                            <!-- End Avatar -->

                            <h1 class="page-header-title">
                                {{auth()->user()->name}} </h1>

                        </div>
                        <!-- End Profile Header -->

                        <div class="row">
                            <div class="col-lg-4">

                                <!-- Sticky Block Start Point -->
                                <div id="accountSidebarNav" style=""></div>

                                <!-- Card -->
                                <div class="js-sticky-block card mb-3 mb-lg-5" data-hs-sticky-block-options="{
                                     &quot;parentSelector&quot;: &quot;#accountSidebarNav&quot;,
                                     &quot;breakpoint&quot;: &quot;lg&quot;,
                                     &quot;startPoint&quot;: &quot;#accountSidebarNav&quot;,
                                     &quot;endPoint&quot;: &quot;#stickyBlockEndPoint&quot;,
                                     &quot;stickyOffsetTop&quot;: 20
                                   }" style="">
                                    <!-- Header -->
                                    <div class="card-header">
                                        <h4 class="card-header-title">Profile</h4>
                                        <div class="me-auto">
                                        </div>
                                    </div>
                                    <!-- End Header -->

                                    <!-- Body -->
                                    <div class="card-body">
                                        <ul class="list-unstyled list-py-2 text-dark mb-0">
                                            <li class="pb-0"><span class="card-subtitle">About</span></li>
                                            <li><i class="bi-person dropdown-item-icon"></i> {{auth()->user()->name}}</li>
                                            <li><i class="bi-clock-history dropdown-item-icon"></i> Joined on {{auth()->user()->created_at->format('d F Y')}}</li>

                                            <li class="pt-4 pb-0"><span class="card-subtitle">Contacts</span></li>
                                            <li><i class="bi-mailbox dropdown-item-icon"></i> {{auth()->user()->email}}</li>

                                        </ul>
                                    </div>
                                    <!-- End Body -->
                                </div>
                                <!-- End Card -->
                            </div>
                            <div class="col-lg-8">
                                <div class="d-grid gap-3 gap-lg-5">
                                    <!-- Card -->
                                    <div class="card">
                                        <!-- Header -->
                                        <div class="card-header card-header-content-between">
                                            <h4 class="card-header-title">Details profile</h4>
                                        </div>
                                        <!-- End Header -->

                                        <!-- Body -->
                                        <div class="card-body" style="">
                                            <!-- name -->
                                            <div class="row mb-4">
                                                <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name </label>

                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-sm-vertical">
                                                        <input type="text" class="form-control" id="firstNameLabel" disabled value="{{auth()->user()->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- email -->
                                            <div class="row mb-4">
                                                <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-sm-vertical">
                                                        <input type="text" class="form-control" id="firstNameLabel" disabled value="{{auth()->user()->email}}">
                                                    </div>
                                                </div>
                                            </div>
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
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>

@stop
