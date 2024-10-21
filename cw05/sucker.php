<?php
function isValid($data)
{
	return isset($data) && trim($data) !== '';
}

$name = $_POST["student_name"];
$section = $_POST["section"];
$cc_number = $_POST["cc_number"];
$cc_type = $_POST["cc_type"];

if (isValid($name) && isValid($section) && isValid($cc_number) && isValid($cc_type)) {
	$entry = "$name;$section;$cc_number;$cc_type\n";
	file_put_contents("suckers.html", $entry, FILE_APPEND);
	$all_entries = file_get_contents("suckers.html");
} else {
	$error = "You didn't fill out the form completely. Try again.";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Buy Your Way to a Better Education!</title>
	<link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<?php if (isset($error)): ?>
		<h1>Sorry, sucker!</h1>
		<p><?php echo $error; ?></p>
		<p><a href="buyagrade.html">Try again</a></p>
	<?php else: ?>
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

		<p>Here are all the suckers who have submitted here:</p>

		<pre><?php echo $all_entries; ?></pre>
	<?php endif; ?>
</body>

</html>