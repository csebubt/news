<form method="post" action="">
News<br>

<select name="NewsId">
<?php
include_once('Model/news.php');
$nws = new News();
$nws->Id = $model->NewsId;
print $nws->SelectUnpublishedList();
?>
</select><br><br>
<input type="hidden" name="PublisherId" value="<?php print $_SESSION['userid'];?>"
DateTime<br>
<input type="text" name="Date" id="Date" value="<?php print $model->Date; ?>"/><br>
<br>



<input type="submit" name="btnSubmit" value="Submit"/>
</form>