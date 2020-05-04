@extends('layouts.default')

@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared._status_form')
        </section>
        <h4>动态列表</h4>
        <hr>
        @include('shared._feed')
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
        <section class="stats mt-2">
          @include('shared._stats', ['user' => Auth::user()])
        </section>
      </aside>
    </div>
  @else
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
  @endif
@stop
