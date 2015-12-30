<a href="<?php print baseurl; ?>city/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>Id</th><th>Name</th><th>Country</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->Name.'</td>';
	print '<td>'.$item->Country->Name.'</td>';
	print '<td><a href="'.baseurl.'city/update/'.$item->Id.'">Edit</a></td>';
	print '<td><a href="'.baseurl.'city/delete/'.$item->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>