<form method="post" action="">
<input type="hidden" name="Id" value="<?php print $model->Id; ?>" />
Name<br>
<input type="text" name="Name" value="<?php print $model->Name; ?>"/><br>
<br>
Contact<br>
<input type="text" name="Contact" value="<?php print $model->Description; ?>"/><br>
<br>


<input type="submit" name="btnSubmit" value="Submit"/>
</form>