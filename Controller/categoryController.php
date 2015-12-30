<?php
class categoryController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "category";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/category.php');
		$model = new Category;
		include_once('View/Category/index.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/category.php');
		$model = new Category;
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
				print '<span class="success">Category Created</span>';
				$model = new Category;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/Category/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/category.php');
		$model = new Category;
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
				print '<span class="success">Category Updated</span>';
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
		include_once('View/Category/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/category.php');
		$model = new Category;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">Category Deleted</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/Category/index.php');
	}
}

?>