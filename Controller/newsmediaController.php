<?php
class newsmediaController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "Newsmedia";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/newsmedia.php');
		$model = new Newsmedia;
		include_once('View/Newsmedia/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/newsmedia.php');
		$model = new Newsmedia;
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
				print '<span class="success">Newsmedia Created</span>';
				$model = new Newsmedia;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Newsmedia/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/newsmedia.php');
		$model = new Newsmedia;
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
				print '<span class="success">Newsmedia Updated</span>';
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
		include_once('View/Newsmedia/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/newsmedia.php');
		$model = new Newsmedia;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">Newsmedia Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Newsmedia/index.php');
	}
}

?>