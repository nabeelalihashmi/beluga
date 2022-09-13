<?php

echo '<pre>';
$h = fopen('file.txt', 'r');
$res_a = [];
$res_b = [];
while (($line = fgets($h)) !== false) {
    $line = trim($line);
    $data = explode(',', $line);
    $diff_a = array_diff(str_split($data[0]), str_split($data[1]));
    $diff_b = array_diff(str_split($data[1]), str_split($data[0]));
    $pos_in_first = [];
    $pos_in_second = [];
    foreach($diff_a as $ltr) {
        echo $line . "\r\n";
       
        $pos = strpos($data[0], $ltr);
        $pos_in_first[] = $pos;
        echo "[First]: ". $ltr . ' at position ' . $pos ."\r\n";
    }
    $res_a[$ltr] = '[' . implode(',', $pos_in_first) . ']';
    foreach($diff_b as $ltr) {
        echo $line . "\r\n";
        $pos = strpos($data[1], $ltr);
        $pos_in_second[] = $pos;
        echo "[Second]: ". $ltr . ' at position' . $pos ."\r\n";
    }
    $res_b[$ltr] = '[' . implode(',', $pos_in_second) . ']';
}

var_dump($res_a);
var_dump($res_b);

// echo "Difference in first: " . implode(',', $res_a) . "\r\n";
// echo "Differences in second:" . implode(',', $res_b);