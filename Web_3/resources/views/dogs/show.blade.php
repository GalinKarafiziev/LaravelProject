@extends('layouts.app')

@section('content')
    <img src="
                            https://i.ytimg.com/vi/wRx3Uvcktm8/maxresdefault.jpg
                            " width=70%" height="300">
    <br>
    {{$dog->name}}
    <br>
    <h2>About me</h2>
    {!!$dog->body!!}
    <br>
    <small>Written on {{$dog->created_at}}</small>
    <br>

    <a class="btn btn-dark" href="/">Go Back</a>
<a href="/dogs/{{$dog->id}}/edit" class="btn btn-dark">Edit</a>
{!! Form::open(['action'=>['DogsController@destroy', $dog->id] , 'method'=>'POST', 'class'=>'pull-right']) !!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!! Form::close() !!}
@endsection
