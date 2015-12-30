<?php
class City extends  base
{
	
	public $Id;
	public $Name;
	public $CountryId;
	
	
	public $Country;
	
	
	
	public function Insert()
	{
		$sql = "insert into city(name, countryId) values
		('".$this->Name."', ".$this->CountryId.")";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		$sql = "update city set name = '".$this->Name."', 
				countryId = ".$this->CountryId." 
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
		$sql = "delete from city where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select * from city where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->Name = $s[1];
			$this->CountryId = $s[2];
			include_once('Model/country.php');
			$this->Country = new Country;
			$this->Country->Id = $this->CountryId;
			$this->Country->SelectById();
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from city";
		if($this->CountryId > 0)
		{
			$sql .= " where countryId = ".$this->CountryId;	
		}
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$item = new City;
			$item->Id = $s[0];
			$item->Name = $s[1];
			$item->CountryId = $s[2];
			include_once('Model/country.php');
			$item->Country = new Country;
			$item->Country->Id = $item->CountryId;
			$item->Country->SelectById();
			$a[] = $item;	
		}
		return $a;
	}
	
	public function SelectList()
	{
		$o = '<option value="0">Select</option>';
		$sql = "select * from city";
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