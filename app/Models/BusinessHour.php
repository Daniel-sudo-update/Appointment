<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;

    public function getTimesPeriodAttribute()
    {
        $times1 = CarbonInterval::minutes($this->step)->toPeriod($this->from_1, $this->to_1)->toArray();
        $times2 = CarbonInterval::minutes($this->step)->toPeriod($this->from_2, $this->to_2)->toArray();

        $times = array_merge($times1, $times2);
        
        return array_map(fn($time)=> $time->format('H:i'), $times);
    }
}
