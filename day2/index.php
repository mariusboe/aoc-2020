
<?php
    $time_start = microtime(true);
    $url = "input.txt";
    $file = file_get_contents($url);
    $results = explode("\n", $file);
    $i = 0;
    $y = 0;
    foreach ($results as $result) {
        $parts = explode(" ", $result);
        $parts[1] = str_replace(":", "", $parts[1]);
        $parts[0] = explode("-", $parts[0]);
        $total = substr_count($parts[2], $parts[1]);
        
        if ($total >= $parts[0][0] && $total <= $parts[0][1]) {
            $i++;
        }
        $min = $parts[0][0]-1;
        $max = $parts[0][1]-1;
        if (substr($parts[2], $min,1) == $parts[1] && substr($parts[2], $max,1) != $parts[1]) {
            if (substr($parts[2], $max,1)) {
                $y++;
            }
        }
        else if (substr($parts[2], $min,1) != $parts[1] && substr($parts[2], $max,1) == $parts[1]) {
            if (substr($parts[2], $max,1)) {
                $y++;
            }
        }
    }
    echo "Part one answer is: ".$i;
    echo "<br>";
    echo "Part two answer is: ".$y;
    echo "<br>";
    // Display Script End time
    $time_end = microtime(true);

    //dividing with 60 will give the execution time in minutes other wise seconds
    $execution_time = ($time_end - $time_start);

    //execution time of the script
    echo '<b>Total Execution Time:</b> '.$execution_time.' Seconds';
?>


