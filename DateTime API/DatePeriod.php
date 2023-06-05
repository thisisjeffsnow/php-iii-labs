<?php

# Works.
$schedule = function () {
    $now = new DateTime('now');
    $int = DateInterval::createFromDateString('second friday of next month');
    $now->add($int);
    $period = new DatePeriod($now, $int, 12);
    foreach ($period as $date)
        yield $date->format('l, d M Y');
};
foreach ($schedule() as $date) echo $date . PHP_EOL;

echo PHP_EOL;

# Alternative, but misses last interval compared to previous.
$schedule = function () {
    $now = new DateTime('now');
    // Set the date to the first day of the next month
    $now->modify('first day of next month');
    // Create a schedule for the second Friday of every month for a year
    for ($i = 0; $i < 12; $i++) {
        // Set the date to the second Friday of the month
        $now->modify('second friday of this month');
        yield $now->format('l, d M Y');
        // Set the date to the first day of the next month
        $now->modify('first day of next month');
    }
};
foreach ($schedule() as $date) echo $date . PHP_EOL;


# Doesn't work.
$schedule = function () {
    $now = new DateTime('now');
    $int = DateInterval::createFromDateString('second friday of every month');
    $now->add($int);
    $period = new DatePeriod($now, $int, 12);
    foreach ($period as $date)
        yield $date->format('l, d M Y');
};
foreach ($schedule() as $date) echo $date . PHP_EOL;
