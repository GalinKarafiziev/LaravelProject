@extends('layouts.app')
@section('content')


    @if(count($dogs)>0)
        <div class="center">
        <ul class="alldogs">

                @foreach($dogs as $dog)
                <li >
                    <div class="row">
                        <div class="">
                            <img src="/storage/images/{{$dog->some_image}}" width="260" height="200">
                        </div>

                        </div>
                    <h2> Woffu, I'm {{$dog->name}}</h2>
                    <a class="readMore" href="/dogs/{{$dog->id}}"> Learn more</a>
                </li>
                @endforeach
        </ul>
        </div>
        <div class="changePages">{{$dogs->links()}}</div>
    @else
        <h3>No dog announcements found</h3>
    @endif
@endsection