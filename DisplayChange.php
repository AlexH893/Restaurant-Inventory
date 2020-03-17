<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restaurant Inventory System</title>
	<link href="css/style.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="styles">
	<link href="css/style.css" rel="stylesheet">
  </head>
  <script type="text/javascript">
 var index1 = 0;
 var index2 = 0;
</script>


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
		  <li><a href="INV1000-Reports-Select.php">View Reports</a></li>
		</ul>
		</li>
		  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li><a href="orders.php">Make An Order</a></li>
          <li><a href="invoices.php">Invoices</a></li>
		</ul>
		</li>
		  <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Items Inventory
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li><a href="EnterItems.php">Entry</a></li>
          <li class="active"><a href="DisplayChange.php">Change/Display</a></li>
		</ul>
		</li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
    </ul>
	
	    <ul class="nav navbar-nav navbar-right">
              <li><a href="Logout.php">Logout</a></li>
    </ul>
	
  </div>
</nav>
<body>
	<div id="containerRSelect">
		<div class="panel panel-default">
	 	<form action="DisplayChange.php?go" method="post">
    	    <fieldset>
			<legend><h2>Change/Display Inventory</h2> 
			<h4> Search for an item, and then fill out corresponding fields you wish to be changed.</h4></legend>
			
			<div class="row">
					<div class="col-sm-2">
    	                <label for="">Item Description</label>
                        <div class="input-group">
                            <input name="Item_Description" id="Item_Description" class="form-control" type="text" list="description" placeholder="Search an Item"  value="<?php $Item_Description?>">
                                <datalist name="description" id="description">&nbsp;<span class="caret"></span>
								<?php
								include("Connect.php");
								$result=mysqli_query("SELECT DISTINCT Item_Description FROM items");
								while ($row = mysqli_fetch_array($result)) {
									unset($description);
									$description = $row['Item_Description'];
									echo '<option value="'.$description.'">'.$description.'</option>';
								}
								?>
								</datalist>
                        </div>
    	            </div>
    	            <div class="col-sm-2">
					<div class="row">
    	                <label for="">Search by Date</label>
                        <div class="input-group">
						<div class="col-xs-6">
                            <input name="Year" id="Year" class="form-control" type="text" placeholder="Year" value="<?php $Year?>">
                            </div>
							<div class="col-xs-6">
							<input name="Month" id="Month" class="form-control" type="text" placeholder="Month" value="<?php $Month?>">
                            </div>
                        </div>
						</div>
    	            </div>
					<div class="col-sm-4">
    	                <label for="Category">Category:</label>
    	                <div class="input-group">
    	                    <div class="checkbox">
                                <label><input type="checkbox" name="Category[]" id="Category[]" value="Food" /> Food</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="Category[]" id="Category[]" value="Drinks" /> Drinks</label>
                            </div>
							<div class="checkbox">
                                <label><input type="checkbox" name="Category[]" id="Category[]" value="Misc" /> Misc</label>
                            </div>
    	                </div>
    	            </div>
				</div>
			</br>
			<div class="padding" style="padding-left:20px">
					<button type = "submit" name="submit" class="btn btn-primary">Search</button>
					</div>
			</form>
			<div id="containerRSelect">
		<div class="panel panel-default">
        <div class="row" style="width:75%; padding-left:25px;">
            <h2>Searched Inventory</h2>
			<table class="table table-bordered table-striped">
                 <tr>
                    <th>Item Number</th>
                    <th>Item Description</th>
                    <th>Category</th>
                    <th>On-Hand</th>
                    <th>Min Qty</th>
					<th>Date</th>
                </tr>
	<?php 
	  if(isset($_POST['submit'])){ 
	  $clause = " WHERE ";//Initial clause
	  if(isset($_GET['go'])){ 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['Item_Description'])){ 
	  $Item_Description=$_POST['Item_Description']; 
	  } 
	  $Year=$_POST['Year']; 
	  $Month=$_POST['Month'];
	  if($Month < 10){
		  $Month = "0$Month";
	  }
	  include("Connect.php");
	  $sql="SELECT * FROM items ";   //Query stub
    if(isset($_POST['Category'])){
        foreach($_POST['Category'] as $c){
            if(!empty($c)){
                $sql .= $clause." Category LIKE '%{$c}%'";
                $clause = " OR ";//Change  to OR after 1st WHERE
            }   
        }
    }
	if(!empty($c) && !empty($Item_Description) && !empty($Year) && !empty($Month)){
			$sql .= " AND Item_Description LIKE '%{$Item_Description}%' AND Date_entered LIKE '%{$Year}-%' AND Date_entered LIKE '%-{$Month}-%'";
	}
	else if(!empty($c) && !empty($Item_Description)){
			$sql .= " AND Item_Description LIKE '%{$Item_Description}%'";
	}
	else if(!empty($c) && !empty($Year) && !empty($Month)){
			$sql .= " AND Date_entered LIKE '%{$Year}%'-'%{$Month}%'";
	}
	else if(!empty($Item_Description) && !empty($Year) && !empty($Month)){
			$sql= "SELECT * FROM items WHERE Item_Description LIKE '%".$Item_Description."%' AND Date_entered LIKE '%{$Year}-%' AND Date_entered LIKE '%-{$Month}-%'"; 
	}
	else if(!empty($Year) && !empty($Month)){
			$sql= "SELECT * FROM items WHERE Date_entered LIKE '%{$Year}-%' AND Date_entered LIKE '%-{$Month}-%'"; 
	}
	else if(!empty($Year)){
			$sql= "SELECT * FROM items WHERE Date_entered LIKE '%{$Year}-%'"; 
	}
	else if(!empty($Month)){
			$sql= "SELECT * FROM items WHERE Date_entered LIKE '%-{$Month}-%'"; 
	}
	else if (!empty($Item_Description)){
		$sql="SELECT * FROM items WHERE Item_Description LIKE '%" . $Item_Description .  "%'"; 
	}
	  //-query  the database table 
	 // $sql="SELECT * FROM $TableName WHERE Item_Description LIKE '%" . $Item_Description .  "%'"; 
	  //-run  the query against the mysql query function 
	  $result=mysqli_query($con, $sql); 
	  //-create  while loop and loop through result set   
	  while ($row = mysqli_fetch_assoc($result)) {
		  if($row["On_Hand_Qty"] < $row["Min_Qty"]){
		echo "<tr style='background-color:#F9E79F;'>";
		echo "<td>" . $row["Item_Num"]. "</td>";
		echo "<td> " . $row["Item_Description"]. "</td>";
		echo "<td>" .  $row["Category"]. "</td>";
		echo "<td>" . $row["On_Hand_Qty"]. "</td>";
		echo "<td>" . $row["Min_Qty"]. "</td>";
		echo "<td>" . $row["Date_entered"]."</td>";
	}
	else {
    echo "<tr>";
	echo "<td>" . $row["Item_Num"]. "</td>";
	echo "<td>" . $row["Item_Description"]. "</td>";
	echo "<td>" . $row["Category"]. "</td>";
	echo "<td>" . $row["On_Hand_Qty"]. "</td>";
	echo "<td>" . $row["Min_Qty"]. "</td>";
	echo "<td>" . $row["Date_entered"]."</tr>";
	echo "</td>";
	}
	}
