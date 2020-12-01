<?php

$url = "text.txt";
$file = file_get_contents($url);
$results = explode("\n", $file);
$reversed = array_reverse($results);
$shuffle = $reversed;
shuffle($shuffle);


function twoResults() {
    global $results;
    global $reversed;
    foreach ($results as $result) {
        foreach ($reversed as $single) {
            if ($result + $single == 2020) {
                echo $result * $single;
                break 2;
            }
        }
    }
}

function threeResults() {
    global $results;
    global $reversed;
    global $shuffle;
    foreach ($results as $result) {
        foreach ($reversed as $single) {
            foreach  ($shuffle as $suffled) {
                if ($result + $single + $suffled == 2020) {
                    echo $result * $single * $suffled;
                    break 3;
                }
            }
        }
    }
}

twoResults();
echo "<br>";
threeResults();

?>