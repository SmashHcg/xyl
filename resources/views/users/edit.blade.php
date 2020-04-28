@extends('layouts.default')
@section('title', '更新个人资料')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>更新个人资料</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')

        <div class="gravatar_edit">
          <a href="http://www.baidu.com" target="_blank">
            <img src="{{ $user->avatar }}" alt="{{ $user->account }}" class="gravatar"/>
          </a>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id )}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
              <label for="account">账号/学号：</label>
              <input type="text" name="account" class="form-control" value="{{ $user->account }}" disabled>
            </div>

            <div class="form-group">
              <label for="name">姓名：</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label for="age">年龄：</label>
              <input type="text" name="age" class="form-control" value="{{ $user->age }}">
            </div>

            <div class="form-group">
              <label for="gender">性别</label>
              <input type="text" name="gender" class="form-control" value="{{ $user->gender }}">
            </div>

            <div class="form-group">
              <label for="college">学院：</label>
              <input type="text" name="college" class="form-control" value="{{ $user->college }}">
            </div>

            <div class="form-group">
              <label for="class">班级：</label>
              <input type="text" name="class" class="form-control" value="{{ $user->class }}">
            </div>

            <div class="form-group">
              <label for="ero_year">入学年份：</label>
              <input type="text" name="ero_year" class="form-control" value="{{ $user->ero_year }}">
            </div>

            <div class="form-group">
              <label for="gra_year">毕业年份：</label>
              <input type="text" name="gra_year" class="form-control" value="{{ $user->gra_year }}">
            </div>

            <div class="form-group">
              <label for="phone">手机：</label>
              <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
            </div>

            <div class="form-group">
              <label for="email">邮箱：</label>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
              <label for="city">现居城市</label>
              <input type="text" name="city" class="form-control" value="{{ $user->city }}">
            </div>

            <div class="form-group">
              <label for="profession">职业</label>
              <input type="text" name="profession" class="form-control" value="{{ $user->profession }}">
            </div>

            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
  </div>
</div>
@stop
