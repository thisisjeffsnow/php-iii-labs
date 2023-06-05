<?php

$arr = range(1, 1000000);

// function test(array $arr)
// {
//     $result = [];
//     foreach ($arr as $item) {
//         $result[] = $item * 1.08;
//     }
//     return $result;
// }

// foreach (test($arr) as $item) {
// }


// echo 'Peak Memory: ' . memory_get_peak_usage(); //38150704
echo PHP_EOL;

function test2(array $arr)
{
    foreach ($arr as $item) {
        yield $item * 1.08;
    }
}

$gen = test2($arr);
foreach ($gen as $item) {
}


echo 'Peak Memory: ' . memory_get_peak_usage(); //19275824

var_dump($gen);
