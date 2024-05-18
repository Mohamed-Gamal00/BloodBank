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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Reset Password</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <div class="my-5">
        @if (Session::has('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
         @include('dashboard.layouts.partials.error_validation')
        <form method="POST" action="{{ route('reset_password.update') }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="current_pwd">Current Password</label>
                <input type="password" name="current_pwd" class="form-control" id="current_pwd" aria-describedby="emailHelp"
                    placeholder="Enter current password">

                @error('current_pwd')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_pwd">New Password</label>
                <input type="password" name="new_pwd" class="form-control" id="new_pwd" aria-describedby="emailHelp"
                    placeholder="Enter new password">

                @error('new_pwd')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_pwd_confirmation">Confirm New Password</label>
                <input type="password" name="new_pwd_confirmation" class="form-control" id="new_pwd_confirmation"
                    aria-describedby="emailHelp" placeholder="Confirm new password">

                @error('new_pwd_confirmation')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
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
