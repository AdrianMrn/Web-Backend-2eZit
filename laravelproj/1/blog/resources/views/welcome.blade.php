@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Article overview</div>

                <div class="panel-content">
                    <ul class="article-overview">
                        @foreach ($threads as $thread)
                            <li>
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
                                            <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                            <button name="article_id" value="{{$thread[0]->id}}">
                                                    <i class="fa fa-btn fa-caret-up upvote" title="upvote"></i>
                                            </button>
                                        </form>

                                        <form action="{{ url('/vote/down') }}" method="POST" class="form-inline downvote">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                            <button name="article_id" value="{{$thread[0]->id}}">
                                                <i class="fa fa-btn fa-caret-down downvote" title="downvote"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                <div class="url">
                                    <a href="{{$thread[0]->url}}" class="urlTitle">{{$thread[0]->title}}</a>
                                </div>

                                <div class="info">
                                        {{$thread[3]}} @if ($thread[3] == 1 || $thread[3] == -1) Point @else Points @endif
                                        |
                                        posted by {{$thread[1]}}
                                        |
                                        <a href="thread/{{$thread[0]->id}}">
                                            {{$thread[2]}} @if ($thread[2] == 1) Comment @else Comments @endif
                                        </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection