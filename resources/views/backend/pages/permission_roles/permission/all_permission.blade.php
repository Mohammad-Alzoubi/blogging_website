@extends('backend.layouts.app')

@section('title')
All permission @stop

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
                            <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">Permissions</h1>
                </div>

                <!-- End Col -->

                <div class="col-sm-auto">
                    <!-- Nav -->
                    <a class="btn btn-primary" href="{{route('backend.add.permission')}}">
                        <i class="bi bi-plus-lg me-1"></i> Create Permission
                    </a>
                    <!-- End Nav -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- alert message -->
        <div class="row justify-content-center">
            <div class="col-6">
                <!-- alert Toast -->
                @if(Session::has('message'))
                    @include('backend.component.alert')
                @endif
            </div>
        </div>
        <!-- End alert message -->

        <!-- Start table -->
        <div class="card">

            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-12 col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-header-title">Permissions</h5>
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
                                <input id="datatableWithSearchInput" type="search" class="form-control" placeholder="Search Permission" aria-label="Search Permission">
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
                        <th>Permission Name</th>
                        <th>Group Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($permissions as $key => $permission)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->group_name}}</td>

                            <th class="table-column-ps-0">
                                <div class="btn-group" role="group" aria-label="Edit group">
                                    <a class="btn btn-white" href="{{route('backend.edit.permission', $permission->id)}}">
                                        <i class="bi-pencil me-1"></i>
                                    </a>
                                    <a class="btn btn-white text-danger" href="#" data-permissionid="{{$permission->id}}" data-bs-toggle="modal" data-bs-target="#delete_permission">
                                        <i class="bi-trash"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="2"></td>
                            <td>
                                <div class="card-body card-body-centered">
                                    <img class="avatar avatar-xxl mb-3" src="{{asset('backend/assets/svg/illustrations/oc-lost.svg')}}" alt="Image Description" data-hs-theme-appearance="default">
                                    <img class="avatar avatar-xxl mb-3" src="{{asset('backend/assets/svg/illustrations-light/oc-error.svg')}}" alt="Image Description" data-hs-theme-appearance="dark">
                                    <p class="card-text">No data to show</p>
                                    <a class="btn btn-white btn-sm" href="{{route('backend.add.permission')}}">Create new Permission</a>
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


            <!-- Modal -->
            <div class="modal fade" id="delete_permission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('backend.delete.permission')}}" method="get">@csrf
                            <div class="modal-body">
                                <input type="hidden" name="id_permission" id="id_permission">
                                Are you sure you want to delete this Permission?
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

        </div>
        <!-- End table -->

    </div>
    <!-- End Content -->

@stop

@push('js')

    <!-- Start delete Admin -->
    <script type="text/javascript">
        $('#delete_permission').on('show.bs.modal', function (event){
            var button     = $(event.relatedTarget)
            var id_permission  = button.data('permissionid')
            var modal      = $(this)
            modal.find('.modal-body #id_permission').val(id_permission);
        })
    </script>
@endpush
