<?php
class Publishednews
{
	public $cn;
	public $NewsId;
	public $PublisherId;
	public $Date;
	public $Error;
	
	public $News;
	public $Publisher;
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');
		$this->News = null;	
		$this->Publisher = null;
	}
	public function Insert()
	{
		$sql = "insert into publishednews(NewsId, PublisherId, Date) values
		(".$this->NewsId.", ".$this->PublisherId.", '".date("Y-m-d")."')";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	
	public function Delete()
	{
		$sql = "delete from publishednews where NewsId = ".$this->NewsId;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select * from publishednews where NewsId = ".$this->NewsId;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->PublisherId = $s[1];
			$this->Date = $s[2];
			
			include_once('Model/user.php');
			$this->Publisher = new user;
			$this->Publisher->Id = $this->PublisherId;
			$this->Publisher->SelectById();
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from publishednews";
		if($this->PublisherId > 0)
		{
			$sql .= " where PublisherId = ".$this->PublisherId;	
		}
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$item = new publishednews;
			$item->NewsId = $s[0];
			$item->PublisherId = $s[1];
			$item->Date = $s[2];
			
			include_once('Model/news.php');
			$item->News = new News;
			$item->News->Id = $item->NewsId;
			$item->News->SelectById();
			
			include_once('Model/user.php');
			$item->Publisher = new User;
			$item->Publisher->Id = $item->PublisherId;
			$item->Publisher->SelectById();
			
			$a[] = $item;	
		}
		return $a;
	}
	
}

?>