<?php
    $time_start = microtime(true);
    $url = "input.txt";
    $file = file_get_contents($url);
    $boardingpasses = explode("\n", $file);
    function solvePartOne($boardingpasses) {
        foreach ($boardingpasses as $boardingpass) {
            $trans = array ("B" => "1", "R" => "1", "F" => "0", "L" => "0");
            $translatetoBinary = strtr($boardingpass, $trans);
            $x = bindec($translatetoBinary);
            if ($x > $highscore) {
                $highscore = $x;
            }
            //var_dump($secondpart);
        }
        return $highscore;
    }
    function solvePartTwo($boardingpasses) {
        $sum = 0;
        $highest = 0;
        $lowest = 9999999999999999;
        $i = 0;
        foreach ($boardingpasses as $boardingpass) {
            $trans = array ("B" => "1", "R" => "1", "F" => "0", "L" => "0");
            $translatetoBinary = strtr($boardingpass, $trans);
            $x = bindec($translatetoBinary);
            if ($x > $highest) {
                $highest = $x;
            }
            if ($x < $lowest) {
                $lowest = $x;
            }
            $sum += $x;
            $i++;
        }
        $i++;
        $i = $i / 2;
        return $i * ($lowest + $highest) - $sum;
    }
    echo "Part one answer is: ". solvePartOne($boardingpasses);
    echo "<br>";
    echo "Part two answer is: ". solvePartTwo($boardingpasses);
    echo "<br>";
    // Display Script End time
    $time_end = microtime(true);

    //dividing with 60 will give the execution time in minutes other wise seconds
    $execution_time = ($time_end - $time_start)*1000;

    //execution time of the script
    echo '<b>Total Execution Time:</b> '.$execution_time.' ms';
?>