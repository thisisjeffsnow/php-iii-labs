<?php
$date1 = new DateTime('2022-12-10');
$date2 = new DateTime('now');

echo $date1->format('Y-m-d') . PHP_EOL;
echo $date2->format('Y-m-d') . PHP_EOL;

$int[] = $date1->diff($date2);
$int[] = $date2->diff($date1);

foreach ($int as $intv) var_dump($intv);
