<?php
class Category
{
	public $cn;
	public $Id;
	public $Name;
	public $CategoryId;
	public $Error;
	
	public $Category;
	
	public function __construct()
	{
		$this->cn = mysqli_connect('localhost', 'root', '', 'dbonlinenews');	
	}
	
	public function Insert()
	{
		$sql = "insert into category(name, categoryId) values
		('".$this->Name."', ".$this->CategoryId.")";
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Update()
	{
		$sql = "update category set name = '".$this->Name."', 
				categoryId = ".$this->CategoryId." 
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
		$sql = "delete from category where id = ".$this->Id;
		if(mysqli_query($this->cn, $sql))
		{
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function SelectById()
	{
		$sql = "select * from category where id = ".$this->Id;
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$this->Name = $s[1];
			$this->CategoryId = $s[2];
			if($this->CategoryId != null and $this->CategoryId > 0)
			{
				include_once('Model/category.php');
				$this->Category = new Category;
				$this->Category->Id = $this->CategoryId;
				$this->Category->SelectById();	
			}
			return true;	
		}
		$this->Error = mysqli_error($this->cn);
		return false;
	}
	
	public function Select()
	{
		$a = null;
		$sql = "select * from category";
		if($this->CategoryId > 0)
		{
			$sql .= " where categoryId = ".$this->CategoryId;	
		}
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$item = new Category;
			$item->Id = $s[0];
			$item->Name = $s[1];
			$item->CategoryId = $s[2];
			if($item->CategoryId != null and $item->CategoryId > 0)
			{
				include_once('Model/category.php');
				$item->Category = new Category;
				$item->Category->Id = $item->CategoryId;
				$item->Category->SelectById();	
			}
			$a[] = $item;	
		}
		return $a;
	}
	
	public function SelectMenu($pid = 0)
	{
		$a = null;
		$sql = "select * from category";
		if($pid > 0)
		{
			$sql .= " where categoryId = ".$pid;	
		}
		else
		{
			$sql .= " where categoryId is NULL";
		}
		$r = mysqli_query($this->cn, $sql);
		while($s = mysqli_fetch_row($r))
		{
			$item = new Category;
			$item->Id = $s[0];
			$item->Name = $s[1];
			$item->CategoryId = $s[2];
			if($item->CategoryId != null and $item->CategoryId > 0)
			{
				include_once('Model/category.php');
				$item->Category = new Category;
				$item->Category->Id = $item->CategoryId;
				$item->Category->SelectById();	
			}
			$a[] = $item;	
		}
		return $a;
	}
	public function SelectList()
	{
		$o = '<option value="NULL">Select</option>';
		$sql = "select * from category";
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