@extends('layouts.app')

@section('content')
        <div class="container">
                <h1>Edit information for {{$dog->name}}</h1>
                {!! Form::open(['action'=>['DogsController@update', $dog->id] , 'method'=>'POST']) !!}
                <div class="form-group">
                        {{Form::label('years', 'Years:')}}
                        {{Form::number('years', $dog->years, ['class' => 'form-control', 'placeholder' => 'Years'])}}
                </div>
                <div class="form-group">
                        {{Form::label('months', 'Months:')}}
                        {{Form::number('months', $dog->months, ['class' => 'form-control', 'placeholder' => 'Months'])}}
                </div>
                <div class="form-group">
                        {{Form::label('body', 'Body:')}}
                        {{Form::textarea('body', $dog->body, ['id'=>'article-ckeditor','class' => 'form-control', 'placeholder' => 'Description'])}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary float-right'])}}
                {!! Form::close() !!}
        </div>

@endsection
