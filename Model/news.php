<?php
class News
{
	public $cn;
	public $Id;
	public $Title;
	public $AuthorId;
	public $Datetime;
	public $CatetoryId;
	public $News;
	public $Image;
	public $Error;
	
	
	public $Author;
	public $Category;
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');
		
		$this->Author = null;
		$this->Category = null;	
	}
	
	public function Insert()
	{		
		$sql = "insert into News(title, authorId, datetime, categoryId, news, image) values('".$this->Title."', ".$this->AuthorId.", '".date("Y-m-d")."', ".$this->CategoryId.", '".mysqli_real_escape_string($this->cn, $this->News)."', '".$this->Image."')";
		if(mysqli_query($this->cn, $sql))
		{
			$this->Id = mysqli_insert_id($this->cn);
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		
		$sql = "update news set title = '".$this->Title."',
		authorId= '".$this->AuthorId."',
		datetime= '".date("Y-m-d")."',
		categoryId= '".$this->CategoryId."', 
		news= '".mysqli_real_escape_string($this->cn, $this->News)."'";
		if($this->Image != ""){
		$sql .= ", Image= '".$this->Image."' ";
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
		$sql = "delete from news where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	
	public function SelectById()
	{
		$sql = "select * from news where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->Title = $s[1];
			$this->AuthorId= $s[2];
			$this->Datetime = $s[3];
			$this->CategoryId = $s[4];
			$this->News = $s[5];
			$this->Image = $s[6];
			include_once("Model/user.php");
			$this->Author = new User();
			$this->Author->Id = $this->AuthorId;
			$this->Author->SelectById();
			
			include_once("Model/category.php");
			$this->Category = new Category();
			$this->Category->Id = $this->CategoryId;
			$this->Category->SelectById();
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from News ";
		
		
		
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$nws = new News();
			
			$nws->Id = $s[0];
			$nws->Title = $s[1];
			$nws->AuthorId = $s[2];
			$nws->Datetime = $s[3];
			$nws->CategoryId = $s[4];
			$nws->News= $s[5];
			$nws->Image = $s[6];
			
			include_once("Model/user.php");
			$nws->Author = new User();
			$nws->Author->Id = $nws->AuthorId;
			$nws->Author->SelectById();
			
			include_once("Model/category.php");
			$nws->Category = new Category();
			$nws->Category->Id = $nws->CategoryId;
			$nws->Category->SelectById();
			
			$a[] = $nws;
		}
		return $a;
	}
	public function SelectList()
	{
		$o = '<option value="NULL">Select</option>';
		$sql = "select * from news";
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
	
	
	
	public function SelectPublished()
	{
		$a = null;
		$sql = "select * from News where id in (select NewsId from publishednews)";
		
		
		
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$nws = new News();
			
			$nws->Id = $s[0];
			$nws->Title = $s[1];
			$nws->AuthorId = $s[2];
			$nws->Datetime = $s[3];
			$nws->CategoryId = $s[4];
			$nws->News= $s[5];
			$nws->Image = $s[6];
			
			include_once("Model/user.php");
			$nws->Author = new User();
			$nws->Author->Id = $nws->AuthorId;
			$nws->Author->SelectById();
			
			include_once("Model/category.php");
			$nws->Category = new Category();
			$nws->Category->Id = $nws->CategoryId;
			$nws->Category->SelectById();
			
			$a[] = $nws;
		}
		return $a;
	}
	
	public function SelectLatest()
	{
		$a = null;
		$sql = "select * from News where id in (select NewsId from publishednews) order by(id) desc limit 0, 6";
		
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$nws = new News();
			
			$nws->Id = $s[0];
			$nws->Title = $s[1];
			$nws->AuthorId = $s[2];
			$nws->Datetime = $s[3];
			$nws->CategoryId = $s[4];
			$nws->News= $s[5];
			$nws->Image = $s[6];
			
			include_once("Model/user.php");
			$nws->Author = new User();
			$nws->Author->Id = $nws->AuthorId;
			$nws->Author->SelectById();
			
			include_once("Model/category.php");
			$nws->Category = new Category();
			$nws->Category->Id = $nws->CategoryId;
			$nws->Category->SelectById();
			
			$a[] = $nws;
		}
		return $a;
	}
	
	public function SelectUnpublishedList()
	{
		$o = '<option value="NULL">Select</option>';
		$sql = "select * from News where id not in (select NewsId from publishednews)";
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
	
	public function Category3($categoryId)
	{
		$a = null;
		$sql = "select * from News where id in (select NewsId from publishednews) and categoryid = ".$categoryId." order by (id) desc limit 0, 3";
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$nws = new News();
			
			$nws->Id = $s[0];
			$nws->Title = $s[1];
			$nws->AuthorId = $s[2];
			$nws->Datetime = $s[3];
			$nws->CategoryId = $s[4];
			$nws->News= $s[5];
			$nws->Image = $s[6];
			
			include_once("Model/user.php");
			$nws->Author = new User();
			$nws->Author->Id = $nws->AuthorId;
			$nws->Author->SelectById();
			
			include_once("Model/category.php");
			$nws->Category = new Category();
			$nws->Category->Id = $nws->CategoryId;
			$nws->Category->SelectById();
			
			$a[] = $nws;
		}
		return $a;
	}
	
	public function Category($categoryId)
	{
		$a = null;
		$sql = "select * from News where id in (select NewsId from publishednews)";
		
		if($categoryId != null)
		{
			$s  = "";
			$sql .= " and categoryid in (".$this->categories($categoryId, $s).$categoryId.")";
		}
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$nws = new News();
			
			$nws->Id = $s[0];
			$nws->Title = $s[1];
			$nws->AuthorId = $s[2];
			$nws->Datetime = $s[3];
			$nws->CategoryId = $s[4];
			$nws->News= $s[5];
			$nws->Image = $s[6];
			
			include_once("Model/user.php");
			$nws->Author = new User();
			$nws->Author->Id = $nws->AuthorId;
			$nws->Author->SelectById();
			
			include_once("Model/category.php");
			$nws->Category = new Category();
			$nws->Category->Id = $nws->CategoryId;
			$nws->Category->SelectById();
			
			$a[] = $nws;
		}
		return $a;
	}
	
	private function categories($cid, $s)
	{
		$sql = "select id from category where categoryId = ".$cid;
		$r = mysqli_query($this->cn, $sql);
		if(mysqli_num_rows($r) > 0)
		{
			while($sst = mysqli_fetch_row($r))
			{
				$s .= $sst[0].", ";
				$this->categories($sst[0], $s);
			}
		}
		return $s;
	}
}

?>