@extends('adminlte::page')

@yield('main')

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
@stop