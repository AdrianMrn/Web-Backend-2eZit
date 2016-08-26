@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="breadcrumb">
                    <a href="../">← back to overview</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Article: {{$thread->title}}</div>
                    <div class="panel-content">
                        <div class="vote">
                            <div class="form-inline upvote">
                                <i class="fa fa-btn fa-caret-up disabled upvote"></i>
                            </div>
                            <div class="form-inline upvote">
                                <i class="fa fa-btn fa-caret-down disabled downvote"></i>
                            </div>
                        </div>

                        <div class="url">
                            <a href="{{$thread->url}}" class="urlTitle">{{$thread->title}}</a>
                        </div>

                        <div class="info">
                            infogoeshere
                        </div>

                        <div class="comments">
                            <ul>
                                @if (!$comments[0] == "")
                                    @foreach ($comments as $comment)
                                        <li>
                                            <div class="comment-body">{{$comment[0]->text}}</div>
                                            <div class="comment-info">
                                                posted by {{$comment[1]->name}}
                                                on {{$comment[0]->created_at}}<br><br>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div>
                            <p>
                                You need to be <a href="{{ url('/login') }}">logged in</a> to comment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection