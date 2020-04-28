<a href="{{ route('users.show', $user->id) }}">
  <img src="{{ $user->avatar }}" alt="{{ $user->account }}" class="gravatar"/>
</a>
<h1>{{ $user->account }}-{{ $user->name }}-{{ $user->gender }}-{{ $user->age }}</h1>
<p>学院:{{ $user->college }}</p>
<p>班级:{{ $user->ero_year }}{{ $user->class }}</p>
<p>联系方式:{{ $user->phone }}||{{ $user->email }}</p>
<p>现居城市:{{ $user->city }}</p>
<p>职业:{{ $user->profession }}</p>
