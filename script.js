
$(document).ready(function(){
$("#submit").click(function(){
var Item_Num = $("#Item_Num").val();
var Item_Description = $("#Item_Description").val();
var Used = $("#Used").val();
var Quantity = $("#Quantity").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'Item_Num1='+ Item_Num + '&Item_Description1='+ Item_Description + '&Used1='+ Used + '&Quantity1='+ Quantity;
if(Item_Num==''||Item_Description==''||Used==''||Quantity=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "ajax.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
return false;
});
});