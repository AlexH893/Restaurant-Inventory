<?php
$TableName = "items";
$loadsql   = "SELECT * FROM (SELECT * FROM $TableName ORDER BY Date_Entered DESC LIMIT 6
) sub
ORDER BY Date_entered DESC";
$result    = @mysqli_query($con, $loadsql);

if (!$result) {
    echo "DB Error, could not query the database\n";
    //echo 'MySQL Error: ' . mysqli_error();
    exit;
}

while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr> <td>" . $row["Item_Num"] . "</td><td>" . $row["Item_Description"] . "</td><td>" . $row["Category"] . "</td><td>" . $row["On_Hand_Qty"] .  "</td><td>" . $row["Date_entered"] . "</td>";
    }


mysqli_free_result($result);
?>