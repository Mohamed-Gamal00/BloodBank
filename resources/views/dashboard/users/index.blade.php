@extends('dashboard.layouts.partials.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">users</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')

    @if (count($data))
        <div class="col-xl-12 px-0">
            <div class="card">
                <div class="card-header pb-0 mb-3">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ route('users.create') }}">

                                <button class="btn btn-outline-dark btn-block font-weight-bold">
                                    <i class="fa fa-plus mx-1"></i>
                                    Add New User
                                </button>
                            </a>
                        </div>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
                                        <td class="align-middle">{{ $user->name }}</td>
                                        <td class="align-middle">{{ $user->email }}</td>
                                        {{-- <td class="align-middle">{{ $user->status }}</td> --}}
                                        <td class="align-middle">
                                            {{ $user->roles_name }}
                                            {{-- @foreach ($user->roles_name as $role)
                                                {{ $role }}<br>
                                            @endforeach --}}
                                        </td>
                                        <td class="align-middle">
                                            <div class="col-sm-6 col-md-4 mg-t-10 mg-md-t-0 p-0">
                                                <a href="{{ route('users.edit', $user->id) }}">
                                                    <button class="btn btn-outline-success btn-with-icon btn-block">
                                                        <i class="typcn typcn-edit m-0"></i>
                                                    </button>
                                                </a>

                                            </div>

                                        </td>
                                        <td class="align-middle">

                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                id="deleteForm{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="col-sm-6 col-md-4 mg-t-10 mg-md-t-0 p-0">
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-with-icon btn-block"
                                                        onclick="confirmDelete({{ $user->id }})">
                                                        <i class="typcn typcn-trash m-0"></i>
                                                    </button>
                                                </div>
                                            </form>

                                            <script>
                                                function confirmDelete(id) {
                                                    if (confirm('Are you sure you want to delete this user?')) {
                                                        document.getElementById('deleteForm' + id).submit();
                                                    }
                                                }
                                            </script>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $data->links() }} {{-- اخلي الباجينيشن يكون بالبوتستراب App serveice provider بروح ل  --}}
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
    @else
        <div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
