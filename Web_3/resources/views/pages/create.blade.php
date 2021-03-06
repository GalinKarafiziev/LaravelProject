@extends('layouts.app')

@section('content')
        <div class="container">
<h1>Add a dog</h1>
<div class="createDog">
{!! Form::open(['action'=>'DogsController@store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
        {{Form::label('name', 'Name:')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
</div>
<div class="form-group">
        {{Form::label('bread', 'Breed:')}}
        {{Form::text('bread', '', ['class' => 'form-control', 'placeholder' => 'Breed'])}}
</div>
<div class="form-group">
        {{Form::label('sex', 'Sex:')}}
        {{Form::text('sex', '', ['class' => 'form-control', 'placeholder' => 'Sex'])}}
</div>
<div class="form-group">
        {{Form::label('years', 'Years:')}}
        {{Form::number('years', '', ['class' => 'form-control', 'placeholder' => 'Years'])}}
</div>
<div class="form-group">
        {{Form::label('months', 'Months:')}}
        {{Form::number('months', '', ['class' => 'form-control', 'placeholder' => 'Months'])}}
</div>
<div class="form-group">
        {{Form::label('body', 'Body:')}}
        {{Form::textarea('body', '', ['id'=>'article-ckeditor','class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
<div class="form-group">
    {{Form::file('some_image')}}
</div>

{{Form::submit('Submit', ['class'=>'btn btn-primary float-right'])}}
        {!! Form::close() !!}
</div>
        </div>
@endsection
