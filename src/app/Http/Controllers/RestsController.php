<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Time;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;

class RestsController extends Controller
{
    public function restIn(Request $request)
    {
        $user = Auth::user();
        $now = Carbon::now();
        $timestamp = Time::where('user_id', $user->id)->where('date',Carbon::now()->toDateString())->latest()->first();
        $time_id = $timestamp->id;

        if( empty($timestamp->end_time)) 
        $reststamp = Rest::create([
            'time_id' => $time_id,
            'start_time' => Carbon::now()->toTimeString()
        ]);

        return redirect()->back()->with('my_status', '休憩開始');
    }

    public function restOut()
    {
        $user = Auth::user();
        $time_id = Time::where('user_id', $user->id)->where('date',Carbon::now()->toDateString())->latest()->first(['id']);
        $reststamp = Rest::where('time_id',$time_id->id)->latest()->first();

        $reststamp->update([
            'end_time' => Carbon::now()->toTimeString()
        ]);

        $today =  Carbon::today();
        $restIn = new Carbon($reststamp->start_time);
        $restOut = new Carbon($reststamp->end_time);
        $restTime = $restIn-> diffInSeconds($restOut);
        $a= $restTime;

        $reststamp->update([
            'total_rest_time' => $a
        ]);
        
        
        return redirect()->back()->with('my_status', '休憩終了');
    }   
}
