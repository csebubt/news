<?php
class newscommentsController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "News comments";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/newscomments.php');
		$model = new Newscomments;
		include_once('View/Newscomments/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/newscomments.php');
		$model = new Newscomments;
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
				print '<span class="success">Newscomments Created</span>';
				$model = new Newscomments;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Newscomments/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/newscomments.php');
		$model = new Newscomments;
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
				print '<span class="success">Newscomments Updated</span>';
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
		include_once('View/Newscomments/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/newscomments.php');
		$model = new Newscomments;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">Newscomments Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Newscomments/index.php');
	}
}

?>