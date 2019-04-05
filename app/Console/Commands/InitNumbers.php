<?php

namespace App\Console\Commands;

use App\VehicleRegistrationNumber;
use Illuminate\Console\Command;

class InitNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:numbers {area_id} {prefix} {suffix?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init Vehicle Registration Number according to given option';

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
        $prefix = $this->argument('prefix');
        $suffix = $this->argument('suffix');
        $area_id = $this->argument('area_id');

        for ($i = 1; $i < 10000; $i++) {
            $number = new VehicleRegistrationNumber;
            $number->registration_number = $prefix . $i . $suffix;
            $number->status = "TENDER";
            $number->area_id = $area_id;
            $number->save();
		}
		
		echo ($i - 1) . " numbers created successfully\n";
    }
}
