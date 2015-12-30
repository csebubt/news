<?php
class Usertype
{
	public $cn;
	public $Id;
	public $Name;
	public $Description;
	public $Error;
	

	
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');
	
	}
	
	public function Insert()
	{
		$sql = "insert into usertype(name, description) values('".$this->Name."', '".$this->Description."')";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		$sql = "update usertype set name = '".$this->Name."',
		description= '".$this->Description."' 
		where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Delete()
	{
		$sql = "delete from usertype where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select * from usertype where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->Name = $s[1];
			$this->Description = $s[2];
			
			
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from usertype ";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$usr = new User();
			$usr->Id = $s[0];
			$usr->Name = $s[1];
			$usr->Description = $s[2];
		
			
			
			$a[] = $usr;
		}
		return $a;
	}
	
	
}

?>