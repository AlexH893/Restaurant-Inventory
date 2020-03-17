<?php session_start(); ?>
<!DOCTYPE html>
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
  <script src="submit.js"></script>
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
        <li><a href="Home.php">Home</a>
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
            <li><a href="orders.php">Make An Order</a>
            </li>
            <li><a href="invoices.php">Invoices</a>
            </li>
          </ul>
        </li>
        <li class="dropdown active"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Items Inventory
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="EnterItems.php">Entry</a>
            </li>
            <li><a href="DisplayChange.php">Change/Display</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right"></ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <body>
    <div id="ContainerRSelect">
      <div class="panel panel-default">
        <form id="form1" name="form">
          <fieldset>
            <legend>
              <h2>Add Item</h2>
              <h5>Keep track of your inventory by entering items in on this page</h5>
            </legend>
            <div class="row">
              <div class="col-sm-3"></div>
            </div>
            <div class="col-sm-3">
              <label for="">Item Description:</label>
              <div class="input-group">
                <input name="Item_Description" id="Item_Description" class="form-control" type="text" list="description" placeholder="Select or enter an Item" value="<?php $Item_Description; ?>">
                <datalist name="description" id="description">&nbsp;<span class="caret"></span>
                  <?php //include( "Connect.php"); //$sql="SELECT DISTINCT Item_Description FROM items" ; //$result=m ysqli_query($con, $sql); //while ($row=m ysqli_fetch_array($result)) { // unset($description); // $description=$ row[ 'Item_Description']; // echo '<option value=' . $description . '>' . $description . '</option>'; } ?>
                </datalist>
              </div>
            </div>
            <div class="col-sm-4">
              <label for="Category">Category:</label>
              <div class="input-group">
                <div class="radio">
                  <label>
                    <input type="radio" name="Category" id="Category" checked="checked" value="Food" />Food</label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="Category" id="Category" value="Drinks" />Drinks</label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="Category" id="Category" value="Misc" />Misc</label>
                </div>
              </div>
            </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <label for="onHand">On-Hand Quantity</label>
          <div class="input-group">
            <input name="On_Hand_Qty" id="On_Hand_Qty" class="form-control" type="text" value="<?php
$On_Hand_Qty;
?> 0" style="text-align: center;">
          </div>
        </div>
      </div>
      <br />
      <div class="row" style="padding-left: 22px;">
        <input id="submit" type="button" value="Submit">
        <button type="reset" class="btn">Clear</button>
      </div>
      <img id="loading" src="images/3.gif" style="display:none" />
      <!-- Loading Image -->
    </div>
</div>
</form>
<?php //include( "itemEntry.php"); ?>
<div id="ContainerRSelect">
  <div class="panel panel-default">
    <div class="row" style="width:75%; padding-left:25px;">
      <h2>Current Inventory</h2>
      <table class="table table-bordered table-striped">
        <tr>
          <th>Item Number</th>
          <th>Item Description</th>
          <th>Category</th>
          <th>On-Hand</th>
          <th>Date</th>
        </tr>
        <?php include( "Connect.php"); include( "displayItems.php"); ?>
        </tr>
      </table>
    </div>
  </div>
</div>
</fieldset>
</body>
<div class="row" id="footerNav">
  <div class="container col-md-3">
    <legend style="color:white;">Reports</legend>
    <ul style="list-style-type:none">
      <a href="Reports-Select.php">
        <li>View Reports</li>
      </a>
    </ul>
  </div>
  <div class="container col-md-3">
    <legend style="color:white;">Orders</legend>
    <ul style="list-style-type:none">
      <li><a href="orders.php">Make An Order</a>
      </li>
      </li>
      <a href="invoices.php">
        <li>Invoices</li>
      </a>
    </ul>
  </div>
  <div class="container col-md-3">
    <legend style="color:white;">Items Inventory</legend>
    <ul style="list-style-type:none">
      <a href="EnterItems.php">
        <li>Entry</li>
      </a>
      <a href="DisplayChange.php">
        <li>Change/Display Inventory</li>
      </a>
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