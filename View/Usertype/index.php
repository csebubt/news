<a href="<?php print baseurl; ?>usertype/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>Id</th><th>Name</th><th>Description</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->Name.'</td>';
	print '<td>'.$item->Description.'</td>';
	
	print '<td><a href="'.baseurl.'usertype/update/'.$item->Id.'">Edit</a></td>';
	print '<td><a href="'.baseurl.'usertype/delete/'.$item->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>