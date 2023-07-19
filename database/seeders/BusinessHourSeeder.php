<?php

namespace Database\Seeders;

use App\Models\BusinessHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $days = config('appointments.days');

        foreach($days as $day){
            BusinessHour::query()->updateOrCreate([
                'day'=>$day, 
            ], [
                'from_1'=>"09:00", 
                'to_1'=>"13:00",
                'from_2'=>"15:30", 
                'to_2'=>"21:00",
                'step'=>90
            ]);
        }
    }
}

