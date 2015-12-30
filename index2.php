<?php
define("baseurl", "http://localhost/newspaper/");
$controller = "home";
$view = "Index";
$param1 = null;
$model = null;
$message = "";

if(isset($_GET['url']))
{
	$a = explode("/", $_GET['url']);
	if(isset($a[0]) and $a[0] != "")
	{
		if(file_exists("Controller/".strip_tags($a[0])."Controller.php"))
		{	
			$controller = $a[0];
			if(file_exists("View/".$controller."/".strip_tags($a[1]).".php"))
			{
				$view = $a[1];
				if(isset($a[2]) and $a[2] != "")
				{
					$param1 = $a[2];
				}
			}
			else
			{
				$message = "Invalid Page Request ".htmlentities($a[1]);	
			}
		}
		else
		{
			$message = "Invalid Request ".htmlentities($a[0]);	
		}
	}
}
$controllerPath = $controller."Controller";
include_once('Controller/'.$controllerPath.'.php');
$obj = new $controllerPath;

?>
<link rel="stylesheet" type="text/css" href="http://localhost/MVC_04/Styles/style.css">
<div> Header Here</div>
<div>
<?php
partialView("adminmenu");
?>
</div>
<div class="mainbody" >
<h2><?php print $obj->PageTitle; ?></h2><hr><br>
<?php
$obj->$view();
?>
</div>
<div>footer</div>
<?php

function partialView($v)
{
	include_once('View/Shared/'.$v.'.php');
}


?>