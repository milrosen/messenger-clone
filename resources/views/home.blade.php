@extends('layouts.app')

@section('content')
<div class="container">
    <div id='main' data-user="{{ json_encode($user) }}">hello, {{ $user->name }}</div>
</div>
@endsection
