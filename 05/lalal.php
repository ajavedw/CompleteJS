<?php

$row;
$row[0]=array("fin_year"=>2018,"fin_month"=>5,"spent"=>125.00,"cal_year"=>2017,"cal_month"=>11 );
$row[1] = array("fin_year" => 2018, "fin_month" => 7, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 1);
$row[2] = array("fin_year" => 2018, "fin_month" => 8, "spent" => 300.00, "cal_year" => 2018, "cal_month" => 2);
$row[3] = array("fin_year" => 2018, "fin_month" => 10, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 4);
$row[4] = array("fin_year" => 2018, "fin_month" => 12, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 6);
$row[5] = array("fin_year" => 2019, "fin_month" => 2, "spent" => 725.00, "cal_year" => 2018, "cal_month" => 8);
$row[6] = array("fin_year" => 2019, "fin_month" => 3, "spent" => 210.00, "cal_year" => 2018, "cal_month" => 9);
$row[7] = array("fin_year" => 2019, "fin_month" => 4, "spent" => 330.00, "cal_year" => 2018, "cal_month" => 10);
$row[8] = array("fin_year" => 2019, "fin_month" => 8, "spent" => 230.00, "cal_year" => 2019, "cal_month" => 4);
$row[9] = array("fin_year" => 2019, "fin_month" => 10, "spent" => 333.00, "cal_year" => 2019, "cal_month" => 4);

echo "<pre>";print_r($row);
echo "</pre>";

$start_year = 2017;
$last_year = 2020;
for ($l = $start_year; $l++; $l<=$last_year){   //check first year              2017
    foreach ($row as $value) {                  //loop through all rows         row['0']
        if ($l = $value['cal_year']) {          //                              true
        for ($k=1;$k<=12;$k++){                 //k=12  months of year
                if ($k != $value['cal_month']) {
                    echo 'kkkkk' . $l . $k;
                    echo '<br>';
                }

            }
        }
    }

}


?>