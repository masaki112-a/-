@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/workuser.css')}}">
@endsection

@section('link')
        <div class="header-nav">
            <div class="header-nav__item">
              <a class="header-nav__link" href="/">ホーム</a>
            </div>
            <div class="header-nav__item">
              <a class="header-nav__link" href="/attendance">日付一覧</a>
            </div>
            <div class="header-nav__item">
              <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__link">ログアウト</button>
              </form>
            </div>
            <div>
                <a class="header-nav__link" href="/workuser">勤務者一覧</a>
            </div>
        </div>
@endsection

@section('content')
<div class="content__inner">
  <div class="content__heading">
  </div>
  <div class="attendance__inner">
    <table class="attendance__table">
      <tr class="attendance__row">
        <th class="attendance__label">ユーザー名</th>
      </tr>
      @foreach ($users as $user)
      <tr class="attendance__row">
        <td class="attendance__date">{{$user->name}}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection('content')