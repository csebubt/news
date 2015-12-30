<?php
class newsController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "News";	
	}
	
	public function Index()
	{
		global $obj, $model;
		include_once('Model/news.php');
		$model = new News;
		include_once('View/News/index.php');
	}
	
	public function Category()
	{
		global $obj, $model, $param1;
		include_once('Model/news.php');
		$model = new News;
		include_once('View/News/category.php');
	}
	public function singleNews()
	{
		global $obj, $model, $param1;
		include_once('Model/news.php');
		$model = new News;
		$model->Id = $param1;
		$model->SelectById();
		include_once('View/News/singleNews.php');
	}
	public function Insert()
	{
		global $obj, $model;
		include_once('Model/news.php');
		$model = new News;
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
			$model->Image = $_FILES['Image']['name'];
			
			if($model->Insert())
			{
				if($_FILES['Image']['name'] != "")
				{
					$sp = $_FILES['Image']['tmp_name'];
					$dp = "images/news_images/".$model->Id.$_FILES['Image']['name'];	
					move_uploaded_file($sp, $dp);
				}
				print '<span class="success">News Created</span>';
				$model = new News;
			}
			else
			{
				print '<span class="error">'.$model->Error.'</span>';	
			}
		}
		include_once('View/News/insert.php');
	}
	
	public function Update()
	{
		global $obj, $model, $param1;
		include_once('Model/news.php');
		$model = new News;
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
			$model->Image = $_FILES['Image']['name'];
			if($model->Update())
			{
				if($_FILES['Image']['name'] != "")
				{
					$sp = $_FILES['Image']['tmp_name'];
					$dp = "images/news_images/".$model->Id.$_FILES['Image']['name'];	
					move_uploaded_file($sp, $dp);
				}
				print '<span class="success">News Updated</span>';
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
		include_once('View/News/update.php');
	}
	public function Delete()
	{
		global $obj, $model, $param1;
		include_once('Model/news.php');
		$model = new News;
		$model->Id = $param1;
		if($model->Delete())
		{
			print '<span class="success">News Updated</span>';
		}
		else
		{
			print '<span class="error">'.$model->Error.'</span>';	
		}
		include_once('View/News/index.php');
	}
}

?>