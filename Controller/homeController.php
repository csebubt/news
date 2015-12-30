<?php
class homeController
{
	public $PageTitle;
	
	public function __construct()
	{
		$this->PageTitle = "Home";	
	}
	
	public function Index()
	{
		include_once('View/Home/index.php');
	}
	public function Insert()
	{
		include_once('View/Home/insert.php');
	}
}

?>