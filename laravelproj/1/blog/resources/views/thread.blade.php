@extends('layouts.layout')

@section('body')

    <p>title: <a href="{{$thread->url}}">{{$thread->title}}</a></p>

    @if (!$comments[0] == "")
        @foreach ($comments as $comment)
            <div>
                {{$comment[0]->text}}
                posted by {{$comment[1]->name}}
            </div>
        @endforeach
    @endif




@stop