mysqli_free_result($result); 
	  } 
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	  } 
	  
				?>
                </tr>
            </table>
        </div>
    </div>
	</div>
	<br>
	
	<br>
	<form action="DisplayChange.php?go" method="post" >
		<div class="row">
				<div class="col-sm-2">
    	                <label for="">Item Number</label>
                        <div class="input-group">
                           <input name="Item_Num" id="Item_Num" class="form-control" type="text" placeholder="Enter new item num" value="<?php $Item_Num?>">
                        </div>
    	            </div>
			
		

    	
					
    	            <div class="col-sm-4">
    	                <label for="">Item Description:</label>
                        <div class="input-group">
                            <input name="Item_Description" id="Item_Description" class="form-control" type="text" placeholder="Enter new description" value="<?php $Item_Description?>">
                        </div>
    	            </div>  
		

	
	                <div class="col-sm-3">
    	                <label for="onHand">On-Hand Quantity</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button onclick="index1 = index1 - 1;document.getElementById('On_Hand_Qty').value = index1;" id="OnHandButton-" type="button" class="btn btn-default">-</button>
                            </span>
                            <input name="On_Hand_Qty" id="On_Hand_Qty" class="form-control" type="text" value="<?php $On_Hand_Qty?> 0" style="text-align: center;">
                            <span class="input-group-btn">
                                <button onclick="index1 = index1 + 1;document.getElementById('On_Hand_Qty').value = index1;" id="OnHandButton+" type="button" class="btn btn-default">+</button>
                            </span>
                        </div>
	                </div>

	                <div class="col-sm-3">
    	                <a href="#" data-toggle="tooltip" title="Test">Minimum Quantity</a>

                         <div class="input-group">
                            <span class="input-group-btn">
                                <button onclick="index2 = index2 - 1;document.getElementById('Min_Qty').value = index2;" id="MinQty-" type="button" class="btn btn-default">-</button>
                            </span>
                            <input name="Min_Qty" id="Min_Qty" class="form-control" type="text"  value="<?php $Min_Qty?> 0" style="text-align: center;">
                            <span class="input-group-btn">
                                <button onclick="index2 = index2 + 1;document.getElementById('Min_Qty').value = index2;" id="MinQty+" type="button" class="btn btn-default">+</button>
                            </span>
                        </div>
	                </div>
		
	                <div class="col-sm-3">
    	                <label for="category">Category:</label>
    	                <div class="input-group">
    	                    <div class="radio">
                                <label><input type="radio" name="Category" id="Category" checked="checked"  value="Food" /> Food</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Category" id="Category" value="Drinks" /> Drinks</label>
                            </div>
							<div class="radio">
                                <label><input type="radio" name="Category" id="Category" value="Misc" /> Misc</label>
                            </div>
    	                </div>
    	           </div>
				   			</div>
				   				   </div>
				   	 </div> <!-- End of row div -->
	            </div> <!-- End of forms, beginning of buttons-->
				
				
				
  
				
				
				
				<div class="row" style="padding-left: 22px;">
	                <button type = "submit" name="Change" class="btn btn-primary">Change</button>
	                <button type = "submit" name="Delete" class="btn btn-danger">Delete</button>
	            </div>
            </fieldset>
        </form>
		
		
      <div class="row" style="width:75%; padding-left:25px;">
            <h2>Current Inventory</h2>
			<table class="table table-bordered table-striped">
                 <tr>
                    <th>Item Number</th>
                    <th>Item Description</th>
                    <th>Category</th>
                    <th>On-Hand</th>
                    <th>Min Qty</th>
					<th>Date</th>
                </tr>
			<?php
