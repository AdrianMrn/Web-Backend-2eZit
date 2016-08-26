@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="breadcrumb">
                    <a href="{{url('/')}}">← back to overview</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Add article
                        <a href="{{url('thread/delete')}}/{{$thread->id}}" class="btn btn-danger btn-xs edit-btn pull-right">
                            <i class="fa fa-btn fa-trash" title="delete"></i>
                            delete
                        </a>
                    </div>
                    <div class="panel-content">
                        <form action="{{ url('/thread/edit/post') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="thread_id" value="{{$thread->id}}">
                            <div class="form-group">
                                <label for="article-title" class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" id="article-title" class="form-control" value="{{$thread->title}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="article-url" class="col-sm-3 control-label">URL</label>
                                <div class="col-sm-6">
                                    <input type="text" name="url" id="article-url" class="form-control" value="{{$thread->url}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-pencil-square-o"></i>
                                        Edit article
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