
<div class="row  scnd_color">
  <div class="col-lg-9 news_item_lrg">
    <h2><?php print $model->Title; ?></h2>
    <p><?php print $model->Author->Name; ?> || <?php print $model->Datetime; ?> || <?php print $model->Category->Name; ?></p>
    <p> <img src="<?php print baseurl.'images/news_images/'.$model->Id.$model->Image; ?>"></p>
    <p>
    <?php print $model->News; ?>
</p>
</div></div>



<div class="row" >
  <div class="col-lg-9">
    <h4>
    <?php
	
		include_once('Model/newslike.php');
		$nl = new Newslike();
		if(isset($_POST['btnLike']))
		{
			$nl->NewsId = $model->Id;
			$nl->UserId = $_SESSION['userid'];
			$nl->Date = date("Y-m-d");
			if($nl->Insert())
			{
				$nl = new Newslike();	
			}
		}
	
		if(isset($_SESSION['usertype']))
		{
			$nl->UserId = $_SESSION['userid'];
			$nl->NewsId = $model->Id;
			if($nl->Check())
			{
				print 'Liked';	
			}
			else
			{
				print '<form method="post" action="">
        <input type="submit" name="btnLike" value="Like" />
      </form>';
			}
		}
		else
		{
			print '<a href="User/Login">Login to Like</a>';	
		}
	?>
    </h4>
    
    
    <p><span>0 like</span> <span> 0 Comments</span></p>
    
    
    <?php
    include_once("Model/user.php");
	$usr = new User();
	$usr->Id = $_SESSION['userid'];
	$usr->SelectById();
	
	include_once("Model/newscomments.php");
	$nwc = new Newscomments();
	
	if(isset($_POST['btnComments']))
	{
		$nwc->NewsId = $model->Id;
		$nwc->UserId = $_SESSION['userid'];
		$nwc->Comments = $_POST['comments'];
		$nwc->Date = date('Y-m-d');
		if($nwc->Insert())
		{
			$nwc = new 	Newscomments();
		}
	}
	
	?>
    <div class="user_pic"><?php print '<img width="80" src="'.baseurl.'images/user_images/'.$usr->Id.$usr->Image.'" />'; ?></div>
    <div class="comment_box">
      <form method="post" action="">
        <textarea placeholder="Give your comments" rows="6" cols="80" name="comments" id="comment_input"><?php print $nwc->Comments; ?></textarea>
        <input type="submit" name="btnComments" value="submit"  />
      </form>
    </div>
    <div class="old_comments_area">
      
      <?php
	  $nwc->NewsId = $model->Id;
      $v = $nwc->SelectByNews();
	  include_once('model/user.php');
	  
	  if($v != null)
	  {
		  foreach($v as $item)
		  {
			  
			  $usr = new user();
			  
			  $usr->Id = $item->UserId;
			  $usr->SelectById();
	  
			print '<div  class="old_comment"> <b>'.$usr->Name.'</b><span> | '.$item->Date.'</span><br />	<div class="user_pic"><img src="'.baseurl.'images/user_images/'.$usr->Id.$usr->Image.'" width="40" height="40" /></div>
        <div class="comment_content">'.$item->Comments.'</div> </div>';  
		  }
	  }
	  ?> 
     
    </div>
  </div>
</div>
