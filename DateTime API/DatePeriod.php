<?php

$schedule = function () {
    $now = new DateTime('now');
    $int = DateInterval::createFromDateString('second friday of next month');
    $now->add($int);
    $period = new DatePeriod($now, $int, 12);
    foreach ($period as $date)
        yield $date->format('l, d M Y');
};
foreach ($schedule() as $date) echo $date . PHP_EOL;
