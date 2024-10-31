<?php
include 'common.php';

// Capture form data with checks for undefined keys
$name = isset($_POST['name']) ? $_POST['name'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$personality = isset($_POST['personality']) ? $_POST['personality'] : '';
$os = isset($_POST['os']) ? $_POST['os'] : '';
$min_age = isset($_POST['min_age']) ? $_POST['min_age'] : '';
$max_age = isset($_POST['max_age']) ? $_POST['max_age'] : '';

// Extra Feature 1: Robust page with form validation
if (!validateSignupData($name, $age, $gender, $personality, $os, $min_age, $max_age)) {
    displayError("Invalid input data. Please ensure all fields are correctly filled. <a href='signup.php'>Go back to sign up</a>");
    exit();
}

$user_data = "$name,$gender,$age,$personality,$os,$min_age,$max_age\n";
file_put_contents("singles.txt", $user_data, FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NerdLuv - Sign Up Confirmation</title>
    <link rel="stylesheet" href="nerdieluv.css">
</head>

<body>
    <div id="bannerarea">
        <h1>nerdLuv<sup>TM</sup></h1>
        <p>where meek geeks meet</p>
    </div>

    <h2>Thank you!</h2>
    <p>Welcome to NerdLuv, <?= htmlspecialchars($name) ?>!<br>
        Now <a href='matches.php'>log in to see your matches!</a></p>

    <p><a href="index.php"> Back to front page</a></p>

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