<form method="post" action="">

News Name<br>
<select name="NewsId">
<?php
include_once('Model/news.php');
$nws = new News();
$nws->Id = $model->NewsId;
print $nws->SelectList();
?>

</select><br>
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