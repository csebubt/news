<?php
class userController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "User";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/user.php');
		$model = new User;
		include_once('View/User/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/user.php');
		$model = new User;
		if(isset($_POST['btnSubmit']))
		{
			foreach($_POST as $key=>$value)
			{
				try
				{
					$model->$key = $value;	
				}
				catch(Exception $ex)
				{
					
				}
			}
			$model->Image = $_FILES['Image']['name'];
			
			if($model->Insert())
			{
				if($_FILES['Image']['name'] != "")
				{
					$sp = $_FILES['Image']['tmp_name'];
					$dp = "images/user_images/".$model->Id.$_FILES['Image']['name'];	
					move_uploaded_file($sp, $dp);
				}
				print '<span class="success">User Created</span>';
				$model = new User;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/User/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/user.php');
		$model = new User;
		$model->Id = $param1;
		if(isset($_POST['btnSubmit']))
		{
			foreach($_POST as $key=>$value)
			{
				try
				{
					$model->$key = $value;	
				}
				catch(Exception $ex)
				{
					
				}
			}
			
			$model->Image = $_FILES['Image']['name'];
			
			if($model->Update())
			{
				if($_FILES['Image']['name'] != "")
				{
					$sp = $_FILES['Image']['tmp_name'];
					$dp = "images/user_images/".$model->Id.$_FILES['Image']['name'];	
					move_uploaded_file($sp, $dp);
				}
				print '<span class="success">User Updated</span>';
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		else
		{
			$model->SelectById();	
		}
		include_once('View/User/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/user.php');
		$model = new User;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">User Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/User/index.php');
	}
	
	public function Login()
	{
		global $obj, $model;
		if(isset($_SESSION['usertype']))
		{
			include_once('View/User/loginsuccess.php');
		}
		else
		{
			include_once('View/User/login.php');
		}
	}
	
	public function Logout()
	{
		print '<span class="success">Logout Successfull</span>';
	}
}

?>