include("Connect.php");
include("displayItems.php");
?>
                </tr>
            </table>
        </div>						
		
		
		<?php
		// This is the update 
include("changeItem.php");	//change works	
//delete works
if (isset($_POST['Delete'])) {
	$FormErrorCount = 0;
	if (isset($_POST['Item_Num'])) {
		$Item_Num = stripslashes($_POST
		['Item_Num']);
		$Item_Num = trim($Item_Num);
		$_SESSION['Item_Num'] = $Item_Num;
		if (strlen($Item_Num) == 0) {
			echo "<p>You must include the Number</p>\n";
			++$FormErrorCount;
		}
	}
	else {
		echo "<p>Form submittal error (No 
		'Item_Num' field)!</p>\n";
	}
	if ($FormErrorCount == 0){
		include("Connect.php");
		$ShowForm = FALSE;
		//$space = " WHERE";
		if ($con !== FALSE){
			$TableName = "items";
			$SQLstring = "DELETE FROM items WHERE Item_Num = {$_SESSION['Item_Num']}";
	$QueryResult = @mysqli_query($con, $SQLstring);
	if ($QueryResult === FALSE)
		echo "<p> Unable to execute the query.</p>"
		. "<p>Error code " .mysqli_errno($con)
		. ": ". mysqli_error($con) . "</p>";
	else{
		$ItemID = mysqli_insert_id($con);
		echo "<p>Successfully deleted the item.</p>";
		}
		mysqli_close($con);
	}
  }
}
//}
?>
		</div>
	</div>
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
            <li><a href="orders.php">Make An Order</a></li></li>
				<a href="invoices.php"><li> Invoices</li></a>
			</ul>
	</div>
	<div class="container col-md-3">
		<legend style="color:white;"> Items Inventory </legend>
			<ul style="list-style-type:none">
				<a href="EnterItems.php"><li> Entry</li></a>
				<a href="DisplayChange.php"><li>Change/Display Inventory</li></a>
			</ul>
	</div>

	<footer class="clear txt-center">
<center>&copy; Restaurant Inventory | 2018</center>
</footer>


</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
//$(document).ready(function() {
//	$('[data-toggle="tooltip"]').tooltip();
//});

</script>
</html>