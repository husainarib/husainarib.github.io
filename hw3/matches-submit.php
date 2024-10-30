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
    $user = getUserData($name);

    if ($user === null) {
        echo "<p>User not found.</p>";
    } else {
        echo "<h2>Matches for {$user[0]}</h2>";
        foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $line) {
            $candidate = explode(",", $line);
            if ($candidate[0] !== $user[0] && isMatch($user, $candidate)) {
                echo "<div class='match'>";
                echo "<p><img src='user.png' alt='User image'>{$candidate[0]}</p>";
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

    <p><a href="index.php"><img src="back.png" alt="Back to front page"> Back to front page</a></p>
</body>

</html>