<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{env('APP_URL')}}/assets/bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{env('APP_URL')}}/assets/css/magnific-popup.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
          integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="{{env('APP_URL')}}/assets/css/main.css">
    <link rel="icon" href="{{env('APP_URL')}}/assets/img/favicon.ico" type="image/x-icon">
    <meta name="keywords" content="{{isset($keywords)?env('APP_NAME').'::'.$keywords:env('APP_NAME').'::'.__('messages.keywords')}}">
    <meta name="description" content="{{isset($description)?env('APP_NAME').'::'.$description:env('APP_NAME').'::'.__('messages.description')}}">
    <title>{{isset($title)?env('APP_NAME').'::'.$title:env('APP_NAME').'::'.__('messages.main')}}</title>
</head>
<body>
@include('layouts.header')

@section('content')

@show



@include('layouts.footer')

<button id="top">
    <i class="fas fa-angle-double-up"></i>
</button>


<script src="{{env('APP_URL')}}/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="{{env('APP_URL')}}/assets/js/main.js"></script>
<script src="{{env('APP_URL')}}/assets/js/jquery.magnific-popup.min.js"></script>
</body>
</html>
