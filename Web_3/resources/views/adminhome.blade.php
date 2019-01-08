@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                        <a href="/home" style="font-size:24px;color: royalblue;">All Posts</a>
                            <a href="/yourPosts" class="float-right" style="font-size:24px;color: royalblue;">Your Posts</a>
                        @if(count($dogs)>0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($dogs as $dog)
                                    <tr>
                                        <th >{{$dog->name}}</th>
                                        <th><a href="/dogs/{{$dog->id}}/edit" class="btn btn-dark" id="editanddelete">Edit</a></th>
                                        <th>{!! Form::open(['action'=>['DogsController@destroy', $dog->id] , 'method'=>'POST', 'class'=>'float-right', 'id'=>"editanddelete"]) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </th>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts</p>
                        @endif

                    </div>
                     <a href="/download" class="btn btn-dark float-right" style="background: green;">Export Users As Excel</a>
                </div>
            </div>
        </div>
    </div>

@endsection
