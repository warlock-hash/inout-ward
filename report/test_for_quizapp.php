<?php
date_default_timezone_set('Asia/karachi');
$time = new DateTime(date('H:i:s'));
//echo $time;
$date = new DateTime(date('Y-m-d'));
//echo "<br>";
//echo $date;



$combinedDT1 = date('Y-m-d H:i:s', strtotime("$date $time"));
//echo "<br>";
echo $combinedDT1;