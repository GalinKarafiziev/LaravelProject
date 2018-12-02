@extends('layouts.app')

@section('content')
    @php
    $nextID = $dog->id;
    @endphp
    <a class="btn btn-dark" href="/" id="backButton">Back</a>
    @if($nextID != 1)
    <a class="btn btn-dark" href="/dogs/{{$nextID-1}}" id="nextButton">Next</a>
    @endif
    <div class="wholepost">
    <img class="coverImage" src="https://i.ytimg.com/vi/wRx3Uvcktm8/maxresdefault.jpg" width="80%" height="300">
    <br>

    <div class="wrapper">
    <h2 class="Infotitle" >About {{$dog->name}}</h2>
        <div class="col-xs-3 col-centered">
                                <span class="#"> I'm
                                    @if($dog->years > 0)
                                        @if($dog->years < 2)
                                            {{$dog->years}} year and
                                        @else
                                            {{$dog->years}} years and
                                        @endif
                                    @endif
                                    @if($dog->months > 1)
                                        {{$dog->months}} months
                                    @endif
                                    old {{$dog->sex}} {{$dog->bread}} and I'm looking for a new owner to take me in their home.
                                    If you have space for a loving dog like me, you can learn read more information below!
                                </span>
        </div>
        <div>
            <h2 class="Infotitle">More about me</h2>
                {!!$dog->body!!}
        </div>
    </div>
    <br>
    <br>

<a href="/dogs/{{$dog->id}}/edit" class="btn btn-primary" id="editanddelete">Edit</a>
{!! Form::open(['action'=>['DogsController@destroy', $dog->id] , 'method'=>'POST', 'class'=>'float-right', 'id'=>"editanddelete"]) !!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!! Form::close() !!}
</div>
@endsection
