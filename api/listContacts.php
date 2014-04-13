<?php

/*
	listContacts.php

	just return a result that is a JSON Array of Contacts
*/
	require "../includes/classDefs.php";	
	session_start();

	$contactList = $_SESSION["contact_list"];
	$la = $_GET["listAction"];
	$result = array();

	if(isset($contactList)) {
		if(isset($la)) {
			$contactArrayList = $contactList->toArrayList();
			$result["iTotalDisplayRecords"] = count($contactArrayList);
			$result["iTotalRecords"] = count($contactArrayList);	
			$result["aaData"] = $contactArrayList;

		} else {
			$result["status"] = true;
			$result["items"] = $contactList->toArrayList();	
		}

	} else {
		if(isset($la)) {
			$result["iTotalDisplayRecords"] = 0;
			$result["iTotalRecords"] = 0;	
			$result["aaData"] = array();
		} else {
			$result["status"] = false;
			$result["items"] = null;
		}
	}

	header("Content-Type: application/json");
	echo json_encode($result);
	exit;
?>