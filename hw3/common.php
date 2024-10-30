<?php
function getUserData($name)
{
    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $line) {
        $data = explode(",", $line);
        if ($data[0] === $name)
            return $data;
    }
    return null;
}

function isMatch($user, $candidate)
{
    return $user[1] !== $candidate[1] &&
        $candidate[2] >= $user[5] && $candidate[2] <= $user[6] &&
        $user[4] === $candidate[4] &&
        count(array_intersect(str_split($user[3]), str_split($candidate[3]))) > 0;
}
