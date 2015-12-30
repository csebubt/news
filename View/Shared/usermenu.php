   <ul class="nav navbar-nav">
		
          <li><a href="<?php print baseurl; ?>home/">Home</a></li>
          <?php
          include_once('Model/category.php');
		  $ctg = new Category();
		  foreach($ctg->SelectMenu() as $s)
		  {
				print '<li><a href="'.baseurl.'News/Category/'.$s->Id.'">'.$s->Name.'</a>';
				Menu($s->Id);
				print '</li>';  
		  }
		  ?>
 </ul>


<?php

function Menu($pid)
{
	include_once('Model/category.php');
	$ctg = new Category();
	$v = $ctg->SelectMenu($pid);
	if($v != null)
	{
		print '<ul class="dropdown-menu">';
	foreach($v as $s)
	{
		print '<li><a href="'.baseurl.'News/Category/'.$s->Id.'">'.$s->Name.'</a>';
		Menu($s->Id);	
		print '</li>';  
	}
	print '</ul>';
	}
}

?>







