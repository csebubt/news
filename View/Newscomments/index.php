<a href="<?php print baseurl; ?>newscomments/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>Id</th><th>News Title</th><th>Comments</th><th>User Name</th><th>Date</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->News->Title.'</td>';
	print '<td>'.$item->Comments.'</td>';
	print '<td>'.$item->User->Name.'</td>';
	print '<td><a href="'.baseurl.'newscomments/update/'.$item->Id.'">Edit</a></td>';
	print '<td><a href="'.baseurl.'newscomments/delete/'.$item->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>