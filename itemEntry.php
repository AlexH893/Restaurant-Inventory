<?php
//
$RequestSignature = md5($_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'] . print_r($_POST, true)); //Stops the page from resubmitting when page is reloaded
if ($_SESSION['LastRequest'] == $RequestSignature) {
    $LastRequest;
} else {
    $_SESSION['LastRequest'] = $RequestSignature;
    if (isset($_POST['Submit'])) {
        //include("Connect.php");
        $FormErrorCount = 0;
        if (isset($_POST['Item_Description'])) {
            $Item_Description = stripslashes($_POST['Item_Description']);
            $_SESSION['Item_Description'] = trim($Item_Description);
            if (strlen($Item_Description) == 0) {
                echo "<p>You must inculde the Description</p>\n";
                ++$FormErrorCount;
            }
        } else {
            echo "<p>Form submittal error (No 'Item_Description' field)!</p>\n";
        }
        $_SESSION['On_Hand_Qty'] = $_POST['On_Hand_Qty'];
        if ($_SESSION['On_Hand_Qty'] < 0) {
            $FormErrorCount++;
            echo "<p>On Hand must be 0 or above</p>\n";
        }
        if (isset($_POST['Category'])) {
            $_SESSION['Category'] = $_POST['Category'];
        }
        $_SESSION['Min_Qty'] = $_POST['Min_Qty'];
        if ($_SESSION['Min_Qty'] < 0) {
            $FormErrorCount++;
            echo "<p>Min Qty must be 0 or above</p>\n";
        }
        $_SESSION['Date'] = date("y-m-d h:i:s");
        if ($FormErrorCount == 0) {
            $ShowForm = FALSE;
            include ("Connect.php");
            if ($con !== FALSE) {
                $TableName = "items";
                $SQLstring = "INSERT INTO $TableName " . "(Item_Description, On_Hand_Qty, Category, Min_Qty,  Date_entered) VALUES " . "('{$_SESSION['Item_Description']}', 
    '{$_SESSION['On_Hand_Qty']}', 
    '{$_SESSION['Category']}', 
    '{$_SESSION['Min_Qty']}',  
    CAST('" . $_SESSION['Date'] . "' AS DATETIME))";
                $QueryResult = mysqli_query($con, $SQLstring);
                if ($QueryResult === FALSE) echo "<p> Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($con) . ": " . mysqli_error($con) . "</p>";
                else {
                    $ItemID = mysqli_insert_id($con);
                    echo "<p>Successfully added the item.</p>";
                }
                mysqli_close($con);
            }
        }
    } else {
        $ShowForm = TRUE;
        $Item_Description = " ";
        $On_Hand_Qty = 0;
        $Category = " ";
        $Min_Qty = 0;
        $Date = " ";
    }
}
?>