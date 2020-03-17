<!DOCTYPE html>
<!--
Created By: Alex Haefner

	Read from orders database and print out an invoice corresponding to the date the order was made
-->
<html>
   <link rel="stylesheet" type="text/css" href="footer.css">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
<!-- Navigation Bar -->
<div class="container">
<div class="jumbotron text-center" id="homelogo">
   <h1>Restaurant Inventory</h1>
</div>
<nav class="navbar navbar-inverse">
   <div class="container-fluid">
      <div class="navbar-header">
         <div class="navbar-brand">Restaurant</div>
      </div>
      <ul class="nav navbar-nav">
         <li>
      <li><a href="Home.php">Home</a></li>
         </li>
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
               <li><a href="orders.php">Purchased/Used Items</a></li>
               <li class="active"><a href="invoices.php">Invoices</a></li>
            </ul>
         </li>
         <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Items Inventory
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li><a href="EnterItems.php">Entry</a></li>
               <li><a href="DisplayChange-Inventory.php">Change/Display Inventory</a></li>
            </ul>
         </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li><a href="Logout.php"><span class="glyphicon glyphicon-share-alt"></span>Logout</a></li>
      </ul>
   </div>
</nav>
<!-- End of Navigation Bar -->

<!-- Opening database connection -->


<?php

?>


   <body>
      <div id="ContainerRSelect">
      <div class="panel panel-default">
      <div class="panel-heading" id="ContainerRSelect" style="margin:0;"><span style="font-size:20px;">Recent Invoices</span></div>
      <!-- end panel DIV -->
      <div id="panel" class="panel-body" style="background-color:White;">
      <div class="row">
         <div class="col-md-4">
		 
		 
<!-- 		 <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script> -->
    	                <label for="">Select invoice</label>
                        <div class="input-group">
                            <select name="invoice" onchange="showUser(this.value)" id="invoice" class="form-control" type="text" list="id" placeholder="Select Number"value="<?php $Date_entered ?>">
                            <span class="input-group-btn">
								<datalist name="id" id="id">&nbsp;<span class="caret"></span>
								<?php
								include("Connect.php");
								$result=mysql_query("SELECT Date_entered FROM orders");
								while ($row = mysql_fetch_array($result)) {
									unset($id);
									$id = $row['Date_entered'];
									echo '<option value="'.$id.'">'.$id.'</option>';
								}
								?>
								</datalist>
                            </span>
							</select>
                        </div>

			
         </div>
         <!-- End 1st column -->
         <!--This button will populate the table below with items in the selected invoice -->
         <div class="col-md-8">
            <h4 style="font-size:18px;">Display Invoice</h4>
            <button type ="button" class=" btn btn-primary" id="elementID" data-toggle="modal" data-target="#myModal">Display</button>
			
			    <a href="javascript:alert('Please be sure to set your printer to Landscape.');window.print();" class="btn btn-success btn-md">
      <span class="glyphicon glyphicon-print"></span> Print Page
    </a>
	
         </div>
		 
         <!-- End 2nd column -->
         <div id="reportHeader">
            <label>
               <h3> Report Date : 01/01/17</h3>
               <!--Date will be loaded in when display is clicked -->
               <h4> Items list</h4>
            </label>
         </div>
      </div>
     <div class="table-responsive">
         <table class="table table-hover table-striped table-bordered listing">
            <thead>
               <tr>
                  <th>Size</th>
                  <th>Item</th>
                  <th>Description</th>
                  <th>Unit </th>
                  <th>Price</th>
                  <th>Usage</th>
                  <th>Item Number </th>
               </tr>
            </thead>
            <tbody>
               <tr>
                <!-- Begin table row -->
                  <td>X(20)</td>
                  <td>X(10)</td>
                  <td>X(35)</td>
                  <td>XXX</td>
                  <td>ZZ9</td>
                  <td>ZZ9</td>
                  <td>ZZZZ9</td>
               </tr>
               <!-- End table row -->
               <tr>
                  <!-- Begin table row -->
                  <td>X(20)</td>
                  <td>X(10)</td>
                  <td>X(35)</td>
                  <td>XXX</td>
                  <td>ZZ9</td>
                  <td>ZZ9</td>
                  <td>ZZZZ9</td>
               </tr>
               <!-- End table row -->							
               <tr>
                  <!-- Begin table row -->
                  <td>X(20)</td>
                  <td>X(10)</td>
                  <td>X(35)</td>
                  <td>XXX</td>
                  <td>ZZ9</td>
                  <td>ZZ9</td>
                  <td>ZZZZ9</td>
               </tr>
               <!-- End table row -->							
            </tbody>
         </table>
      </div>	  



      </div>
   </body>
   <!-- FOOTER -->
   <div class="row" id="footerNav">
   <div class="container col-md-3">
      <legend style="color:white;"> Reports </legend>
      <ul style="list-style-type:none">
         <a href="#">
            <li><a href="INV1000-Reports-Select.php">View Reports</a></li>
         </a>
      </ul>
   </div>
   <div class="container col-md-3">
      <legend style="color:white;"> Orders </legend>
      <ul style="list-style-type:none">
            <li><a href="orders.php">Purchased/Used Items</a></li></li>
            <li><a href="invoices.php">Invoices</a></li></li>
         </a>
      </ul>
   </div>
   <div class="container col-md-3">
      <legend style="color:white;"> Items Inventory </legend>
      <ul style="list-style-type:none">
         <a href="#">
            <li><a href="EnterItems.php">Entry</a></li>
         </a>
         <a href="#">
            <li><a href="DisplayChange-Inventory.php">Change/Display</a></li>
         </a>
      </ul>
   </div>

   <footer class="clear txt-center">
      <center>&copy; Restaurant Inventory | 2017</center>
   </footer>
      <!-- END OF FOOTER -->
</html>