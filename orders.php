<!DOCTYPE html>
<!--
Created by: Alex Haefner
	
	Fill out corresponding fields and add items to an order list and add to a database. To be compiled into an invoice.

-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Restaurant Inventory System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="styles">
	<link href="css/style.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
 var index1 = 0;
 var index2 = 0;
 var index3 = 0;
</script>
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
      <li><a href="Home.php">Home</a></li>
	     <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li><a href="Reports-Select.php">View Reports</a></li>
		</ul>
		</li>
		
		  <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li class="active"><a href="orders.php">Purchased/Used Items</a></li>
          <li><a href="invoices.php">Invoices</a></li>
		</ul>
		</li>
		
		  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Items Inventory
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li ><a href="EnterItems.php">Entry</a></li>
          <li><a href="DisplayChange-Inventory.php">Change/Display</a></li>
		</ul>
		</li>
		

	   	  
    </ul>
    <ul class="nav navbar-nav navbar-right">
              <li><a href="Logout.php"><span class="glyphicon glyphicon-share-alt"></span>Logout</a></li>
    </ul>
  </div>
</nav>
<!-- End of Navbar -->
<body>
	<div id="ContainerRSelect">
		<div class="panel panel-default">
	 	<form action="orders.php" method="post">
    	    <fieldset>
    	        <legend><h2>Add Item</h2></legend>
    	        <div class="row">
				<div class="col-sm-3">
    	                <label for="ItemNumber">Item Number:</label>
                        <div class="input-group">
                            <input name="Item_Num" id="Item_Num" class="form-control" type="text" value="<?php $Item_Num?>" placeholder="Enter or select item">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default">&nbsp;<span class="caret"></span></button>
                            </span>
                        </div>
    	            </div>

    	            <div class="col-sm-4">
    	                <label for="Description">Item Description:</label>
                        <div class="input-group">
                            <input name="Item_Description" id="Item_Description" class="form-control" type="text" value="<?php $Item_Description?>" placeholder="Enter or select item">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default">&nbsp;<span class="caret"></span></button>
                            </span>
                        </div>
    	            </div>
	            </div>
				<br>
	            <div class="row">
	                <div class="col-sm-3">
    	                <label for="onHand">Used</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button onclick="index1 = index1 - 1;document.getElementById('Used').value = index1;" id="Used-" type="button" class="btn btn-default">-</button>
                            </span>
                            <input name="Used" id="Used" class="form-control" type="text"  value="<?php $Used?> 0" style="text-align: center;">
                            <span class="input-group-btn">
                                <button onclick="index1 = index1 + 1;document.getElementById('Used').value = index1;" id="Used+" type="button" class="btn btn-default">+</button>
                            </span>
                        </div>
	                </div>
	                <div class="col-sm-3">
    	                <label for="onHand">Quantity</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button onclick="index2 = index2 - 1;document.getElementById('Quantity').value = index2;" id="Quantity-" type="button" class="btn btn-default">-</button>
                            </span>
                            <input name="Used" id="Quantity" class="form-control" type="text"  value="<?php $Quantity?> 0" style="text-align: center;">
                            <span class="input-group-btn">
                                <button onclick="index2 = index2 + 1;document.getElementById('Quantity').value = index2;" id="Quantity+" type="button" class="btn btn-default">+</button>
                            </span>
                        </div>
	                </div>
	                <div class="col-sm-3">
    	                <label for="onHand">Price</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button onclick="index3 = index3 - 1;document.getElementById('Price').value = index3;" id="Price-" type="button" class="btn btn-default">-</button>
                            </span>
                            <input name="Used" id="Price" class="form-control" type="text"  value="<?php $Price?> 0" style="text-align: center;">
                            <span class="input-group-btn">
                                <button onclick="index3 = index3 + 1;document.getElementById('Price').value = index3;" id="Price+" type="button" class="btn btn-default">+</button>
                            </span>
                        </div>
	                </div>
	                
	            </div><br />
	            <div class="row" style="padding-left: 22px;">
	                <button type = "Submit" name="Submit" class="btn btn-primary">Add</button>
	                <button class="btn">Clear</button>
	            </div>
				</div>
				</form>
