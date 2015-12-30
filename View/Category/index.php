<a href="<?php print baseurl; ?>category/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>Id</th><th>Name</th><th>Category</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->Name.'</td>';
	if($item->Category != null)
	{
		print '<td>'.$item->Category->Name.'</td>';
	}
	else
	{
		print '<td>Basic</td>';	
	}
	print '<td><a href="'.baseurl.'category/update/'.$item->Id.'">Edit</a></td>';
	print '<td><a href="'.baseurl.'category/delete/'.$item->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>