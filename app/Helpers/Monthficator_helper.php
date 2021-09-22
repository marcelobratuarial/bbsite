<?php
// Function: used to create slugs
if (!function_exists("monthBR")) {
    function monthBR($month)
    {
        
        if($month < 10) {
            $month = str_replace("0", "", $month);
        }
        $months[1] = "Jan";
        $months[2] = "Fev";
        $months[3] = "Mar";
        $months[4] = "Abr";
        $months[5] = "Mai";
        $months[6] = "Jun";
        $months[7] = "Jul";
        $months[8] = "Ago";
        $months[9] = "Set";
        $months[10] = "Out";
        $months[11] = "Nov";
        $months[12] = "Dez";
        // 

        return $months[$month];
    }
}