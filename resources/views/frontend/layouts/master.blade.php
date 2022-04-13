<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dingo</title>

    @include('frontend.partials.head')
</head>

<body>
<!--::header part start::-->
<header class="main_menu @yield('header')">{{--@if(request()->is('/')) @endif  yiel yerine bunuda yapabilirdim--}}
@include('frontend.partials.header')
</header>
<!-- Header part end-->

@yield('content')

<!-- footer part start-->
@include('frontend.partials.footer')
<!-- footer part end-->

<!-- jquery plugins here-->
<!-- jquery -->
@include('frontend.partials.script')
</body>

</html>
