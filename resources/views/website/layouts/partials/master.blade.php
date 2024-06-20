<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    @include('website.layouts.partials.head')
</head>

<body class="@yield('body-class', 'default-class')">
    <div>
        @include('website.layouts.partials.main-header')
        <!-- container -->
        <div>
            @yield('page-header')
            @yield('content')
            @include('website.layouts.partials.footer')

            @include('website.layouts.partials.footer-scripts')
        </div>
</body>

</html>
