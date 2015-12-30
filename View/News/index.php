<a href="<?php print baseurl; ?>news/Insert">New Entry</a>
<?php
$v = $model->Select();
if($v != null)
{
print '<table border="0" cellpadding="0" cellpadding="0">';
print '<tr><th>Id</th><th>Title</th><th>Author</th><th>Date Time</th><th>Category</th><th>News</th><th>Image</th><th>#</th><th>#</th></tr>';
foreach($v as $item)
{
	print '<tr>';
	print '<td>'.$item->Id.'</td>';
	print '<td>'.$item->Title.'</td>';
	print '<td>'.$item->Author->Name.'</td>';
	print '<td>'.$item->Datetime.'</td>';
	print '<td>'.$item->Category->Name.'</td>';
	print '<td>'.substr(strip_tags($item->News), 0, 200).' .... '.'</td>';
	print '<td><img src="'. baseurl.'images/news_images/'.$item->Id.$item->Image.'" width="70px" height="50px" style="margin-bottom:5px;" /></td>';
	print '<td><a href="'.baseurl.'news/update/'.$item->Id.'">Edit</a></td>';
	print '<td><a href="'.baseurl.'news/delete/'.$item->Id.'">Delete</a></td>';
	print '</tr>';
}
print '</table>';
}
else
{
	print 'No Data Found';	
}
?>