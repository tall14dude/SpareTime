<?php
$debug = false;
If ($debug === true){
	print_r($_POST);
	echo "<br />";
}
if ($_SERVER[REQUEST_METHOD] == "POST"){
	$data = $_POST[data];
	$to = $data[to];
	$headers = 'From: my laptop';
	$subject = $data[subject];
	$body = $data[message];

mail($to, $subject, $body, $headers);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Email ME!</title>
</head>
<body>
	<?php if($_SERVER[REQUEST_METHOD] == "GET") : ?>
	<form action="mail.php" method="POST" name="data">
		<fieldset>
			<legend>Mail fields:</legend>
			<label for="txtTo">To: </label><input type="text" id="txtTo" name="data[to]" /><br/>
			<label for="txtSubject">Subject: </label><input type="text" id="txtSubject" name="data[subject]" /><br/>
			<label for="txtMessage">Message: </label><textarea rows="3" cols="40" id="txtMessage" name="data[message]"></textarea><br />
			<input type="submit" value="Send Mail" id="submit"/> 
			</fieldset>
	</form>
	<?php endif; ?>
	<?php if($_SERVER[REQUEST_METHOD] == "POST") : ?>
	<div>
		<h4>Your Email</h4>
		<hr />
		<?php echo $headers; ?><br />
		To: <?php echo $to; ?><br />
		Subject: <?php echo $subject; ?><br />
		Message: <?php echo $message; ?>
	</div>
	<?php endif; ?>
</body>
</html>