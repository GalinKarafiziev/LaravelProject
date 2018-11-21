@extends('layouts.app')

@section('content')
    <img src="
                            https://i.ytimg.com/vi/wRx3Uvcktm8/maxresdefault.jpg
                            " width=70%" height="300">
    <br>
    {{$dog->name}}
    <br>
    <h2>About me</h2>
    {{$dog->body}}
    <br>
    <small>Written on {{$dog->created_at}}</small>
    <br>

    <a class="btn btn-dark" href="/">Go Back</a>
@endsection