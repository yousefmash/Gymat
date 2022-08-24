<?php

namespace App\Console\Commands;

use App\Models\financial_balance;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class Sessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Sessions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'users leave at midnight';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $gym_balance=financial_balance::where('gym_id',Auth::user()->gym_id)->first();
        $gym_balance->balance +=  1;
        $result =$gym_balance->save();

    }
}
