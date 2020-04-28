<div class="list-group-item">
  <img class="mr-3" src="{{ $user->avatar }}" alt="{{ $user->name }}" width=32>
  <a href="{{ route('users.show', $user) }}">
    {{ $user->account }} {{ $user->name }} {{ $user->ero_year }}级 {{ $user->college }} {{ $user->class }}
  </a>
</div>
