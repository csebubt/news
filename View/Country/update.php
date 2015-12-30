<?php
//var_dump($obj);
//print '<hr>';
// var_dump($model);
?>
<form method="post" action="">
<input type="hidden" name="Id" value="<?php print $model->Id; ?>" />
Name<br>
<input type="text" name="Name" value="<?php print $model->Name; ?>"/><br>
<br>
<input type="submit" name="btnSubmit" value="Submit"/>
</form>