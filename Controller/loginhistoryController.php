<?php
class loginhistoryController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "Login History";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/loginhistory.php');
		$model = new Loginhistory;
		include_once('View/loginhistory/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/loginhistory.php');
		$model = new Loginhistory;
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
				print '<span class="success">login Created</span>';
				$model = new Loginhistory;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Loginhistory/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/loginhistory.php');
		$model = new Loginhistory;
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
				print '<span class="success">loginhistory Updated</span>';
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
		include_once('View/Loginhistory/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/loginhistory.php');
		$model = new Loginhistory;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">Loginhistory Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Loginhistory/index.php');
	}
}

?>