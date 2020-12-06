<?php
    $time_start = microtime(true);
    $url = "input.txt";
    $file = file_get_contents($url);
    $customsForm = explode("\n\n",$file);

function solvePartOne($customsForm, $count = 0) {
    foreach($customsForm as $group){
        $array_unique = array_unique((str_split(preg_replace("/[^A-Za-z0-9]/","",$group))));
        $count += count($array_unique);
    }
    return $count;
}
function solvePartTwo($customsForm, $count = 0) {
    foreach ($customsForm as $group) {
        foreach (count_chars(str_replace("\r","",$group)) as $occurrence) {
            if((substr_count($group, "\n")+1) == $occurrence){
                $count++;
            }
        }
    }
    return $count;
}

echo "Part one answer is: ". solvePartOne($customsForm);
echo "<br>";
echo "Part two answer is: ". solvePartTwo($customsForm);
echo "<br>";
// Display Script End time
$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start)*1000;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' ms';
?>