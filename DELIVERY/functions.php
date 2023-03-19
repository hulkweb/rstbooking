<?php

function getShippingDate($holidays, $cutOffTime)
{
    $current = time();

    if ($current >= strtotime($cutOffTime)) {
        $current = $current + 24 * 60 * 60;
    }
    for ($i = 0; $i < count($holidays); $i++) {
        if (date("l", $current) == $holidays[$i]) {
            $current += 24 * 60 * 60;
        }
    }
    return date("Y-m-d", $current);
}
