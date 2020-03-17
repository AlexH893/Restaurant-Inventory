<?php
$RequestSignature = md5($_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'].print_r($_POST, true)); //Stops the page from resubmitting when page is reloaded
if ($_SESSION['LastRequest'] == $RequestSignature)
{
	
}
else{
	$_SESSION['LastRequest'] = $RequestSignature;
	if (isset($_POST['Change'])) {
	$FormErrorCount = 0;
	if (isset($_POST['Item_Num'])) {
		$Item_Num = stripslashes($_POST
		['Item_Num']);
		$Item_Num = trim($Item_Num);
		$_SESSION['Item_Num'] = $Item_Num;
		if (strlen($Item_Num) == 0) {
			echo "<p>You must inculde the Number</p>\n";
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
		$_SESSION['Item_Description'] = trim($Item_Description);
		if (strlen($Item_Description) == 0) {
			echo "<p>You must inculde the Description</p>\n";
			++$FormErrorCount;
		}
	}
	else {
		echo "<p>Form submittal error (No 'Item_Description' field)!</p>\n";
		
	}
	
	$_SESSION['On_Hand_Qty'] = $_POST['On_Hand_Qty'];
	if (isset($_POST['Category'])){
        $_SESSION['Category'] = $_POST['Category'];
	}
	$_SESSION['Min_Qty'] = $_POST['Min_Qty'];
	if ($FormErrorCount == 0){
		include("Connect.php");
		$ShowForm = FALSE;

		if ($con !== FALSE){
			$TableName = "items";
			$SQLstring = "UPDATE $TableName SET Item_Description = '{$_SESSION['Item_Description']}', 
			On_Hand_Qty = {$_SESSION['On_Hand_Qty']}, 
			Category = '{$_SESSION['Category']}',
			Min_Qty = '{$_SESSION['Min_Qty']}'
			WHERE Item_Num = {$_SESSION['Item_Num']} ";
	$QueryResult = @mysqli_query($con, $SQLstring);
	if ($QueryResult === FALSE)
		echo "<p> Unable to execute the query.</p>"
		. "<p>Error code " .mysqli_errno($con)
		. ": ". mysqli_error($con) . "</p>";
	else{
		$ItemID = mysqli_insert_id($con);
		echo "<p>Successfully changed the item.</p>";
		}
		mysqli_close($con);
	}
  }
}	
}
?>