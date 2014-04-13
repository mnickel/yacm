<?php
require 'includes/classDefs.php';
session_start();

?>
<html>
<head>
    <link href="lib/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/lib/dataTables/css/jquery.dataTables.css" type="text/css" />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="/lib/dataTables/js/jquery.dataTables.js"></script>
    <script src="lib/bootstrap3/js/bootstrap.min.js"></script>
    <script src="js/jquery.tmpl.js"></script>
    <script src="js/ad-data.js"></script>
    <script src="js/app.js"></script>
</head>

<body>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">YACM!</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#basicModal">Add Contact</button></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="contactContainer">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="contactGrid" width="80%">
            <thead>
                <tr>
	                <th>&nbsp;</th> <!--  contactId -->
		            <th>First Name</th>
		            <th>Last Name</th>
		            <th>Email</th>
		            <th>Mobile Number</th>
                </tr>
            </thead>
        </table>
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