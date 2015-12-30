<form method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="Id" value="<?php print $model->Id; ?>" />
Name<br>
<input type="text" name="Name" value="<?php print $model->Name; ?>"/><br>
<br>
Contact<br>
<input type="text" name="Contact" value="<?php print $model->Contact; ?>"/><br>
<br>
Email<br>
<input type="text" name="Email" value="<?php print $model->Email; ?>"/><br>
<br>
Password<br>
<input type="text" name="Password" value=""/><br>
<br>
Type<br>
<input type="text" name="Type" value="<?php print $model->Type; ?>"/><br>
<br>
Address<br>
<textarea name="Address"><?php print $model->Address; ?></textarea><br>
<br>

City<br>
<select name="CityId">
<?php
include_once('Model/city.php');
$ct = new City();
$ct->Id = $model->CityId;
print $ct->SelectList();
?>
</select><br>
<br>
Image<br>
<input type="file"  name="Image" id="image"><?php print $model->Image; ?><br>
<br>
CreateDate<br>
<input type="text" name="CreateDate" id="Date" value="<?php print $model->CreateDate; ?>"/><br>
<br>
CreateIp<br>
<input type="text" name="CreateIp" id="Date" value="<?php print $model->CreateIp; ?>"/><br>
<br>

<input type="submit" name="btnSubmit" value="Submit"/>
</form>