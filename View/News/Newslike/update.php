<form method="post" action="">

<input type="hidden" name="Id" value="<?php print $model->Id; ?>" />

News Name<br>
<select name="NewsId">
<?php
include_once('Model/News.php');
$Nws = new News();
$Nws->Id = $model->NewsId;
print $Nws->SelectList();
?>
</select>
<br>

User Name<br>
<select name="UserId">
<?php
include_once('Model/user.php');
$usr = new User();
$usr->Id = $model->UserId;
print $usr->SelectList();
?>
</select><br>
<br>
Date<br>
<input type="text" name="Date" id="Date" value="<?php print $model->Date; ?>"/><br>
<br>

<input type="submit" name="btnSubmit" value="Submit"/>
</form>