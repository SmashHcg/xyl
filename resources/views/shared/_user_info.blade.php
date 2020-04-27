<a href="{{ route('users.show', $user->id) }}">
  <img src="{{ $user->avatar }}" alt="{{ $user->account }}" class="gravatar"/>
</a>
<h1>{{ $user->account }}</h1>
