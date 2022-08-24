<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;
use App\Models\user_session;
use Carbon\Carbon;

class dailySessions
{
    protected $dailySessions;

    public function __construct(LarapexChart $dailySessions)
    {
        $this->chart = $dailySessions;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {        
        for ($i=0; $i < 7; $i++) {
            $men_session = user_session::where([['user_sessions.gym_id', Auth::user()->gym_id],['users.gender','ذكر']])
            ->whereDate('user_sessions.created_at','=', Carbon::today()->subDays($i))
            ->leftJoin('users', 'user_sessions.user_id', '=', 'users.id')
            ->select('user_sessions.*', 'users.name as user_name')
            ->count();
            $men[$i]=$men_session;
            $women_session = user_session::where([['user_sessions.gym_id', Auth::user()->gym_id],['users.gender','أنثى']])
            ->whereDate('user_sessions.created_at','=', Carbon::today()->subDays($i))
            ->leftJoin('users', 'user_sessions.user_id', '=', 'users.id')
            ->select('user_sessions.*', 'users.name as user_name')
            ->count();
            $women[$i]=$women_session;
            $date[$i]= date('l', strtotime(Carbon::today()->subDays($i)));
        }
        $days = ['Sunday '=> 'السبت','Saturday'=> 'الأحد','Monday '=> 'الإثنين','Tuesday'=> 'الثلاثاء','Wednesday'=> 'الأربعاء','Thursday'=> 'الخميس','Friday'=> 'الجمعة'];
            return $this->chart->barChart()
            ->addData('النساء', [$women[6], $women[5], $women[4], $women[3], $women[2], $women[1], $women[0]])
            ->addData('الرجال', [$men[6], $men[5], $men[4], $men[3], $men[2], $men[1], $men[0]])
            ->setXAxis([$date[6], $date[5], $date[4], $date[3], $date[2], $date[1] , $date[0]])
            ->setColors(['#FB87FB', '#140BFF'])
            ->setHeight(260)
            ->setWidth(600);
    }
}
