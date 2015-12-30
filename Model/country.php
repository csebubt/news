<?php
class Country
{
	public $cn;
	public $Id;
	public $Name;
	public $Error;
	
	public $City;
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');
		$this->City = null;	
	}
	
	public function Insert()
	{
		$sql = "insert into country(name) values
		('".$this->Name."')";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		$sql = "update country set name = '".$this->Name."' where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Delete()
	{
		$sql = "delete from country where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	
	public function SelectById()
	{
		$sql = "select * from country where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->Name = $s[1];
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from country ";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$cnt = new Country();
			$cnt->Id = $s[0];
			$cnt->Name = $s[1];
			$a[] = $cnt;
		}
		return $a;
	}
	
	public function SelectList()
	{
		$o = '<option value="0">Select</option>';
		$sql = "select * from country";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			if($this->Id == $s[0])
			{
				$o .= '<option value="'.$s[0].'" selected>'.$s[1].'</option>';
			}
			else
			{
				$o .= '<option value="'.$s[0].'">'.$s[1].'</option>';
			}
		}
		return $o;
	}
	
}

?>