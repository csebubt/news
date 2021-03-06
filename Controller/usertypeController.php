<?php
class usertypeController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "User type";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/usertype.php');
		$model = new Usertype;
		include_once('View/Usertype/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/usertype.php');
		$model = new Usertype;
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
			if($model->Insert())
			{
				print '<span class="success">User type Created</span>';
				$model = new Usertype;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Usertype/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/usertype.php');
		$model = new Usertype;
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
			if($model->Update())
			{
				print '<span class="success">User type Updated</span>';
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
		include_once('View/Usertype/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/usertype.php');
		$model = new Usertype;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">User type Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Usertype/index.php');
	}
}

?>