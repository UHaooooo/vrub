<?php

namespace App\Console\Commands;

use App\Citizen;
use Illuminate\Console\Command;

class InitCitizens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:citizens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize citizens';

    private $citizens_data = [
        [
            'identification_number' => '970326118898',
            'name' => 'Lim Xiao Ming',
            'address' => '5, Lorong Leng Zai 3, Taman Segar',
            'postcode' => '45600',
            'city' => 'Kuantan',
            'state' => 'Pahang',
        ],
        [
            'identification_number' => '6804026019497',
            'name' => 'Bakar bin Suhaib',
            'address' => 'D523, Highland Condominium, Bandar Sungai Panjang',
            'postcode' => '25300',
            'city' => 'Kajang',
            'state' => 'Selangor',
        ],
        [
            'identification_number' => '690621336359',
            'name' => 'Vinod Mallaya',
            'address' => '35, Jalan Yong Peng 2/4, Bukit Besar',
            'postcode' => '23000',
            'city' => 'Raub',
            'state' => 'Pahang',
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
        foreach ($this->citizens_data as $citizen_data) {
            $citizen = new Citizen;
            $citizen->identification_number = $citizen_data['identification_number'];
            $citizen->name = $citizen_data['name'];
            $citizen->address = $citizen_data['address'];
            $citizen->postcode = $citizen_data['postcode'];
            $citizen->city = $citizen_data['city'];
            $citizen->state = $citizen_data['state'];
            $citizen->save();

            echo "Citizen $citizen->name created successfully\n";
        }
    }
}
