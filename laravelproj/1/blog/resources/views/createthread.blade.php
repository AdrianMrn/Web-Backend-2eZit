@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="breadcrumb">
                    <a href="{{url('/')}}">← back to overview</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Add article</div>
                    <div class="panel-content">
                        <form action="{{ url('/post') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="article-title" class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" id="article-title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="article-url" class="col-sm-3 control-label">URL</label>
                                <div class="col-sm-6">
                                    <input type="text" name="url" id="article-url" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i>
                                        Add article
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