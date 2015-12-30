<?php
class Newscomments
{
	public $cn;
	public $Id;
	public $NewsId;
	public $Comments;
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
		$sql = "insert into newscomments(newsId, comments, userId , date)
		       values(
			   ".$this->NewsId.", 
			   '".$this->Comments."', 
			   ".$this->UserId.",
			   ".$this->Date."
			   )";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		$sql = "update newscomments set newsId = ".$this->NewsId.", 
				comments = '".$this->Comments."',
				userId = ".$this->UserId.",
				date = '".date("Y-m-d")."' 
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
		$sql = "delete from newscomments where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select * from newscomments where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->NewsId = $s[1];
			$this->Comments = $s[2];
			$this->UserId = $s[3];
			$this->Date = $s[4];
			
			include_once('model/news.php');
			$this->News = new News();
			$this->News->Id = $this->NewsId;			
			$this->News->SelectById();
			
			include_once('model/User.php');
			$this->User = new User();
			$this->User->Id = $this->UserId;			
			$this->User->SelectById();
			
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from newscomments";
		
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$ncom = new Newscomments();
			$ncom->Id = $s[0];
			$ncom->NewsId = $s[1];
			$ncom->Comments = $s[2];
			$ncom->UserId = $s[3];
			$ncom->Date= $s[4];
		
			
			include_once('model/news.php');
			$ncom->News = new News();
			$ncom->News->Id = $ncom->NewsId;			
			$ncom->News->SelectById();
			
			include_once('model/User.php');
			$ncom->User = new User();
			$ncom->User->Id = $ncom->UserId;			
			$ncom->User->SelectById();
			
			$a[] = $ncom;	
		}
		return $a;
	}
	
	public function SelectByNews()
	{
		$a = null;
		$sql = "select * from newscomments where newsid = ".$this->NewsId;
		
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$ncom = new Newscomments();
			$ncom->Id = $s[0];
			$ncom->NewsId = $s[1];
			$ncom->Comments = $s[2];
			$ncom->UserId = $s[3];
			$ncom->Date= $s[4];
			$a[] = $ncom;	
		}
		return $a;
	}
	
}

?>