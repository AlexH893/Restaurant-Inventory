<?php
include ("Connect.php");

//$Item_Num = $_POST['Item_Num'];
$Item_Description = $_POST['Item_Description'];
$On_Hand_Qty = $_POST['On_Hand_Qty'];
$Category = $_POST['Category'];

$TableName = "items";

$sql = "INSERT INTO $TableName " . "(Item_Description, On_Hand_Qty, Category) VALUES " . "('$Item_Description','$On_Hand_Qty', '$Category')";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if (!$result)
{
    die('Invalid query: ' . mysqli_error());
}

mysqli_close($con);
?>
