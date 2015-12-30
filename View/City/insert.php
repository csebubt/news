<?php
$ename = "";
$ecountry = "";

$er = 0;

if(isset($_POST['btnSubmit']))
{
if($model->Name == "")
{
	$er++;
	$ename = "Required";	
}
if($model->CountryId == "0")
{
	$er++;
	$ecountry = "Select";
}
if($er > 0)
{
	print "Please check for error";	
}	
}

?>
<form method="post" action="">
Name<br>
<input type="text" name="Name" value="<?php print $model->Name; ?>"/><?php print $ename; ?><br>
<br>
Country<br>
<select name="CountryId">
<?php
include_once('Model/country.php');
$cnt = new Country();
$cnt->Id = $model->CountryId;
print $cnt->SelectList();
?>
</select><?php print $ecountry; ?><br>
<br>
<input type="submit" name="btnSubmit" value="Submit"/>
</form>