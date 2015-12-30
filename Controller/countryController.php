<?php
class countryController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "country";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/country.php');
		$model = new Country;
		include_once('View/Country/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/country.php');
		$model = new Country;
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
				print '<span class="success">Country Created</span>';
				$model = new Country;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Country/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/country.php');
		$model = new Country;
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
				print '<span class="success">Country Updated</span>';
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
		include_once('View/Country/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/country.php');
		$model = new Country;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">Country Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Country/index.php');
	}
}

?>