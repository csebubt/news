<a href="<?php print baseurl; ?>publishednews/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>News</th><th>Publisher</th><th>Date</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	//print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->News->Title.'</td>';
	print '<td>'.$item->Publisher->Name.'</td>';
	print '<td>'.$item->Date.'</td>';
	
	print '<td><a href="'.baseurl.'publishednews/delete/'.$item->News->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>