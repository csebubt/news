<?php
class Loginhistory
{
	public $cn;
	public $Id;
	public $UserId;
	public $Date;
	public $Ip;
	
	public $Error;
	
	public $User;
	
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');
		$this->User = null;	
	}
	
	public function Insert()
	{
		$sql = "insert into loginhistory(userId, date, Ip) values(".$this->UserId.", '".date("Y-m-d")."','".$_SERVER['REMOTE_ADDR']."')";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		$sql = "update loginhistory set userId = '".$this->UserId."'
		
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
		$sql = "delete from loginhistory where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	
	public function SelectById()
	{
		$sql = "select * from loginhistory where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->UserId = $s[1];
			$this->Ip = $s[3];
			
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from loginhistory ";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			
			$log->Id = $s[0];
			$log->UserId = $s[1];
			$log->Date = $s[2];
			$log->Ip = $s[3];
			
			
			
			$a[] = $log;
		}
		return $a;
	}
	
	
}

?>