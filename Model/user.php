<?php
class User
{
	public $cn;
	public $Id;
	public $Name;
	public $Contact;
	public $Email;
	public $Password;
	public $Type;
	public $Address;
	public $CityId;
	public $Image;
	public $CreateDate;
	public $CreateIp;
	public $Error;
	
	public $City;
	
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');
		$this->City = null;	
	}
	
	public function Insert()
	{
		$sql = "insert into user(name, contact, email, password, type, address, cityid, image, createDate, createIP) values('".$this->Name."', '".$this->Contact."', '".$this->Email."', password('".$this->Password."'), '".$this->Type."', '".$this->Address."', ".$this->CityId.", '".$this->Image."', '".date("Y-m-d")."', '".$_SERVER['REMOTE_ADDR']."')";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		$sql = "update user set name = '".$this->Name."',
		contact= '".$this->Contact."',
		email= '".$this->Email."',
		password= '".$this->Password."', 
		type= '".$this->Type."', 
		address= '".$this->Address."', 
		cityId= ".$this->CityId." ";
		if($this->Image != ""){
		$sql .= ", Image= '".$this->Image."'";
		}
		$sql .= " where id = ".$this->Id;
		
		
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Delete()
	{
		$sql = "delete from user where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select * from user where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->Name = $s[1];
			$this->Contact = $s[2];
			$this->Email = $s[3];
			$this->Password= $s[4];
			$this->Type = $s[5];
			$this->Address = $s[6];
			$this->CityId = $s[7];
			$this->Image = $s[8];
			$this->CreateDate = $s[9];
			$this->CreateIp = $s[10];
			
			include_once("Model/city.php");
			$this->City = new City();
			$this->City->Id = $this->CityId;
			$this->City->SelectById();
			
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from user ";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$usr = new User();
			$usr->Id = $s[0];
			$usr->Name = $s[1];
			$usr->Contact = $s[2];
			$usr->Email = $s[3];
			$usr->Password= $s[4];
			$usr->Type = $s[5];
			$usr->Address = $s[6];
			$usr->CityId = $s[7];
			
			$usr->Image = $s[8];
			$usr->CreateDate = $s[9];
			
			$usr->CreateIp = $s[10];
			
			include_once("Model/city.php");
			$usr->City = new City();
			$usr->City->Id = $usr->CityId;
			$usr->City->SelectById();

			
			
			$a[] = $usr;
		}
		return $a;
	}
	
	public function SelectList()
	{
		$o = '<option value="0">Select</option>';
		$sql = "select * from user";
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
	
	public function Login()
	{
		$sql = "select * from user where email = '".$this->Email."' and password = password('".$this->Password."')";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->Id = $s[0];
			$this->Name = $s[1];
			$this->Contact = $s[2];
			$this->Email = $s[3];
			$this->Password= $s[4];
			$this->Type = $s[5];
			$this->Address = $s[6];
			$this->CityId = $s[7];
			$this->Image = $s[8];
			$this->CreateDate = $s[9];
			$this->CreateIp = $s[10];
			
			include_once("Model/city.php");
			$this->City = new City();
			$this->City->Id = $this->CityId;
			$this->City->SelectById();
			
			return true;	
		}
		$this->Error = "<b>Invalid Login</b><br>".mysqli_error($this->cn);
		return false;
	}
}

?>