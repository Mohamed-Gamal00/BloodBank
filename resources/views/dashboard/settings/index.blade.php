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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">settings</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
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
                <div class="my-5">
                    @include('dashboard.layouts.partials.error_validation')
                    <form method="POST" action="{{ route('setting.update', $settings->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">phone</label>
                            <input type="text" name="phone" value="{{ $settings->phone }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

                            @error('phone')
                                <div>
                                    <p class="text-danger">
                                        {{ $errors->first('phone') }}
                                    </p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">email</label>
                            <input type="text" name="email" value="{{ $settings->email }}" class="form-control"
                                id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter name">

                            @error('email')
                                <div>
                                    <p class="text-danger">
                                        {{ $errors->first('email') }}
                                    </p>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail3">facebook link</label>
                            <input type="text" name="fb_link" value="{{ $settings->fb_link }}" class="form-control"
                                id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Enter name">

                            @error('fb_link')
                                <div>
                                    <p class="text-danger">
                                        {{ $errors->first('fb_link') }}
                                    </p>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail4">twitter link</label>
                            <input type="text" name="tw_link" value="{{ $settings->tw_link }}" class="form-control"
                                id="exampleInputEmail4" aria-describedby="emailHelp" placeholder="Enter name">

                            @error('tw_link')
                                <div>
                                    <p class="text-danger">
                                        {{ $errors->first('tw_link') }}
                                    </p>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail5">twitter link</label>
                            <input type="text" name="insta_link" value="{{ $settings->insta_link }}"
                                class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter name">

                            @error('insta_link')
                                <div>
                                    <p class="text-danger">
                                        {{ $errors->first('insta_link') }}
                                    </p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="floatingTextarea6">about app</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="about_app" placeholder="Leave a comment here" id="floatingTextarea6" style="height: 100px">{{ $settings->about_app }}</textarea>
                            </div>

                            @error('about_app')
                                <div>
                                    <p class="text-danger">
                                        {{ $errors->first('about_app') }}
                                    </p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="floatingTextarea7">notification text</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="notification_settings_text" placeholder="Leave a comment here" id="floatingTextarea7" style="height: 100px">{{ $settings->notification_settings_text }}</textarea>
                            </div>

                            @error('notification_settings_text')
                                <div>
                                    <p class="text-danger">
                                        {{ $errors->first('notification_settings_text') }}
                                    </p>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
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
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.settings.js') }}"></script>
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
