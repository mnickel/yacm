<?php

/*
	listContacts.php

	just return a result that is a JSON Array of Contacts
*/
	require "../includes/classDefs.php";	
	session_start();

	$contactList = $_SESSION["contact_list"];
	$result = array();
	if(isset($contactList)) {
		$result["status"] = true;
		$result["items"] = $contactList->toArrayList();
	} else {
		$result["status"] = false;
		$result["items"] = null;
	}
	print json_encode($result);
?>