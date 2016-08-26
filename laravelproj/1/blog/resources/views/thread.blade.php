@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="breadcrumb">
                    <a href="../">← back to overview</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Article: {{$data['thread']->title}}</div>
                    <div class="panel-content">

                        @if (Auth::guest())
                            <div class="vote">
                                <div class="form-inline upvote">
                                    <i class="fa fa-btn fa-caret-up disabled upvote"></i>
                                </div>
                                <div class="form-inline upvote">
                                    <i class="fa fa-btn fa-caret-down disabled downvote"></i>
                                </div>
                            </div>
                        @else
                            <div class="vote">
                                <form action="{{ url('/vote/up') }}" method="POST" class="form-inline upvote">
                                    {{ csrf_field() }}
                                    <button name="article_id" value="{{$data['thread']->id}}">
                                        <i class="fa fa-btn fa-caret-up upvote" title="upvote"></i>
                                    </button>
                                </form>

                                <form action="{{ url('/vote/down') }}" method="POST" class="form-inline downvote">
                                    {{ csrf_field() }}
                                    <button name="article_id" value="{{$data['thread']->id}}">
                                        <i class="fa fa-btn fa-caret-down downvote" title="downvote"></i>
                                    </button>
                                </form>
                            </div>
                        @endif

                        <div class="url">
                            <a href="{{$data['thread']->url}}" class="urlTitle">{{$data['thread']->title}}</a>
                        </div>

                        <div class="info">
                            {{$data['votes']}} @if ($data['votes'] == 1 || $data['votes'] == -1) point @else points @endif
                            |
                            posted by {{$data['op']}}
                            |
                            {{$data['commentcount']}} @if ($data['commentcount'] == 1) comment @else comments @endif
                        </div>

                        <div class="comments">
                            <ul>
                                @if (!$comments[0] == "")
                                    @foreach ($comments as $comment)
                                        <li>
                                            <div class="comment-body">{{$comment[0]->text}}</div>
                                            <div class="comment-info">
                                                posted by {{$comment[1]}}
                                                on {{$comment[0]->created_at}}
                                                @if (!Auth::guest())
                                                    @if ($comment[1] == Auth::user()->name)
                                                        <a href="{{ url('/comments/edit/{id}') }}" class="btn btn-primary btn-xs edit-btn">edit</a>
                                                        <a href="{{ url('/comments/delete/') }}/{{$comment[0]->id}}" class="btn btn-danger btn-xs edit-btn">
                                                            <i class="fa fa-btn fa-trash" title="delete"></i>
                                                            delete
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        @if (Auth::guest())
                            <div>
                                <p>
                                    You need to be <a href="{{ url('/login') }}">logged in</a> to comment.
                                </p>
                            </div>
                        @else
                            <form action="{{ url('/comments/add') }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="body" class="col-sm-3 control-label">Comment</label>

                                    <div class="col-sm-6"><textarea type="text" name="body" id="body" class="form-control"></textarea></div>
                                </div>
                                <input type="hidden" name="article_id" value="{{$data['thread']->id}}">
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-default">
                                            <i class=" fa fa-plus"></i>
                                            Add comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection