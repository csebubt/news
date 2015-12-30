<?php
class newslikeController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "Newslike";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/newslike.php');
		$model = new Newslike;
		include_once('View/Newslike/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/newslike.php');
		$model = new Newslike;
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
				print '<span class="success">Newslike Created</span>';
				$model = new Newslike;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Newslike/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/newslike.php');
		$model = new Newslike;
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
				print '<span class="success">Newslike Updated</span>';
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
		include_once('View/Newslike/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/newslike.php');
		$model = new Newslike;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">Newslike Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Newslike/index.php');
	}
}

?>