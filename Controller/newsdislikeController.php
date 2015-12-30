<?php
class newsdislikeController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "newsdislike";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/newsdislike.php');
		$model = new Newsdislike;
		include_once('View/Newsdislike/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/newsdislike.php');
		$model = new Newsdislike;
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
				print '<span class="success">Newsdislike Created</span>';
				$model = new Newsdislike;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Newsdislike/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/newsdislike.php');
		$model = new Newsdislike;
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
				print '<span class="success">Newsdislike Updated</span>';
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
		include_once('View/Newsdislike/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/newsdislike.php');
		$model = new Newsdislike;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">Newsdislike Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Newsdislike/index.php');
	}
}

?>