<a href="<?php print baseurl; ?>user/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>Id</th><th>Name</th><th>Contact</th><th>Email</th><th>Type</th><th>Address</th><th>City</th><th>Image</th><th>Date Time</th><th>Create IP</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->Name.'</td>';
	print '<td>'.$item->Contact.'</td>';
	print '<td>'.$item->Email.'</td>';
	print '<td>'.$item->Type.'</td>';
	print '<td>'.$item->Address.'</td>';
	print '<td>'.$item->City->Name.'</td>';
	print '<td> <img src="'.baseurl.'images/user_images/'.$item->Id.$item->Image.'" width="70" /></td>';
	print '<td>'.$item->CreateDate.'</td>';
	print '<td>'.$item->CreateIp.'</td>';
	print '<td><a href="'.baseurl.'user/update/'.$item->Id.'">Edit</a></td>';
	print '<td><a href="'.baseurl.'user/delete/'.$item->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>