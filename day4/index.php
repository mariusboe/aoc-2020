<?php
    $time_start = microtime(true);
    $url = "input.txt";
    $file = file_get_contents($url);
    $credentials = explode("\n", $file);

    function passports_parse($credentials) {
        $passports = [];
        $current_credentials = [];
        for ($i = 0; $i < count($credentials); $i++) {
            $cred = trim($credentials[$i]);
            if ($cred == '') {
                $passports[] = single_passport_parse($current_credentials);
                $current_credentials = [];
            } else
                $current_credentials[] = $cred;
        }

        if (count($current_credentials) != 0)
            $passports[] = single_passport_parse($current_credentials);

        return $passports;
    }

    function single_passport_parse($fields) {
        $passport = [];

        foreach ($fields as $fieldlist) {
            $keystoValues = explode(' ', $fieldlist);
            foreach ($keystoValues as $keystoValue) {
                [$field, $value] = explode(':', $keystoValue);
                $passport[$field] = $value;
            }
        }

        return $passport;
    }

    function get_part_1() {
        global $credentials;
        $passports = passports_parse($credentials);
        $required_fields = ['byr', 'iyr', 'eyr', 'hgt', 'hcl', 'ecl', 'pid'];
        $valid_passports = [];

        foreach ($passports as $passport) {
            $valid = true;
            foreach ($required_fields as $required_field) {
                if (!array_key_exists($required_field, $passport))
                    $valid = false;
            }

            if ($valid)
                $valid_passports[] = $passport;
        }

        return $valid_passports;
    }
    function get_part_2() {
        $passports = get_part_1();

        foreach ($passports as $passport) {
            $valid = false;
            if (
                ($passport['eyr'] >= 2020 && $passport['eyr'] <= 2030 && strlen($passport['eyr']) == 4)
                && ($passport['iyr'] >= 2010 && $passport['iyr'] <= 2020 && strlen($passport['iyr']) == 4)
                && (preg_match('/^((59|6[0-9]|7[0-6])in|1([5-8][0-9]|9[0-3])cm)$/', $passport['hgt']))
                && (preg_match('/^#[0-9a-f]{6}$/', $passport['hcl']))
                && (preg_match('/^[0-9]{9}$/', $passport['pid']))
                && ($passport['byr'] <= 2002 && $passport['byr'] >= 1920 && strlen($passport['byr']) == 4)
                && (in_array($passport['ecl'], ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth']))
                ) {
                    $valid = true;
                }
                if ($valid) {
                    $valid_passports[] = $passport;
                }
        }
        return $valid_passports;
    }
    echo "Part one answer is: ". count(get_part_1());
    echo "<br>";
    echo "Part two answer is: ". count(get_part_2());
    echo "<br>";

    // Display Script End time
    $time_end = microtime(true);

    //dividing with 60 will give the execution time in minutes other wise seconds
    $execution_time = ($time_end - $time_start)*1000;

    //execution time of the script
    echo '<b>Total Execution Time:</b> '.$execution_time.' ms';
?>