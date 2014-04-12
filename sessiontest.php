

<?php
	session_start();
$session_id = session_id();
$val = "";

if( empty($session_id) ) {

	$session_id = session_id();
	$val = $session_id;
	$_SESSION["counter"] = 0;
} else {
	$val = $session_id;

	$foo = $_SESSION["counter"];
	$foo++;

	$_SESSION["counter"] = $foo;
}

?>

<html>
<body>

<?php print "<h1>--" . $_SESSION["counter"] . " -- " . $val . "--</h1>"; ?>


</body>
</html>