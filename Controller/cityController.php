<?php
class cityController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "city";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/city.php');
		$model = new City;
		include_once('View/City/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/city.php');
		$model = new City;
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
			if($model->Name == "" or $model->CountryId == "0")
			{
					
			}
			else{
			if($model->Insert())
			{
				print '<span class="success">City Created</span>';
				$model = new City;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}}
		}
		include_once('View/City/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/city.php');
		$model = new City;
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
				print '<span class="success">City Updated</span>';
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
		include_once('View/City/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/city.php');
		$model = new City;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">City Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/City/index.php');
	}
}

?>