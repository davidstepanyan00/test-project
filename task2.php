<?php

class CountOfTuesdays
{
    function countTuesdaysBetweenDates($firstDate, $lastDate) {

        $first = new DateTime($firstDate);
        $last = new DateTime($lastDate);

        $daysDiff = $last->diff($first)->days;

        $wholeWeeks = floor($daysDiff / 7);

        $firstDayOfWeek = (int)$first->format('N');

        $tuesdays = ($firstDayOfWeek >= 2) ? 1 : 0;

        if ($daysDiff % 7 >= (9 - $firstDayOfWeek) % 7) {
            $tuesdays++;
        }

        return $wholeWeeks + $tuesdays;
    }
}

$obj = new CountOfTuesdays();

$firstDate = date('Y-m-d');
$lastDate = '2024-03-31';

echo "Количество вторников между $firstDate и $lastDate: " . $obj->countTuesdaysBetweenDates($firstDate, $lastDate);
