<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;
use App\Models\user_session;
use Carbon\Carbon;

class UsersSessions
{
    protected $UsersSessions;

    public function __construct(LarapexChart $UsersSessions)
    {
        $this->chart = $UsersSessions;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HeatMapChart
    {
        for ($i=0; $i < 24; $i++) {
            $men[$i]=0;
            $women[$i]=0;
        }
        $men_count = 0;$women_count = 0;
        $men_session =user_session::where([['user_sessions.gym_id', Auth::user()->gym_id],['users.gender','ذكر']])
                                    ->whereBetween('user_sessions.created_at', [Carbon::now()->subHours(24)->format('Y-m-d h'),Carbon::now()->format('Y-m-d h')])
                                    ->leftJoin('users', 'user_sessions.user_id', '=', 'users.id')
                                    ->select('user_sessions.*', 'users.name as user_name')
                                    ->get()->groupBy(function($date) {
                                        return Carbon::parse($date->created_at)->format('h');
                                    });     
        $men_leave =user_session::where([['user_sessions.gym_id', Auth::user()->gym_id],['users.gender','ذكر']])
                                    ->whereDate('user_sessions.leave', Carbon::today()->format('Y-m-d'))
                                    ->leftJoin('users', 'user_sessions.user_id', '=', 'users.id')
                                    ->select('user_sessions.*', 'users.name as user_name')
                                    ->get()
                                    ->groupBy(function($date) {
                                        return Carbon::parse($date->leave)->format('H');
                                    });
        $women_session =user_session::where([['user_sessions.gym_id', Auth::user()->gym_id],['users.gender','أنثى']])
                                    ->whereBetween('user_sessions.created_at', [Carbon::now()->subHours(24)->format('Y-m-d h'),Carbon::now()->format('Y-m-d h')])
                                    ->leftJoin('users', 'user_sessions.user_id', '=', 'users.id')
                                    ->select('user_sessions.*', 'users.name as user_name')
                                    ->get()->groupBy(function($date) {
                                        return Carbon::parse($date->leave)->format('H');
                                    });
        $women_leave =user_session::where([['user_sessions.gym_id', Auth::user()->gym_id],['users.gender','أنثى']])
                                    ->whereDate('user_sessions.leave', Carbon::today()->format('Y-m-d'))
                                    ->leftJoin('users', 'user_sessions.user_id', '=', 'users.id')
                                    ->select('user_sessions.*', 'users.name as user_name')
                                    ->get()
                                    ->groupBy(function($date) {
                                        return Carbon::parse($date->leave)->format('H');
                                    });
        for ($i=0; $i < 24; $i++) {
            $date[$i]= date('H', strtotime(Carbon::now()->addHours(3)->subHours($i)));
            foreach ($men_session as $key => $value) {
                if ($i==$key) {
                    $men_count += count($value);
                }
            }
            foreach ($men_leave as $key => $value) {
                if ($i==$key) {
                    $men_count -= count($value);
                }
            }
            $men[$i]=$men_count;
            
            foreach ($women_session as $key => $value) {
                if ($i==$key) {
                    $women_count += count($value);
                }
            }
            foreach ($women_leave as $key => $value) {
                if ($i==$key) {
                    $women_count -= count($value);
                }
            }
            $women[$i]=$women_count;

                
            
        }
        $men = array_reverse($men);
        $women = array_reverse($women);
        $date = array_reverse($date);
        return $this->chart->heatMapChart()
            ->addData('النساء', $women)
            ->addHeat('الرجال', $men)
            ->setColors(['#FB87FB', '#5B7AFB'])
            ->setHeight(260)
            ->setWidth(620)
            ->setXAxis($date);
    }
}
/*foreach($men_session as $m){
                    if (date('H', strtotime($m[0]->created_at))==$i) {
                        $men_count += count($m);
                        $men[$i] = $men_count;
                    }
                }
                
                if (!array_key_exists($i, $men)) {
                    $men[$i] = 0;
                }
                foreach($women_session as $w){
                    if (date('H', strtotime($w[0]->created_at))==$i) {
                        $women[$i] = count($w);
                    }
                }
                if (!array_key_exists($i, $women)) {
                    $women[$i] = 0;
                } */