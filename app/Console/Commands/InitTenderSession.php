<?php

namespace App\Console\Commands;

use App\TenderSession;
use Illuminate\Console\Command;
use Carbon\Carbon;

class InitTenderSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:tendersession';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init Tender Session According to given option';

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
     * @return mixed
     */
    public function handle()
    {
        $tender_session = new TenderSession;
        $tender_session->name = "JTT1 to JTT9999";
        $tender_session->start_date = Carbon::now();
		$tender_session->end_date = Carbon::now('Asia/Kuala_Lumpur')->addDays(28);
		$tender_session->area_id = 1;
		$tender_session->save();
    }
}
