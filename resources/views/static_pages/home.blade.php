@extends('layouts.default')
@section('content')
  <div class="jumbotron">
    <h1 style="color: red">欢迎！</h1>
    <p class="lead">
      你现在所看到的是 <a href="https://learnku.com/courses/laravel-essential-training">校友录</a> 的后台管理页面。
    </p>
    <p style="color: purple">
      从创建一个用户开始...
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">创建</a>
    </p>
  </div>
@stop
