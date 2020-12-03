<?php
    $time_start = microtime(true);
    $url = "input.txt";
    $file = file_get_contents($url);
    $results = explode("\n", $file);

    function trees($toRight = 3, $toDown = 1) {
        global $results;

        $trees = $right = $down = 0;

        while ($down < count($results)) {
            if ($results[$down][$right] == '#') {
                $trees++;
            }
            $right = ($right + $toRight) % (strlen($results[0]));
            $down += $toDown;
        }

        return $trees;
    }

    $y =  trees(1,1) * trees() * trees(5, 1) * trees(7, 1) * trees(1, 2);
    echo "Part one answer is: ". trees();
    echo "<br>";
    echo "Part two answer is: ".$y;
    echo "<br>";
    // Display Script End time
    $time_end = microtime(true);

    //dividing with 60 will give the execution time in minutes other wise seconds
    $execution_time = ($time_end - $time_start)*1000;

    //execution time of the script
    echo '<b>Total Execution Time:</b> '.$execution_time.' ms';
?>