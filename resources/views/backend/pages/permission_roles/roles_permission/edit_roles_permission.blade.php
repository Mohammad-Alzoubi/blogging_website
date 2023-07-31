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
                            <li class="breadcrumb-item"><a href="{{route('backend.index.roles.permission')}}">Role In Permission</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Role In Permission
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
                            <h2 class="card-title h4">Add Role In Permission</h2>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form action="{{ route('backend.update.role.permission',$role->id) }}" method="POST">@csrf

                                <!-- Input name -->
                                <div class="row mb-4">

                                    <!-- Role -->
                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="firstname" class="form-label"> Roles Name </label>
                                            <h3> {{ $role->name }} </h3>
                                        </div>
                                    </div>

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input @error('permission_id') is-invalid @enderror" type="checkbox" value="" id="customckeck15">
                                        <label class="form-check-label" for="customckeck15">Select All</label>
                                    </div>

                                    @error('permission_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>The permission is required.</strong>
                                            </span>
                                    @enderror

                                    <hr>

                                    @foreach($permission_groups as $group)
                                        <div class="row">
                                            <div class="col-3">
                                                @php
                                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                @endphp

                                                <div class="form-check mb-2 form-check-primary">
                                                    <input class="form-check-input" type="checkbox" value="" id="customckeck1">
                                                    <label class="form-check-label" for="customckeck1">{{ $group->group_name }}</label>
                                                </div>

                                            </div>

                                            <div class="col-9">
                                                @foreach($permissions as $permission)
                                                    <div class="form-check mb-2 form-check-primary">
                                                        <input class="form-check-input" type="checkbox" name="permission[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} value="{{ $permission->id }}" id="customckeck{{ $permission->id }}"  >
                                                        <label class="form-check-label" for="customckeck{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                @endforeach
                                                <br>

                                            </div>

                                        </div> <!-- end row -->
                                    @endforeach

                                </div>
                                <!-- End-->

                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{route('backend.index.roles.permission')}}" class="btn btn-white">Back</a>
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
    <script type="text/javascript">
        $('#customckeck15').click(function(){
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked',true);
            }else{
                $('input[type = checkbox]').prop('checked',false);
            }

        });
    </script>
@endpush
