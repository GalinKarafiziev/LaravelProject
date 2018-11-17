<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{config('app.name', 'DogExchange')}}</title>

</head>
<body>
@include('includes.navbar')
    <div class="container">
        @yield('content')
    </div>
@include('includes.footer')
</body>
</html>