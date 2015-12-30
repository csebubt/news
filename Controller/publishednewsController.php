<?php
class publishednewsController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "publishednews";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/publishednews.php');
		$model = new Publishednews;
		include_once('View/Publishednews/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/publishednews.php');
		$model = new Publishednews;
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
				print '<span class="success">Publishednews Created</span>';
				$model = new Publishednews;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Publishednews/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/publishednews.php');
		$model = new Publishednews;
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
				print '<span class="success">Publishednews Updated</span>';
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
		include_once('View/Publishednews/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/publishednews.php');
		$model = new Publishednews;
		$model->NewsId = $param1;
		if($model->Delete())
		{
			print '<span class="success">Publishednews Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Publishednews/index.php');
	}
}

?>