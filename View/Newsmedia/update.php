<form method="post" action="">
<input type="hidden" name="Id" value="<?php print $model->Id; ?>" />
News Name<br>
<select name="NewsId">
<?php
include_once('Model/news.php');
$nws = new News();
$nws->Id = $model->NewsId;
print $nws->SelectList();
?>
</select><br>
<br>

Link<br>
<input type="text" name="Link" value="<?php print $model->Link;   ?>"><br>
<br>


<input type="submit" name="btnSubmit" value="Submit"/>
</form>