<?php
function countWords($str)
{
    $str = strtolower($str);
    $words = explode(' ', $str);
    $wordCount = [];

    foreach ($words as $word) {
        if (isset($wordCount[$word])) {
            $wordCount[$word]++;
        } else {
            $wordCount[$word] = 1;
        }
    }

    print_r($wordCount);
}
countWords("Hello Hello My My Name Arib");
