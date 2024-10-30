<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdLuv - Sign Up</title>
    <link rel="stylesheet" href="nerdieluv.css">
</head>

<body>
    <div id="bannerarea">
        <h1>nerdLuv<sup>TM</sup></h1>
        <p>where meek geeks meet</p>
    </div>

    <form action="signup-submit.php" method="post">
        <fieldset>
            <legend>New User Signup:</legend>
            <label for="name" class="left"><strong>Name:</strong></label>
            <input type="text" id="name" name="name" maxlength="16"><br>

            <label class="left"><strong>Gender:</strong></label>
            <input type="radio" id="male" name="gender" value="M">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="F" checked>
            <label for="female">Female</label><br>

            <label for="age" class="left"><strong>Age:</strong></label>
            <input type="text" id="age" name="age" maxlength="2" size="6"><br>

            <label for="personality" class="left"><strong>Personality type:</strong></label>
            <input type="text" id="personality" name="personality" maxlength="4" size="6">
            <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp" target="_blank">(Don't know your type?)</a><br>

            <label for="os" class="left"><strong>Favorite OS:</strong></label>
            <select id="os" name="os">
                <option value="Windows">Windows</option>
                <option value="Mac OS X">Mac OS X</option>
                <option value="Linux">Linux</option>
            </select><br>

            <label class="left"><strong>Seeking age:</strong></label>
            <input type="text" name="min_age" maxlength="2" size="6" placeholder="min">
            to
            <input type="text" name="max_age" maxlength="2" size="6" placeholder="max"><br>

            <input type="submit" value="Sign Up">
        </fieldset>
    </form>

    <p>This page is for single nerds to meet and date each other! Type in your personal information and wait for the
        nerdly luv to begin! Thank you for using our site.</p>
    <p>Results and page (C) Copyright NerdLuv Inc.</p>

    <p>
        <a href="index.php"><img src="back.png" alt="Back to front page"> Back to front page</a>
    </p>

    <div id="w3c">
        <p>
            <img src="w3c-html5.png" alt="HTML5 compliant">
            <img src="w3c-css.png" alt="CSS compliant">
        </p>
    </div>
</body>

</html>