<?php
$arr = range(1, 10);

function test2(array $arr)
{
    $sum = 0;
    foreach ($arr as $item) {
        $new = $item * 1.08;
        yield $new;
        $sum += $new;
    }
    return $sum;
}

$gen = test2($arr);
foreach ($gen as $item) {
}

var_dump($gen);
echo $gen->getReturn();
