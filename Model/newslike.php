<?php
class Newslike
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
		$sql = "insert into newslike(newsid, userId, date ) values
		('".$this->NewsId."', '".$this->UserId."','".date("Y-m-d")."')";
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
		$sql = "select * from newslike where id = ".$this->Id;
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
	
	public function Check()
	{
		$sql = "select * from newslike where userid = ".$this->UserId." and newsid = ".$this->NewsId;
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
		$sql = "select * from newslike";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			 
			$lk =new Newslike();
			
			$lk->Id = $s[0];
			$lk->NewsId = $s[1];
			$lk->UserId = $s[2];
			$lk->Date = $s[3];
			
			include_once("Model/news.php");
			$lk->News = new News();
			$lk->News->Id = $lk->NewsId;
			$lk->News->SelectById();
			
			include_once("Model/User.php");
			$lk->User = new User();
			$lk->User->Id = $lk->UserId;
			$lk->User->SelectById();
		
			$a[] = $lk;	
		}
		return $a;
	}
	
}

?>