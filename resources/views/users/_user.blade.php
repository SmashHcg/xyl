<div class="list-group-item">
  <img class="mr-3" src="{{ $user->avatar }}" alt="{{ $user->name }}" width=32>
  <a href="{{ route('users.show', $user) }}">
    {{ $user->account }} {{ $user->name }} {{ $user->ero_year }}级 {{ $user->college }} {{ $user->class }}
  </a>
  @can('destroy', $user)
    <form action="{{ route('users.destroy', $user->id) }}" method="post" class="float-right">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
    </form>
  @endcan
</div>
