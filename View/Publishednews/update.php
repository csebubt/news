
<form method="post" action="">
<input type="hidden" name="Id" value="<?php print $model->Id; ?>" />
News<br>
<textarea name="News" id="editor"><?php print $model->News; ?></textarea><br>
<br>
Publisher<br>
<select name="PublisherId">
<?php
include_once('Model/user.php');
$usr = new User();
$usr->Id = $model->PublisherId;
print $usr->SelectUnpublishedList();
?>
</select><br>
<br>
DateTime<br>
<input type="text" name="DateTime" id="Date" value="<?php print $model->DateTime; ?>"/><br>
<br>



<input type="submit" name="btnSubmit" value="Submit"/>
</form>