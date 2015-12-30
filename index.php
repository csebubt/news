<?php
session_start();
define("baseurl", "http://localhost/newspaper/");
$controller = "home";
$view = "Index";
$param1 = null;
$model = null;
$message = "";

include_once('Model/base.php');

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

if(strtolower($view) == "logout")
{
	unset($_SESSION['username']);
		unset($_SESSION['usertype']);
		unset($_SESSION['userid']);	
}

		if(isset($_POST['btnLogin']))
		{
			include_once('Model/user.php');
			$model = new User;
			$model->Email = $_POST['Email'];
			$model->Password = $_POST['Password'];
			if($model->Login())
			{
				$_SESSION['username'] = $model->Name;
				$_SESSION['usertype'] = $model->Type;
				$_SESSION['userid'] = $model->Id;
				include_once('Model/loginhistoty.php');
				$lh = new Loginhistory();
				$lh->UserId = $model->Id;
				if(!$lh->Insert())
				{
					
				}
			}
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Twitter Bootstrap 3 Dropdowns within a Navbar</title>
<link rel="stylesheet" type="text/css" href="<?php print baseurl; ?>Styles/style2/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php print baseurl; ?>Styles/style2/bootstrap/css/bootstrap-theme.min.css">
<script src="<?php print baseurl; ?>Styles/style2/js/jquery.mim.js"></script>
<script src="<?php print baseurl; ?>Styles/style2/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php print baseurl; ?>Styles/style2/style.css">
<link rel="stylesheet" type="text/css" href="<?php print baseurl; ?>Styles/style2/bjqs.css">
<script src="<?php print baseurl; ?>Styles/style2/js/bjqs-1.3.min.js"></script>
<style type="text/css">
.bs-example {
	margin: 20px;
}
</style>
</head>
<body>
<div class="container">
	<div class="row">
    	<div class="col-spn-12 admin_menu padlr">
        <?php
		partialView("adminmenu");
	    ?>
        </div>
    </div>
  <div class="bs-example">
    <nav id="myNavbar" class="navbar navbar-default" role="navigation">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <?php
		partialView("usermenu");
	    ?>
      	<!--user menu-->
      	
     </div>
      
    </nav>
  </div>
    
</div>
 <div class="container  third_color pading padlr">
  <h2><?php print $obj->PageTitle; ?></h2>

    <?php
		$obj->$view();
	?>
  </div>



<div  class="container">
	<div class="row">
	<div class="col-lg-4">
    	<h2><a href="#" style="color:#36C;" > bdnewwsonline.com</a></h2>
    </div>
    <div class="col-lg-8" style="margin-top:50px;">
    	<h4>
        	<span><a href="#">Privacty &amp; pospancy</a></span> |
        	<span><a href="#">About us</a></span> |
        	<span><a href="#">Contact us</a></span> |
        	<span><a href="#">Advertisement</a></span> |
        	<span><a href="#">Subscription</a></span>
        </h4>
    </div>
    </div>
</div>
</div>
<script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });

        });
      </script>
</body>
</html>
<?php

function partialView($v)
{
	include_once('View/Shared/'.$v.'.php');
}


?>