<?php

/*
	updateContact.php

	get the contact values from the query string and update a Contact in the session
	where the contact_id matches

	return a status message that the object was or was not successfully updated
*/
	require "../includes/classDefs.php";
	session_start();

	//return an interesting resultset
	$result = array();
	$items = array();


	// get parameters
	$cid = $_GET["contact_id"];
	$fn = $_GET["first_name"];
	$ln = $_GET["last_name"];
	$e = $_GET["email"];
	$mn = $_GET["mobile_nbr"];

	// set up the ContactList as necessary
	$contactList = $_SESSION["contact_list"];

	if( !isset($contactList) ) {
		$contactList = new ContactList();
		$result["status"] = false;
		$result["items"] = array();
	} else {

		// find the matching contact
		foreach( $contactList->toArrayList() as $contact ) {
			if( $contact->getContactId() == $cid ) {
				$contact->setFirstName($fn);
				$contact->setLastName($ln);
				$contact->setEmail($e);
				$contact->setMobileNbr($mn);

				array_push($items,$contact);
				$_SESSION["contact_list"] = $contactList;
			}
		}

		$result["status"] = true;
		$result["items"] = $items;
	}

	header("Content-Type: application/json");
	echo json_encode($result);
	exit;
?>