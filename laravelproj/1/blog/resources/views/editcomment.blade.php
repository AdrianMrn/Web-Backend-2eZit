@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="breadcrumb">
                    <a href="../../thread/{{$comment->FK_thread_id}}">← back to thread</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit comment
                        <a href="{{url('comments/delete')}}/{{$comment->id}}" class="btn btn-danger btn-xs edit-btn pull-right">
                            <i class="fa fa-btn fa-trash" title="delete"></i>
                            delete
                        </a>
                    </div>
                    <div class="panel-content">
                        <form action="{{ url('/comments/edit/post') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <div class="form-group">
                                <label for="body" class="col-sm-3 control-label">Comment</label>

                                <div class="col-sm-6"><textarea type="text" name="body" id="body" class="form-control">{{$comment->text}}</textarea></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-pencil-square-o"></i>
                                        Edit comment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection