@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
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
@if (session('my_status'))
  {{ session('my_status') }}
@endif
@if (session('error'))
  {{ session('error') }}
@endif
<h2 class="content_heading"><?php echo $user->name ?>さんお疲れ様です！</h2>
<div class="content_flex">
    <div class="content_flex-btn">
      <form action="timein" method="POST" class="content_flex-btn-btn">
      @csrf
      <button type="submit">勤務開始</button>
      </form>
      <form action="timeout" method="POST" class="content_flex-btn-btn">
      @csrf
      <button type="submit">勤務終了</button>
      </form>
      <form action="restin" method="POST" class="content_flex-btn-btn">
      @csrf
      <button type="submit">休憩開始</button>
      </form>
      <form action="restout" method="POST" class="content_flex-btn-btn">
      @csrf
      <button type="submit">休憩終了</button>
      </form>

    </div>

</div>
@endsection('content')