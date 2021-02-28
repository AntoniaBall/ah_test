<?php

namespace App\Services;

class DateService {

    public function displayDates($dateStart, $dateEnd)
    {
        $response = [];
        
        $dates = new \DatePeriod(
            $dateStart,
            new \DateInterval('P1D'),
            $dateEnd,
        );

        foreach($dates as $date){
            array_push($response, $date->format('Y-m-d'));
            dump($date->format('Y-m-d'));
        }

        return $response;
    }
}