<form method="post" action="" enctype="multipart/form-data" >
<input type="hidden" name="Id" value="<?php print $model->Id; ?>" />
Name<br>
<input type="text" name="Title" value="<?php print $model->Title; ?>"/><br>
<br>
Author<br>
<select name="AuthorId">
<?php
include_once('Model/user.php');
$usr = new User();
$usr->Id = $model->AuthorId;
print $usr->SelectList();
?>
</select><br>
<br>
DateTime<br>
<input type="text" name="Datetime" id="Date" value="<?php print $model->Datetime; ?>"/><br>
<br>
Category<br>
<select name="CategoryId">
<?php
include_once('Model/category.php');
$ctg = new Category();
$ctg->Id = $model->CategoryId;
print $ctg->SelectList();
?>
</select><br>
<br>Image<br />

<img src="<?php print baseurl.'images/news_images/'.$model->Id.$model->Image; ?>" width="100px" style="margin:3px 0 5px 0;" title="Previous image" alt="Previous image"  /><br />
<input type="file" name="Image" />
<br>
News<br>
<textarea name="News" id="editor"><?php print $model->News; ?></textarea><br>
<br>

<input type="submit" name="btnSubmit" value="Submit"/>
</form>