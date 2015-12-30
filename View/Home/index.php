<?php
include_once('Model/news.php');
$model = new News();
$v = $model->SelectLatest();
?>
<div class="row pading">
  <div class="col-lg-9">
    <div id="banner-fade"> 
      
      <!-- start Basic Jquery Slider -->
      <ul class="bjqs">
		<?php
		if($v != null)
		{
		foreach($v as $item)
		{
			print '<li><a href="'.baseurl.'news/SingleNews/'.$item->Id.'"><img  src="'.baseurl.'images/news_images/'.$item->Id.$item->Image.'"  title="'.$item->Title.'" width="800px" height="400px"></a></li>';
		}
		}
		?>
      </ul>
      <!-- end Basic jQuery Slider --> 
      
    </div>
  </div>

  <div class="col-lg-3 slide_menu">
    <h2>Top news</h2>
    <ul>
     	<?php
		if($v != null)
		{
		foreach($v as $item)
		{
			print '<li><a href="'.baseurl.'news/SingleNews/'.$item->Id.'">'.$item->Title.'</a></li>';
		}
		}
		?>
    </ul>
  </div>

</div>

<div class="main_body">
  <div class="row  scnd_color">
    <?php
	include_once('Model/category.php');
	$ctgr = new Category();
	$v2 = $ctgr->Select();
	foreach($v2 as $ctg)
	{
		$v3 = $model->Category3($ctg->Id);
		if($v3 != null)
		{
			foreach($v3 as $nws)
			{
			print '<div class="col-lg-4 news_item_sml">
        <h2><a href="'.baseurl.'News/SingleNews/'.$nws->Id.'">'.$nws->Title.'</a></h2>
		<p>'.$nws->Author->Name.' || '.$nws->Datetime.' || <a href="'.baseurl.'News/Category/'.$ctg->Id.'">'.$ctg->Name.'</a></p>
        <p> <img src="'.baseurl.'images/news_images/'.$nws->Id.$nws->Image.'" >'.substr($nws->News, 0, 500).'
        <p><a class="btn btn-default" href="'.baseurl.'Home/News/'.$nws->Id.'" role="button">View details »</a></p>
      </div>';
	  		}
		}
	}
	?>
  </div>
</div>
