<?php

/*
	addContact.php

	get the contact values from the query string, build a Contact Object and add it to the session

	return a status message that the object was or was not successfully added
*/
	require "../includes/classDefs.php";
	session_start();


	// get parameters
	$fn = $_GET["first_name"];
	$ln = $_GET["last_name"];
	$e = $_GET["email"];
	$mn = $_GET["mobile_nbr"];

	// set up the ContactList as necessary
	$contactList = $_SESSION["contact_list"];

	if( !isset($contactList) ) {
		$contactList = new ContactList();
	}

	$contact = new Contact($fn, $ln, $e, $mn);
	$contactList->addContact( $contact );

	$_SESSION["contact_list"] = $contactList;

	//return an interesting resultset
	$result = array();
	$items = array();
	array_push($items,$contact);

	$result["status"] = true;
	$result["items"] = $items;

	print json_encode($result);
?>