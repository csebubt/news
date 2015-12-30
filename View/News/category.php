<div class="main_body">
  <div class="row  scnd_color">
  <?php
$v = $model->Category($param1);

if($v != null)
{
foreach($v as $item)
{
print '<div class="col-lg-4 news_item_sml">
        <h2><a href="'.baseurl.'News/SingleNews/'.$item->Id.'">'.$item->Title.'</a></h2>
		<p>'.$item->Author->Name.' || '.$item->Datetime.' || <a href="'.baseurl.'News/Category/'.$item->Category->Id.'">'.$item->Category->Name.'</a></p>
        <p> <img src="'.baseurl.'images/news_images/'.$item->Id.$item->Image.'" >'.substr($item->News, 0, 500).'
        <p><a class="btn btn-default" href="'.baseurl.'Home/News/'.$item->Id.'" role="button">View details »</a></p>
      </div>';
}
}
else
{
	print 'No Data Found';	
}
?>

</div>
</div>