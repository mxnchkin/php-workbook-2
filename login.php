<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<HTML>
<head>
	<title>Test Signon - v0.3</title>
</head>

<body>
	<h1>Test Signon - v0.3</h1>

<?php 
	
	$ip = $_SERVER["REMOTE_ADDR"];
    $date = date('d-m-Y H:i:s');
    $file = 'log.txt';



	$status   = False;
	$userid   = $_POST['userid'];
	$password = $_POST['password'];
	if (($userid == 'amy')  && ($password == 'admin'))
		$status = "loggedIn";

	elseif (($userid == 'rojeen')  && ($password == 'admin')) {
			$status = "loggedIn";
   
	} else {
		echo 'userid and/or password invalid<br>';
		$status = "loggedOut";
	}
	$_SESSION["status"] = $status;
	echo 'Current logged in status is : ' . $status;
 	$current = file_get_contents($file);

    $newLine=  $userid . ' logged in from IP Address of ' . $ip . ' on ' . $date . "\r\n";
    $current = $current . $newLine;
    file_put_contents($file, $current)

?>

	<form name='form1' id='form1' action="index.html" method="get">
		Home : <input type="submit"  value="Home">
	</form>
	Client screen width : <?php echo $_POST['width']; ?>
	<br><br>
</body>
</HTML>
