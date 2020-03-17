<!--  
	Creator : Jeremy Burns-Christon
	Date : 1/2/2017
	
	READ
	Sidenote : Possible replace of current table using a data table instead??
	
	https://datatables.net/examples/advanced_init/html5-data-attributes.html
	
-->


<html>
<head>
  <title>Reports</title>
   <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="footer.css">
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
         <li class="dropdown active">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li class="active"><a href="Reports-Select.php">View Reports</a></li>
            </ul>
         </li>
         <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li><a href="orders.php">Purchased/Used Items</a></li>
               <li><a href="invoices.php">Invoices</a></li>
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
<body>
<div class="container" style="background: black;">


<div id="ContainerRSelect">
     <div class="panel panel-default">
	 	<div class="panel-heading" id="ContainerRSelect" style="margin:0;"><span style="font-size:30px;">Most Recent Reports</span></div><!-- end panel DIV -->
			<div id="panel" class="panel-body" style="background-color:White;">   
				<div class="row">	  
					<div class="col-md-4">
					<h4> Select report date</h4>
					<select class="selectpicker">
					  <option>12/06/16</option>
					  <option>12/12/16</option>
					  <option>12/18/16</option>
					</select> <!-- In finished product these dates will be pulled and correctly added in order from a DB.. -->
					
					</div><!-- end 1st column -->
					
					<div class="col-md-8">
						<h4>Display report</h4>
						<button type ="button" class=" btn btn-primary" id="elementID" data-toggle="modal" data-target="#myModal"> Display</button>
						
									    <a href="javascript:alert('Please be sure to set your printer to Landscape.');window.print();" class="btn btn-success btn-md">
      <span class="glyphicon glyphicon-print"></span> Print Page
    </a>
	
					</div><!-- end 2nd column -->
					
					<div id="reportHeader">
					<label>
						<h3> Report Date : 12/06/16</h3> <!--In finished product the date while be loaded in when display is clicked. -->
					</label>
					</div>
				</div>
			
					<div class="table-responsive">
					<table class="table table-lisiting table-hover table-striped table-bordered" style="margin-top:0%; margin-bottom:0%;
						font-size:12px;"> 
					 <tr>
						<td>
							Vendor : ExampleVendor3233
						</td>
					</tr>
					</table>
					</div>
					
					
					
					<div class="table-responsive">
					<table class="table table-lisiting table-hover table-striped table-bordered" 
						style="font-size:12px;"> 
					 <tr>
						<td>
							PHONE : 0000-0000-00
						</td>
			
						<td>
							TERMS : 2 CASH /CHECK CODE B
						</td>
						
						<td>
							SALESMAN : JERRY
						</td>
						<td>
							BUYER : TOM
						</td>
						<td>
							CALL DAY: 0000000
						</td>
						<td>
							TIME: 12:03PM
						</td>
						<td>
							DELIVERY DAY: 1 34
						</td>
						
						
					 </tr>
					
					</table>
					
					
					<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered listing">
						<thead>
						  <tr>
							<th>Size </th>
							<th>Description</th>
							<th>Unit</th>
							<th>Price</th>
							<th>Usage </th>
							<th>Quanitity Left </th>
							<th>Item Number </th>
						  </tr>
						</thead>
						<tbody>					 
							<tr>
								<td>10# </td>
								<td>HOLTEN BEEF CNTRY STYL STEAK 3/1</td>
								<td>CSE</td>
								<td>33.78</td>
								<td>1</td>
								<td>99</td>
								<td>01137</td>
							</tr> 
						   
							<tr>
								<td>15# </td>
								<td>INDANA BACON PLATTER STYLE 18/22</td>
								<td>CSE</td>
								<td>46.48</td>
								<td>8</td>
								<td>92</td>
								<td>01191</td>
							</tr> 
							
							<tr>
								<td>60# AVE </td>
								<td>OMAHA BEEF HEREFORD CLOD 1/4</td>
								<td>CSE</td>
								<td>2.24</td>
								<td>1</td>
								<td>99</td>
								<td>01464</td>
							</tr>
							
							<tr>
								<td>70-80#AV</td>
								<td>IBP BEEF RIBEYE LIPSON SEL LGT</td>
								<td>CSE</td>
								<td>6.94</td>
								<td>4</td>
								<td>96</td>
								<td>01508</td>
							</tr>  
							
							<tr>
								<td>2/14#AVE</td>
								<td>HILSHRE BEEF PRIME RIB RARE*SELCT</td>
								<td>CSE</td>
								<td>9.77</td>
								<td>7</td>
								<td>13</td>
								<td>01607</td>
							</tr>  
							
							<tr>
								<td>44# AVE</td>
								<td>SEABRD PORK LOIN BNLS CC ST/OFF</td>
								<td>CSE</td>
								<td>1.59</td>
								<td>1</td>
								<td>29</td>
								<td>01736</td>
							</tr>   													
						</tbody>
					  </table>
					  </div>

					</br>
				
				</div><!-- end table-responsive -->
			</div><!-- end panel heading -->
	</div> <!-- end panel panel -->
  </div> <!-- end ContainerRSelect -->

  
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
          <p>Report will be loaded shortly..</p>
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Continue</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- End of Modal Code -->

</html>