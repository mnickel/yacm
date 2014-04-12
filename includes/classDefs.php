<?php

	/*
		Contact object that lets us track some particulars about a person
	*/
	class Contact {
		public $contactId = "";
		public $firstName = "";
		public $lastName = "";
		public $email = "";
		public $mobileNbr = "";

        public function __construct($firstName, $lastName, $email, $mobileNbr) {
        	$this->contactId = uniqid("c_");
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->email = $email;
			$this->mobileNbr = $mobileNbr;
        }

        /* always good to have a json serializer for ease of consumption in javascript */
        public function toJson() {
        	return json_encode($this);
        }

        /* 
        	Normal getter/setter methods
        */
        public function getContactId() { 
        	return $this->contactId;
        }

        public function getFirstName() { 
        	return $this->firstName;
        }

        public function getLastName() {
        	return $this->lastName;
        }

        public function getEmail() {
        	return $this->email;
        }

        public function getMobileNbr() {
        	return $this->mobileNbr;
        }

        public function setContactId($id) {
        	$this->contactId = $id;
        }

        public function setFirstName($fn) {
        	$this->firstName = $fn;
        }

        public function setLastName($ln) {
        	$this->lastName = $ln;
        }

        public function setEmail($e) {
        	$this->email = $e;
        }

        public function setMobileNbr($mn) {
        	$this->mobileNbr = $mn;
        }
	}

	/*
		ContactList
		maintains an internal associative array of contacts that's indexed by unique guid
	*/
	class ContactList {
		private $list = array();

		/* when a new contact is added, push its guid on to the displayList array */
		public function addContact($contact) {
			$this->list[$contact->getContactId()] = $contact;
		}

		/* when removed, also remove the displayList */
		public function removeContact($contactId) {
			unset($this->list[$contactId]);

			// compress down... probably inefficient for giant arrays
			$this->list = array_filter($this->list);
		}

		/* simply build up a json representation of all contacts */
		public function toJson() {
			return json_encode($this->list);
		}

	}

?>
