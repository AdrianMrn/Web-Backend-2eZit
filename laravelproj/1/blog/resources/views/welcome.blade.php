@extends('layouts.layout')

@section('body')
    @foreach ($threads as $thread)
        <div>
            <a href="{{$thread[0]->url}}">{{$thread[0]->title}}</a>
            <p>posted by {{$thread[1]->name}}<p>

            <p><a href="{{$thread[0]->id}}">Comments</a></p>
        </div>
        <br>
    @endforeach
@stop