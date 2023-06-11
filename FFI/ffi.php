<?php

// Maximum number of strings and maximum string length.
$maxStrings = 9;
$maxStrLen = 16;

// C definition for the bubble_sort function.
$ffi = FFI::cdef("
    void bubble_sort(char* list[], int n);
", "./liblab.so");

// Create FFI\CData array.
$arr = FFI::new("char[$maxStrings][$maxStrLen]");

// Show the initial state of our fruit array, in scrambled order.
$fruits = ['pear', 'apple', 'cherry', 'banana', 'kiwi', 'peach', 'grape', 'strawberry', 'blueberry'];
echo "Our fruits to begin: " . PHP_EOL;
echo implode(", ", $fruits) . str_repeat(PHP_EOL, 2);

// Populate the FFI\CData array with our PHP fruits.
for ($i = 0; $i < $maxStrings; $i++) {
    $fruit = $fruits[$i];
    for ($j = 0; $j < strlen($fruit); $j++) {
        $arr[$i][$j] = $fruit[$j];
    }
    $arr[$i][strlen($fruit)] = "\0";
}

// Create a list of pointers to the strings.
$list = FFI::new("char*[$maxStrings]");
for ($i = 0; $i < $maxStrings; $i++) {
    $list[$i] = FFI::cast("char*", FFI::addr($arr[$i]));
}

// Perform bubble sort on our pointer list.
$ffi->bubble_sort($list, $maxStrings);

// Print the sorted array.
echo "Our fruits after sorting:" . PHP_EOL;
for ($i = 0; $i < $maxStrings; $i++) {
    echo FFI::string($list[$i]);
    echo ($i + 1 < $maxStrings) ? ", " : "";
}
echo PHP_EOL;
