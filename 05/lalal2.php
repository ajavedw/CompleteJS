<?php

$row;
$row[0] = array("fin_year" => 2018, "fin_month" => 5, "spent" => 125.00, "cal_year" => 2017, "cal_month" => 11);
$row[1] = array("fin_year" => 2018, "fin_month" => 7, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 1);
$row[2] = array("fin_year" => 2018, "fin_month" => 8, "spent" => 300.00, "cal_year" => 2018, "cal_month" => 2);
$row[3] = array("fin_year" => 2018, "fin_month" => 10, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 4);
$row[4] = array("fin_year" => 2018, "fin_month" => 12, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 6);
$row[5] = array("fin_year" => 2019, "fin_month" => 2, "spent" => 725.00, "cal_year" => 2018, "cal_month" => 8);
$row[6] = array("fin_year" => 2019, "fin_month" => 3, "spent" => 210.00, "cal_year" => 2018, "cal_month" => 9);
$row[7] = array("fin_year" => 2019, "fin_month" => 4, "spent" => 330.00, "cal_year" => 2018, "cal_month" => 10);
$row[8] = array("fin_year" => 2019, "fin_month" => 8, "spent" => 230.00, "cal_year" => 2019, "cal_month" => 2);
$row[9] = array("fin_year" => 2019, "fin_month" => 10, "spent" => 333.00, "cal_year" => 2019, "cal_month" => 4);
$row[10] = array("fin_year" => 2020, "fin_month" => 1, "spent" => 333.00, "cal_year" => 2019, "cal_month" => 7);
$row[11] = array("fin_year" => 2020, "fin_month" => 3, "spent" => 333.00, "cal_year" => 2019, "cal_month" => 9);
$row[12] = array("fin_year" => 2020, "fin_month" => 8, "spent" => 333.00, "cal_year" => 2020, "cal_month" => 2);

echo "<pre>";
print_r($row);
echo "</pre>";

//$row = array(); // YOUR ARRAY FROM DATABASE

$start_year = 2017;
$last_year = 2020;

// loops through every year between $start_year and $last_year
for ($current_year = $start_year; $current_year <= $last_year; $current_year++) {
    // loops through every month between 1 and 12
    for ($current_month = 1; $current_month <= 12; $current_month++) {
        // loops through every item of your array
        $found = false;
        foreach ($row as $value) {
            // if there is an entry with that year and month, it breaks the foreach
            if ($value['fin_year'] == $current_year && $value['fin_month'] == $current_month) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            // if there was no entry found with that year and month, it will add a new one at the end
            $row[] = array("fin_year" => $current_year, "fin_month" => $current_month, "spent" => 0, "cal_year" => $current_year, "cal_month" => $current_month);
            $found = false;
        }
    }
}

// function to sort the array by fin_year and if equal by fin_month
function special_sort($a, $b)
{
    $retval = $a['fin_year'] <=> $b['fin_year'];
    if ($retval == 0) {
        $retval = $a['fin_month'] <=> $b['fin_month'];
    }
    return $retval;
}



?>