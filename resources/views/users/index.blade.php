@extends('layouts.default')
@section('title', '所有用户')

@section('content')
<div class="offset-md-2 col-md-8">
  <h2 class="mb-4 text-center">所有用户</h2>
  <div class="list-group list-group-flush">
    <form method="GET" action="{{ route('users.search') }}">
      {{ csrf_field() }}
      <div class="form-group" class="float">
          <label for="account">输入您要查找的校友姓名：</label>
          <input type="text" name="name" class="form" value="{{ old('name') }}">
          <button type="submit" class="btn btn-sm btn-primary">搜索</button>
      </div>
    </form>
    @foreach ($users as $user)
      @include('users._user')
    @endforeach
  </div>

  <div class="mt-3">
    {!! $users->render() !!}
  </div>
</div>
@stop
