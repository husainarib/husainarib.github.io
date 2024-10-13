<?php
function word_count($str)
{
    $count = 0;
    $word = false;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] !== ' ') {
            if (!$word) {
                $word = true;
                $count++;
            }
        } else {
            $word = false;
        }
    }
    return $count;
}
echo word_count("hello, how are you?");
