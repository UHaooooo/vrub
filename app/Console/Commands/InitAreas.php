<?php

namespace App\Console\Commands;

use App\Area;
use Illuminate\Console\Command;

class InitAreas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:areas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize areas';

    private $areas_data = [
        [
            'code' => 'J',
            'name' => 'Johor',
        ],
        [
            'code' => 'K',
            'name' => 'Kedah',
        ],
        [
            'code' => 'KV_',
            'name' => 'Langkawi',
        ],
        [
            'code' => 'D',
            'name' => 'Kelantan',
        ],
        [
            'code' => 'M',
            'name' => 'Malacca',
        ],
        [
            'code' => 'N',
            'name' => 'Negeri Sembilan',
        ],
        [
            'code' => 'C',
            'name' => 'Pahang',
        ],
        [
            'code' => 'P',
            'name' => 'Penang',
        ],
        [
            'code' => 'A',
            'name' => 'Perak',
        ],
        [
            'code' => 'R',
            'name' => 'Perlis',
        ],
        [
            'code' => 'B',
            'name' => 'Selangor',
        ],
        [
            'code' => 'T',
            'name' => 'Terengganu',
        ],
        [
            'code' => 'SY_',
            'name' => 'West Coast',
        ],
        [
            'code' => 'SM_',
            'name' => 'Sandakan',
        ],
        [
            'code' => 'SK_',
            'name' => 'Kudat',
        ],
        [
            'code' => 'SW_',
            'name' => 'Tawau',
        ],
        [
            'code' => 'SB_',
            'name' => 'Beaufort',
        ],
        [
            'code' => 'SU_',
            'name' => 'Keningau',
        ],
        [
            'code' => 'SD',
            'name' => 'Lahad Datu',
        ],
        [
            'code' => 'QK_',
            'name' => 'Kuching',
        ],
        [
            'code' => 'QS_',
            'name' => 'Sibu',
        ],
        [
            'code' => 'QM_',
            'name' => 'Miri',
        ],
        [
            'code' => 'QR_',
            'name' => 'Sarikei',
        ],
        [
            'code' => 'QT',
            'name' => 'Bintulu',
        ],
        [
            'code' => 'QL',
            'name' => 'Limbang',
        ],
        [
            'code' => 'QC',
            'name' => 'Kota Samarahan',
        ],
        [
            'code' => 'QP',
            'name' => 'Kapit',
        ],
        [
            'code' => 'QB',
            'name' => 'Betong',
        ],
        [
            'code' => 'V',
            'name' => 'Kuala Lumpur',
        ],
        [
            'code' => 'L',
            'name' => 'Labuan',
        ],
        [
            'code' => 'F',
            'name' => 'Putrajaya',
        ],
        [
            'code' => 'QB_',
            'name' => 'Sri Aman',
        ],
    ];

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
        foreach ($this->areas_data as $area_data) {
            $area = new Area;
            $area->code = $area_data['code'];
            $area->name = $area_data['name'];
            $area->save();

            echo "Area $area->name created successfully\n";
        }
    }
}
