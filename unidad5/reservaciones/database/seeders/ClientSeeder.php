<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client -> name = 'Enrique';
        $client -> phone_number = '6121835152';
        $client -> email = 'eleon_19@alu.uabcs.mx';
        $client -> save();

        $client = new Client();
        $client -> name = 'Angel Iran';
        $client -> phone_number = '6120000000';
        $client -> email = 'airan_19@alu.uabcs.mx';
        $client -> save();

        $client = new Client();
        $client -> name = 'Angel Duarte';
        $client -> phone_number = '6120000000';
        $client -> email = 'aduarte_19@alu.uabcs.mx';
        $client -> save();
    }
}
