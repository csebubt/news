<?php
class Newsmedia
{
	public $cn;
	public $Id;
	public $NewsId;
	public $Link;
	public $Error;
	
	public $News;
	
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');
		$this->News = null;
		
	}
	
	public function Insert()
	{
		$sql = "insert into newsmedia(newsId, link ) values
		(".$this->NewsId.", '".$this->Link."')";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	
	public function Delete()
	{
		$sql = "delete from newsmedia where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select * from newsmedia where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->NewsId = $s[1];
			$this->Link = $s[2];
			include_once('model/news.php');
			$this->News = new News();
			$this->News->Id = $this->NewsId;			
			$this->News->SelectById();
			
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from newsmedia";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$nm = new Newsmedia();
		
			$nm->Id = $s[0];
			$nm->NewsId = $s[1];
			$nm->Link = $s[2];
			
		    include_once('model/news.php');
			$nm->News = new News();
			$nm->News->Id = $nm->NewsId;			
			$nm->News->SelectById();
			
		
			$a[] = $nm;	
		}
		return $a;
	}
	
	
	public function Update()
	{
		$sql = "update newsmedia set newsId = '".$this->NewsId."', link = '".$this->Link."' where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
}

?>