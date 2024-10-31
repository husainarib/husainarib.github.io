<?php
include_once 'common.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NerdLuv - Your Matches</title>
    <link rel="stylesheet" href="nerdieluv.css">
</head>

<body>
    <div id="bannerarea">
        <h1>nerdLuv<sup>TM</sup></h1>
        <p>where meek geeks meet</p>
    </div>

    <?php
    $name = $_GET["name"];
    // Extra Feature 1 : Robust page with form validation
    if (!validateMatchData($name)) {
        displayError("Invalid name. Please enter a valid name.");
    }
    $user = getUserData($name);

    if ($user === null) {
        echo "<p>User not found.</p>";
    } else {
        echo "<h2>Matches for {$user[0]}</h2>";
        foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $line) {
            $candidate = explode(",", $line);
            if ($candidate[0] !== $user[0] && isMatch($user, $candidate)) {
                echo "<div class='match'>";
                echo "<p><img src='user.png'>{$candidate[0]}</p>";
                echo "<ul>";
                echo "<li><strong>gender:</strong> {$candidate[1]}</li>";
                echo "<li><strong>age:</strong> {$candidate[2]}</li>";
                echo "<li><strong>type:</strong> {$candidate[3]}</li>";
                echo "<li><strong>OS:</strong> {$candidate[4]}</li>";
                echo "</ul>";
                echo "</div>";
            }
        }
    }
    ?>

    <p>This page is for single nerds to meet and date each other! Type in your personal information and wait for the
        nerdly luv to begin! Thank you for using our site.</p>
    <p>Results and page (C) Copyright NerdLuv Inc.</p>

    <div id="bannerarea">
        <a href="index.php">Back to front page</a>
    </div>

    <div id="w3c">
        <p>
            <img style="border:0;width:88px;height:31px" src="w3c-html5.png">s
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px"
                    src="http://jigsaw.w3.org/css-validator/images/vcss"
                    alt="Valid CSS!" />
            </a>
        </p>
    </div>

</body>

</html>