<?php
//var_dump($obj);
//print '<hr>';
// var_dump($model);
?>
<form method="post" action="">
Name<br>
<input type="text" name="Name" value="<?php print $model->Name; ?>"/><br>
<br>
Category<br>
<select name="CategoryId">
<?php
include_once('Model/category.php');
$cnt = new Category();
$cnt->Id = $model->CategoryId;
print $cnt->SelectList();
?>
</select><br>
<br>
<input type="submit" name="btnSubmit" value="Submit"/>
</form>