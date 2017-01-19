@extends('layouts.app')


@section('content')
    @if (Auth::guest())

        <p>로그인 해주세요</p>

    @else
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">You are logged in!</div>
        </div>
    @endif
@endsection


