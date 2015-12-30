<a href="<?php print baseurl; ?>loginhistory/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>Id</th><th>User</th><th>Date</th><th>IP</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->User->Name.'</td>';
	print '<td>'.$item->Date.'</td>';
	print '<td>'.$item->Ip.'</td>';
	print '<td><a href="'.baseurl.'loginhistory/update/'.$item->Id.'">Edit</a></td>';
	print '<td><a href="'.baseurl.'loginhistory/delete/'.$item->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>