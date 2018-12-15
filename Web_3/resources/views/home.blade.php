@extends('layouts.app')

@section('content')
<div class="avatar_image">
<img src="/storage/avatar/{{$user->avatar}}" style="border-radius:50%!important;width:150px;height:150px;float:left;margin-left: 25px;margin-right: 120px;">
<h2 style="">{{$user->name}}'s Profile</h2>
<form enctype="multipart/form-data" action="/home" method="POST" >
    

    <input type="file" name="avatar" style="margin-top: 50px;">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit" class="pull-right btn  btn-primary" style="margin-left: 90px;margin-top: 40px;" value="Submit">
</form>
</div>
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
                    <h3>Your Posts</h3>
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
                        <a class="btn btn-primary float-right"  href="/dogs/create">Create Post</a>
                </div>
            </div>
        </div>
    </div>
</div>


<br><br>
@endsection
