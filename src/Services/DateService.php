<?php

namespace App\Services;

class DateService {
    
    public function displayDates($dateStart, $dateEnd)
    {
        $response = [];
        
        $dates = new \DatePeriod(
            $dateStart,
            new \DateInterval('P1D'),
            $dateEnd->modify('+1 day'),
        );

        foreach($dates as $date){
            array_push($response, $date->format('Y-m-d'));
        }

        return $response;
    }
}