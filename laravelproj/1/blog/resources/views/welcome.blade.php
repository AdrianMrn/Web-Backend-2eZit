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
                                <div class="vote">
                                    <div class="form-inline upvote">
                                        <i class="fa fa-btn fa-caret-up disabled upvote"></i>
                                    </div>
                                    <div class="form-inline upvote">
                                        <i class="fa fa-btn fa-caret-down disabled downvote"></i>
                                    </div>
                                </div>

                                <div class="url">
                                    <a href="{{$thread[0]->url}}" class="urlTitle">{{$thread[0]->title}}</a>
                                </div>

                                <div class="info">
                                        {{$thread[3]}} @if ($thread[3] == 1 || $thread[3] == -1) Point @else Points @endif
                                        |
                                        posted by {{$thread[1]->name}}
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