@extends('layouts.app')
@section('content')

    <h1>Find your dog</h1>
    @if(count($dogs)>0)
        <ul class="list-group">

                @foreach($dogs as $dog)
                <li class="list-group-item">
                    <h2> Woffu, I'm {{$dog->name}}</h2> <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img src="
                            https://i.ytimg.com/vi/wRx3Uvcktm8/maxresdefault.jpg
                            " width="300" height="200">
                        </div>
                            <div class="col-md-8 col-sm-8">
                                <span class="info"> I'm
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
                                    If you have space for a loving dog like me, click on "Learn more" to find more information about me !
                                </span>
                            </div>
                        </div>
                    <a class="readMore" href="/dogs/{{$dog->id}}"> Learn more</a>
                </li>
                @endforeach
        </ul>
    @else
        <h3>No dog announcements found</h3>
    @endif
@endsection