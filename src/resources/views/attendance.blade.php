@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">
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

  <div class="attendance__heading">
    <form class="search-form" action="/attendance/sub" method="post"
    >
      @csrf
      <div class="search-form__actions">
        <input class="search-form__yesterday-btn_btn" type="submit" value="<" name="sub">
        <input type="hidden" name="view_date" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
      </div>
    </form>
      <div class="search-form__date">
        {{ $date }}
      </div>
    <form class="search-form" action="/attendance/add" method="post">
    @csrf
    <div class="search-form__actions">
        <input class="search-form__tomorrow-btn_btn" type="submit" value=">" name="add">
    </div>
    <input type="hidden" name="view_date" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
</form>
  </div>

  <div class="attendance__inner">
    <table class="attendance__table">
      <tr class="attendance__row">
        <th class="attendance__label">名前</th>
        <th class="attendance__label">勤務開始</th>
        <th class="attendance__label">勤務終了</th>
        <th class="attendance__label">休憩時間</th>
        <th class="attendance__label">勤務時間</th>
      </tr>
      @forelse ($records as $record)
      <tr class="attendance__row">
        <td class="attendance__data">{{$record->user_id}}</td>
        <td class="attendance__data">{{$record->start_time}}</td>
        <td class="attendance__data">{{$record->end_time}}</td>
        <td class="attendance__data">{{$record->rest_time}}</td>
        <td class="attendance__data">{{$record->work_time}}</td>
      </tr>
      @empty
          <tr>
              <td colspan="5">勤務記録はありません。</td>
          </tr>
      @endforelse
    </table>
  </div>
  {{ $records->appends(['date' => $date])->links() }}
</div>
@endsection('content')