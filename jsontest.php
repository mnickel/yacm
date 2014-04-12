<?php

	class Foo {
		public $name = "foo";
		public $last = "bar";
	}
	$f = new Foo();

	print json_encode($f);
	print "<p></p>";
	print $f->name . " --- " . $f->last;
	print "<p></p>";

	$alist = array("a", "b", "c", "d");

	print "alist size" . count($alist) . "<p></p>";
	foreach( $alist as $a ) {
		print $a;
		print "<p></p>";		
	}

	unset( $alist[1] );
	unset( $alist[2] );
	print "alist size" . count($alist) . "<p></p>";
	foreach( $alist as $a ) {
		print $a;
		print "<p></p>";		
	}

	print "<u>Array Items</u> -- " . count($alist);
	print "<p></p>";
	print "0--";
	print $alist[0];
	print "<p></p>";
	print "1--";
	print $alist[1];
	print "<p></p>";
	print "2--";
	print $alist[2];
	print "<p></p>";
	print "3--";	
	print $alist[3];
	print "<p></p>";

	$alist = array_values($alist);

	print "<u>Array Items after array_values</u> -- " . count($alist);
	print "<p></p>";
	print "0--";
	print $alist[0];
	print "<p></p>";
	print "1--";
	print $alist[1];
	print "<p></p>";
	print "2--";
	print $alist[2];
	print "<p></p>";
	print "3--";	
	print $alist[3];
	print "<p></p>";



?>
