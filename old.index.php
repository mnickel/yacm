<?php
require 'includes/classDefs.php';
$c1 = new Contact("Mark", "Nickel", "mark.nickel@gmail.com", "999.555.5555");
$c2 = new Contact("Fred", "Flinstone", "ff@gmail.com", "999.555.5555");

$guidHold = $c1->getContactId();

$cList = new ContactList();
$cList->addContact($c1);
$cList->addContact($c2);

?>
<html>
<body>
<pre>
Stuff:
<?php print $c1->toJson()."<br/>".$c2->toJson(); ?>
<p></p>
<?php print $cList->toJson() ?>
<p></p>
<?php
	//$cList->removeContact( $guidHold );
	print $cList->toJson();
?>

</pre>
</body>
</html>