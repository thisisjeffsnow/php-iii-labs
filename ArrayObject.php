<?php
$src = [
    1 => 'Mon',
    2 => 'Tues',
    3 => 'Wed',
    4 => 'Thurs',
    5 => 'Fri',
];

$arr = new ArrayObject($src);
$arr[6] = 'Sat';
$arr[7] = 'Sun';

function dropDown(iterable $arr)
{
    $html = '<select name="test">';
    foreach ($arr as $key => $value) {
        $html .= '<option value="' . $key . '">' . $value . '</option>';
    }
    $html .= '</select>';
    return $html;
}

echo dropDown($arr);
