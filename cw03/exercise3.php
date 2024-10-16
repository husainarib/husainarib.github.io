<?php
function triangle($size)
{
    for ($i = 1; $i <= $size; $i++) {
        echo str_repeat(' ', $size - $i).str_repeat('*', $i)."<br>";
    }
}
triangle(5);
