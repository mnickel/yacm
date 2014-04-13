<?php
require 'includes/classDefs.php';
session_start();

?>
<html>
<head>
    <link href="lib/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap3/js/bootstrap.min.js"></script>
    <script src="js/jquery.tmpl.js"></script>
    <script src="js/ad-data.js"></script>
    <script src="js/app.js"></script>
</head>

<body>

<a href="#" class="btn btn-lg btn-success"
   data-toggle="modal"
   data-target="#basicModal">Click to open Modal</a>

<div class="container">
	<div id="stuff">
		<span>MEH</span>
	</div>

</div>


<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Add Contact</h4>
            </div>
            <div class="modal-body">
				<form id="add-contact-form" class="form-horizontal" role="form">
				  <div class="form-group">
				    <label for="inputFirstName" class="col-sm-3 control-label">First Name</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" value="Mark">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputLastName" class="col-sm-3 control-label">Last Name</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" value="Nickel">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail" class="col-sm-3 control-label">Email</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="foobar.com">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputMobileNumber" class="col-sm-3 control-label">Mobile Number</label>
				    <div class="col-sm-9">
				      <input type="tel" class="form-control" id="inputMobileNumber" placeholder="Mobile Number" value="999.999.9999">
				    </div>
				  </div>
				</form>
            </div>
            <div class="modal-footer">
	            <button class="btn btn-success" id="add_submit">Submit</button>
	            <a href="#" class="btn" data-dismiss="modal">Close</a>
          	</div>
        </div>
    </div>
  </div>
</div>

</body>
</html>