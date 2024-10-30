<?php

function getUserData($name)
{
    $lines = file("singles.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $data = explode(",", $line);
        if ($data[0] === $name) {
            return $data;
        }
    }
    return null;
}

function isMatch($user, $candidate)
{
    // Check opposite gender
    if ($user[1] === $candidate[1]) {
        return false;
    }

    // Check age compatibility
    $userAge = (int) $user[2];
    $userMinAge = (int) $user[5];
    $userMaxAge = (int) $user[6];
    $candidateAge = (int) $candidate[2];
    $candidateMinAge = (int) $candidate[5];
    $candidateMaxAge = (int) $candidate[6];

    if (
        !($candidateAge >= $userMinAge && $candidateAge <= $userMaxAge) ||
        !($userAge >= $candidateMinAge && $userAge <= $candidateMaxAge)
    ) {
        return false;
    }

    // Check favorite OS compatibility
    if ($user[4] !== $candidate[4]) {
        return false;
    }

    // Check personality type compatibility
    $userPersonality = str_split($user[3]);
    $candidatePersonality = str_split($candidate[3]);
    $matchFound = false;

    foreach ($userPersonality as $index => $char) {
        if (isset($candidatePersonality[$index]) && $char === $candidatePersonality[$index]) {
            $matchFound = true;
            break;
        }
    }

    return $matchFound;
}

// Extra Feature #1: Robust page with form validation
function validateName($name)
{
    return !empty($name);
}

function validateAge($age)
{
    return is_numeric($age) && $age >= 0 && $age <= 99;
}

function validateGender($gender)
{
    return in_array($gender, ["M", "F"]);
}

function validatePersonality($personality)
{
    return preg_match("/^[IE][NS][FT][JP]$/", $personality);
}

function validateOS($os)
{
    return in_array($os, ["Windows", "Mac OS X", "Linux"]);
}

function validateAgeRange($min_age, $max_age)
{
    return is_numeric($min_age) && is_numeric($max_age) &&
        $min_age >= 0 && $min_age <= 99 &&
        $max_age >= 0 && $max_age <= 99 &&
        $min_age <= $max_age;
}

function validateSignupData($name, $age, $gender, $personality, $os, $min_age, $max_age)
{
    return validateName($name) &&
        validateAge($age) &&
        validateGender($gender) &&
        validatePersonality($personality) &&
        validateOS($os) &&
        validateAgeRange($min_age, $max_age);
}

function validateMatchData($name)
{
    return validateName($name);
}

function displayError($message)
{
    echo "<p>Error: $message</p>";
    exit;
}
