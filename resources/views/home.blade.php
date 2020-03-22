@extends('layouts.admin')

@section('main')
@section('title', 'Quản lý bán hàng')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="callout-top callout-top-danger">
        <h5>I am a danger callout!</h5>

        <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire
            soul,
            like these sweet mornings of spring which I enjoy with my whole heart.</p>
    </div>
    <p>Welcome to this beautiful admin panel.</p>
    <textarea name="content" type="text" class="form-control ckeditor" rows="10"></textarea>
@stop
@endsection