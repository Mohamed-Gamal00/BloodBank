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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Clients</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')

    @if (count($clients))
        <div class="col-xl-12 px-0">
            <div class="card">
                <div class="card-header pb-0 mb-3">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ URL::current() }}" method="GET" class="d-flex justify-content-between mb-4">
                        <input name="query" placeholder="Name" class="mx-2 form-control" />
                        <select name="city" class="form-control mx-2" id="">
                        <option value="">city</option>
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <select name="bloodType" class="form-control mx-2" id="">
                            <option value="">bloodtype</option>
                            @foreach ($bloodTypes as $bloodType)
                                <option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-dark">Filter</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>blood type</th>
                                    <th>last donation date</th>
                                    <th>date of birth</th>
                                    <th>city</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <th class="align-middle" scope="row">{{ $loop->iteration }}</th>
                                        <td class="align-middle">{{ $client->name }}</td>
                                        <td class="align-middle">{{ $client->email }}</td>
                                        <td class="align-middle">{{ $client->phone }}</td>
                                        <td class="align-middle text-center">{{ $client->bloodType->name }}</td>
                                        <td class="align-middle">{{ $client->last_donation_date }}</td>
                                        <td class="align-middle">{{ $client->d_o_b }}</td>
                                        <td class="align-middle">{{ $client->city->name }}</td>
                                        <td class="align-middle">

                                            <form action="{{ route('client.destroy', $client->id) }}" method="POST"
                                                id="deleteForm{{ $client->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="col-sm-6 col-md-4 mg-t-10 mg-md-t-0 p-0">
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-with-icon btn-block"
                                                        onclick="confirmDelete({{ $client->id }})">
                                                        <i class="typcn typcn-trash m-0"></i>
                                                    </button>
                                                </div>
                                            </form>

                                            <script>
                                                function confirmDelete(id) {
                                                    if (confirm('Are you sure you want to delete this client?')) {
                                                        document.getElementById('deleteForm' + id).submit();
                                                    }
                                                }
                                            </script>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $clients->links() }} {{-- اخلي الباجينيشن يكون بالبوتستراب App serveice provider بروح ل  --}}
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
    @else
        <div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
            <strong>OOps!</strong> The item you are looking for is not found
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
