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
