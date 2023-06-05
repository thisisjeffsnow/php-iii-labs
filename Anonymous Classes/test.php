<?php

// regular expression used in the filter
define('REGEX', '!.*\.php$!i');
// starting path for search
$path = __DIR__ . "../../";
// set up directory iteration
$dirIterator = new RecursiveDirectoryIterator($path);
$recIterator = new RecursiveIteratorIterator($dirIterator);
// define filter using an anonymous class
$filtIterator = new class($recIterator) extends FilterIterator
{
    public function accept()
    {
        $fn = $this->key();
        return preg_match(REGEX, basename($fn)) ?? '';
    }
};
// display results
foreach ($filtIterator as $name => $obj) echo $name . "\n";
