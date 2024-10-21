<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_POST["student_name"]);
	$section = htmlspecialchars($_POST["section"]);
	$cc_number = htmlspecialchars($_POST["cc_number"]);
	$cc_type = htmlspecialchars($_POST["cc_type"]);
} else {
	header("Location: buyagrade.html");
	exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Buy Your Way to a Better Education!</title>
	<link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<h1>Thanks, sucker!</h1>

	<p>Your information has been recorded.</p>

	<dl>
		<dt>Name</dt>
		<dd><?php echo $name; ?></dd>

		<dt>Section</dt>
		<dd><?php echo $section; ?></dd>

		<dt>Credit Card</dt>
		<dd><?php echo $cc_number; ?> (<?php echo $cc_type; ?>)</dd>
	</dl>
</body>

</html>