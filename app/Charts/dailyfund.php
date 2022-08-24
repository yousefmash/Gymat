<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;
use App\Models\movement;
use Carbon\Carbon;

class dailyfund
{
    protected $dailyfund;

    public function __construct(LarapexChart $dailyfund)
    {
        $this->chart = $dailyfund;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $deposits = movement::where([['gym_id', Auth::user()->gym_id],['movement_type','deposit']])->whereDate('created_at', Carbon::today())->get();
        $withdraw = movement::where([['gym_id', Auth::user()->gym_id],['movement_type','withdraw']])->whereDate('created_at', Carbon::today())->get();
        $collect = movement::where([['gym_id', Auth::user()->gym_id],['movement_type','collect']])->whereDate('created_at', Carbon::today())->get();
        
        $deposits_sum = $deposits->sum('value');
        $withdraw_sum = $withdraw->sum('value');
        $collect_sum = $collect->sum('value');
        $total = $deposits_sum+ $withdraw_sum+$collect_sum;
        return $this->chart->donutChart()
            ->addData([$deposits_sum, $withdraw_sum,$collect_sum])
            ->setLabels(['القبض', 'الصرف','الترحيل'])
            ;
    }
}
