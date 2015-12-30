<a href="<?php print baseurl; ?>newsmedia/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>Id</th><th>News</th><th>Link</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->News->Title.'</td>';
	print '<td>'.$item->Link.'</td>';

	print '<td><a href="'.baseurl.'newsmedia/update/'.$item->Id.'">Edit</a></td>';
	print '<td><a href="'.baseurl.'newsmedia/delete/'.$item->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>