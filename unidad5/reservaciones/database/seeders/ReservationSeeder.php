<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation = new  Reservation();
        $reservation -> client_id = '1';
        $reservation -> name = 'Enrique León';
        $reservation -> room_id = '1';
        $reservation -> start_date = '2022-10-26';
        $reservation -> end_date = '2022-10-30';
        $reservation -> total = '2990.80';
        $reservation -> save();

        $reservation = new  Reservation();
        $reservation -> client_id = '2';
        $reservation -> name = 'Pablo Cota';
        $reservation -> room_id = '2';
        $reservation -> start_date = '2022-10-24';
        $reservation -> end_date = '2022-10-29';
        $reservation -> total = '2420.56';
        $reservation -> save();
    }
}
