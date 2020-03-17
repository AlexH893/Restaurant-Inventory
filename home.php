<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Restaurant Inventory System</title>
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.js"></script>
</head>
<div class="container">
	<!-- Navigation Bar -->
	<div class="jumbotron text-center" id="homelogo">
		<h1>Restaurant Inventory</h1>
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class="navbar-brand">Restaurant</div>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="Home.php">Home</a>
				</li>
				<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
        <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="Reports-Select.php">View Reports</a>
						</li>
					</ul>
				</li>
				<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
        <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="orders.php">Purchased/Used Items</a>
						</li>
						<li><a href="invoices.php">Invoices</a>
						</li>
					</ul>
				</li>
				<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Items Inventory
        <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="EnterItems.php">Entry</a>
						</li>
						<li><a href="DisplayChange.php">Change/Display</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="Logout.php"><span class="glyphicon glyphicon-share-alt"></span>Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Carousel -->
	<div id="carousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel" data-slide-to="0" class="active"></li>
			<li data-target="#carousel" data-slide-to="1"></li>
		</ol>
		<!-- Wrapper for slides  -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="images/veg.jpg" class="center-block" alt="">
			</div>
			<div class="item">
				<img src="images/restaurant.jpg" class="center-block" alt="">
			</div>
		</div>
	</div>
	<!-- End of carousel -->

	<body>
		<div id="ContainerRSelect">
			<div class="panel panel-default">
				<fieldset>
					<legend>
						<h2>Items Inventory</h2>
					</legend>
					<h4>Entry</h4>
					<p>This page is for entering items into the inventory stock. Enter an item description, select category, and quantity. A table at the bottom shows the current inventory that's pulled from a database.</p>
			</div>
			<div class="panel panel-default">
				<h4>Change/Display</h4>
				<p>This is where you will be able to display all of your Inventory or do a search of your inventory by description, date, or Category. To search all of the Inventory just hit search. You can also change an item to do this enter the item number of the item you want to change then hit change, make sure to enter all fields. You can also delete items just enter the item number and hit delete.</div>
		</div>
		<div id="ContainerRSelect">
			<div class="panel panel-default">
				<legend>
					<h2>Orders</h2>
				</legend>
				<h4>Purchased/Used Items</h4>
				<p>This is were you will enter your purchased items but you must first enter the item in the Entry before using Purchased/Used Items.</div>
			<div class="panel panel-default">
				<h4>Invoices</h4>
				<p>This displays the Invoices of your purchases.</div>
		</div>
		<div id="ContainerRSelect">
			<div class="panel panel-default">
				<legend>
					<h2>Reports</h2>
				</legend>
				<h4>View Reports</h4>
				<p>This is were you will enter your purchased items but you must first enter the item in the Entry before using Purchased/Used Items.</div>
		</div>
</div>
</fieldset>
</body>


 <div class="row" id="footerNav">
	<div class="container col-md-3">
		<legend style="color:white;"> Reports </legend>
			<ul style="list-style-type:none">
				<a href="Reports-Select.php"><li> View Reports</li></a>
			</ul>
	</div>
	
	<div class="container col-md-3">
		<legend style="color:white;"> Orders </legend>
			<ul style="list-style-type:none">
            <li><a href="orders.php">Purchased/Used Items</a></li></li>
				<a href="invoices.php"><li> Invoices</li></a>
			</ul>
	</div>
	
	<div class="container col-md-3">
		<legend style="color:white;"> Items Inventory </legend>
			<ul style="list-style-type:none">
				<a href="EnterItems.php"><li> Entry</li></a>
				<a href="DisplayChange-Inventory.php"><li>Change/Display Inventory</li></a>
			</ul>
	</div>

	<footer class="clear txt-center">
<center>&copy; Restaurant Inventory | 2017</center>
</footer>


</div>
</div>
<!-- Code for modal -->
  <!-- Trigger the modal with a button -->
  <button type="button" id="elementID" class="hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Displaying Report</h4>
        </div>
        <div class="modal-body">
          <p>Report has been loaded</p>
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Continue</button>
        </div>
      </div>
      
    </div>
  </div>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>