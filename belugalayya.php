<?php

$h = fopen('file.txt', 'r');
$f_bzu = [];
$f_bzu2 = [];
$datax = ['first' => [], 'second'=> []];
while (($line = fgets($h)) !== false) {
    $line = trim($line);
    $data = explode(',', $line);
    $diff_a = array_diff(str_split($data[0]), str_split($data[1]));
    $diff_b = array_diff(str_split($data[1]), str_split($data[0]));
    $pos_in_first = [];
    $pos_in_second = [];
    foreach($diff_a as $ltr) {
        $pos = strpos($data[0], $ltr);
        $pos_in_first[] = $pos;
    }
    $datax['first'][$line] = $pos_in_first;
    foreach($diff_b as $ltr) {
        $pos = strpos($data[1], $ltr);
        $pos_in_second[] = $pos;
    }
    $datax['second'][$line] = $pos_in_second;
}

echo '<h1> Diff According to First </h1><pre>';
foreach($datax['first'] as $line => $pos) {
    echo  $line . ',' . implode(',', $pos) . "\r\n";
}
echo '</pre><h1> Diff According to Second </h1><pre>';
foreach($datax['second'] as $line => $pos) {
    echo  $line . ',' . implode(',', $pos) . "\r\n";
}
echo '</pre>';
