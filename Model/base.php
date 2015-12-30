<?php
class base
{
public $cn;
public $Error;

public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');	
	}	
}


?>