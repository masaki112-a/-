<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Time;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;

class TimesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('index', compact('user'));
    }

    public function attendance()
    { 
            $today = Carbon::today();
            $date = $today->format('Y/m/d');
            $records = Time::where('date', [$date])->paginate(5);

        return view('attendance',compact('date','records'));

    }

public function sub(Request $request)
    { 
        $date = $request->input('date');
        if ($request->has('sub')) {
            $posts = $request->all();
            $view_date = $request->input('view_date');
            $a = Carbon::parse($view_date);
            $date = $a->subDay(1)->format('Y/m/d');
            $records = Time::where('date', [$date])->paginate(5);
        }
            return view('attendance',compact('date','records'));
        
    }

    public function add(Request $request)
    { 
        $date = $request->input('date');
        if ($request->has('add')) {
            $posts = $request->all();
            $view_date = $request->input('view_date');
            $a = Carbon::parse($view_date);
            $date = $a->addDay(1)->format('Y/m/d');
            $records = Time::where('date', [$date])->paginate(5);
        }

        return view('attendance',compact('date','records'));

    }

     public function timeIn()
    {
        $user = Auth::user();

        $oldTimestamp = Time::where('user_id', $user->id)->latest()->first();
        if ($oldTimestamp) {
            $oldTimestampPunchIn = new Carbon($oldTimestamp->start_time);
            $oldTimestampDay = $oldTimestampPunchIn->startOfDay();
        } else {
            $timestamp = Time::create([
                'user_id' => $user->id,
                'date'=> Carbon::now()->toDateString(),
                'start_time' => Carbon::now()->toTimeString()
            ]);

            return redirect()->back()->with('my_status', '出勤打刻が完了しました');
        }
        
        $newTimestampDay = Carbon::today();

        if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->end_time))){
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

        $timestamp = Time::create([
            'user_id' => $user->id,
            'start_time' => Carbon::now()->toTimeString(),
            'date'=> Carbon::now()->toDateString()
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function timeOut()
    {
        $user = Auth::user();
        $timestamp = Time::where('user_id', $user->id)->where('date',Carbon::now()->toDateString())->latest()->first();

        $now = new Carbon();
        $today = Carbon::today();
        $timeIn = new Carbon($timestamp->start_time);
        $stayTime = $timeIn->diffInSeconds($now);
        $c = $stayTime;
        
        $time_id = $timestamp->id;
        $a =Rest::where('time_id',$time_id)->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(total_rest_time)))as rest_time')->groupBy('time_id')->whereDate('created_at',[$today])->first();

        if ($a && $a->rest_time) {
        list($hours, $minutes, $seconds) = explode(':', $a->rest_time);
        $restTimeInSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;
        } else {
        $restTimeInSeconds = 0;
        }
        $workTime = $c - $restTimeInSeconds;

        if( !empty($timestamp->end_time)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $timestamp->update([
            'end_time' => Carbon::now()->toTimeString()
        ]);

        if((empty($timestamp->end_time))&&($now->ne($timeIn)))
        $timestamp->update([
            'end_time' => Carbon::now()->toTimeString()
        ]);

        $timestamp->update([
            'work_time' =>  $workTime,
            'rest_time' => $restTimeInSeconds
        ]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }   

    
}
