<?php
/*
	removeContact.php

	remove a Contact from the contactList based on the guid/unique id of the Contact
*/
	require "../includes/classDefs.php";	
	session_start();

	$contactList = $_SESSION["contact_list"];

	$contactId = $_GET["contact_id"];

	$result = array();

	if(isset($contactList)){ 
		$contactList->removeContact($contactId);

		$_SESSION["contact_list"] = $contactList;

		$result["status"] = true;
		$result["items"] = $contactList->toArrayList();
	} else {
		$result["status"] = false;
		$result["items"] = null;
	}

	print json_encode($result);


?>