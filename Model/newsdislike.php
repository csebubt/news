<?php
class Newsdislike
{
	public $cn;
	public $NewsId;
	public $UserId;
	public $Date;
	public $Error;
	
	public $News;
	public $User;
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');
		$this->News = null;
		$this->User = null;		
	}
	
	public function Insert()
	{
		$sql = "insert into newsdislike(newsid, userId, date ) values
		('".$this->NewsId."', '".$this->UserId."','".date("Y-m-d")."')";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		$sql = "update newsid set newsid = '".$this->NewsId."', 
				userId = ".$this->UserId." 
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
		$sql = "delete from newsdislike where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select * from newsdislike where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->NewsId = $s[1];
			$this->UserId = $s[2];
			$this->Date = $s[3];
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from newsdislike";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$dlk =new Newsdislike();
		
			$dlk->Id = $s[0];
			$dlk->NewsId = $s[1];
			$dlk->UserId = $s[2];
			$dlk->Date = $s[3];
		
			include_once("Model/news.php");
			$dlk->News = new News();
			$dlk->News->Id = $dlk->NewsId;
			$dlk->News->SelectById();
			
			include_once("Model/User.php");
			$dlk->User = new User();
			$dlk->User->Id = $dlk->UserId;
			$dlk->User->SelectById();
			$a[] = $dlk;	
		}
		return $a;
	}
	
}

?>