@extends('website.layouts.partials.master')
@section('body-class', 'signin-account')

@section('css')
@endsection
@section('page-header')
@endsection
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form action="{{ route('check-client') }}" method="POST">
                    @csrf
                    <div class="logo">
                        <img src="{{ asset('website/imgs/logo.png') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="الجوال">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="كلمة المرور">
                    </div>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="{{ asset('website/imgs/complain.png') }}">
                            <a href="#">هل نسيت كلمة المرور</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <a href="">
                                <button class="btn btn-group-sm w-100">
                                    دخول
                                </button>
                            </a>
                        </div>
                        <div class="col-md-6 left">
                            <a href="create-account.html">انشاء حساب جديد</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