<?php

if (isset($_POST['Submit'])) {
//form validation - checks to see if fields were left empty
		$FormErrorCount = 0;
	if (isset($_POST['Item_Num'])) {	
		$Item_Num = stripslashes($_POST
		['Item_Num']);	
		$Item_Num = trim($Item_Num);
		if (strlen($Item_Num) == 0) {
			echo "<p>You must include the Item Number.</p>\n";
			++$FormErrorCount;
		}		
	}

	else {
		echo "<p>Form submittal error (No 
		'Item_Num' field)!</p>\n";
		
	}

	if (isset($_POST['Item_Description'])) {

		$Item_Description = stripslashes($_POST
		['Item_Description']);	
		$Item_Description = trim($Item_Description);
		if (strlen($Item_Description) == 0) {
			echo "<p>You must inculde the Item Description.</p>\n";
			++$FormErrorCount;
		}		
	}

	else {
		echo "<p>Form submittal error (No 
		'Item_Description' field)!</p>\n";
		
	}
	//end of validation
	
//   // create an empty array 
// $itemArray = array();





	$Used = $_POST['Used'];	
  $Quantity = $_POST['Quantity'];	
	$Price = $_POST['Price'];
	$Date = date("y-m-d");
	if ($FormErrorCount == 0){
		$ShowForm = FALSE;

    include("Connect.php");
		if ($con !== FALSE){
			$TableName = "orders";
			$SQLstring = "INSERT INTO $TableName " .
			"(Item_Number,  Item_Description, Used, Quantity, Price, Date_entered) VALUES " .	
			"('$Item_Num',  '$Item_Description', '$Used', '$Quantity', '$Price', CAST('". $Date ."' AS DATE))";	
			$QueryResult = mysqli_query($con, $SQLstring);
	if ($QueryResult === FALSE)

		echo "<p> Unable to execute the query.</p>"
		. "<p>Error code " .mysqli_errno($con)
		. ": ". mysqli_error($con) . "</p>";
	else{
		$ItemID = mysqli_insert_id($con);
		echo "<p>Successfully added the item.</p>";
		}
		mysqli_close($con);
	}
	
}
}			
else {
	$ShowForm = TRUE;

    $Item_Description = " ";
	$On_Hand_Qty = 0;
    $Category = " ";
	$Min_Qty = 0;
	$Date = " ";
}

?>
    <
    /div>
<?php	        
	include("Connect.php");
	

	?>
		
		<div id="ContainerRSelect">
		<div class="panel panel-default">
        <div class="row" style="width:75%; padding-left:25px;">
            <h2>Orders</h2>
            <table class="table table-bordered table-striped">
                <tr class="header">
                    <th>Item Number</th>
                    <th>Item Description</th>
                    <th>Used</th>
					          <th>Quantity</th>
                    <th>Price</th>
					          <th>Date Entered</th>
                </tr>
				<!--End of header -->
 
<!-- loop to populate the table -->
<?php
 include("Connect.php");
$sql = "SELECT * FROM orders";
$result = mysqli_query($con,$sql);

        while ($row = mysqli_fetch_array($result)) {
			       echo "<tr>";
                   echo "<td>".$row["Item_Number"]."</td>";
                   echo "<td>".$row["Item_Description"]."</td>";
                   echo "<td>".$row["Used"]."</td>";	
                   echo "<td>".$row["Quantity"]."</td>";	
                   echo "<td>".$row["Price"]."</td>";		
                   echo "<td>".$row["Date_entered"]."</td>";
                   echo "</tr>";
               } //end of loop
?>
    <!-- End of table -->
 
 
            </table>
                              <button type = "Submit" name="Submit" class="btn btn-primary">Submit Order</button>  
        </div>
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