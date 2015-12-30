   <ul>
		<?php
if(isset($_SESSION['usertype']) and $_SESSION['usertype'] == "A")
{
?>
          <li><a href="<?php print baseurl; ?>home/">Home</a></li>
          <li><a href="<?php print baseurl; ?>Country/">Country</a></li>
          <li><a href="<?php print baseurl; ?>City/">City</a></li>
          <li><a href="<?php print baseurl; ?>category/">Catagory</a></li>
          <li><a href="<?php print baseurl; ?>news/">News</a></li>
          <li><a href="<?php print baseurl; ?>newscomments/">News Comment</a></li>
          <li><a href="<?php print baseurl; ?>newslike/">News Like</a></li>
          <li><a href="<?php print baseurl; ?>newsdislike/">News Dislike</a></li>
          <li><a href="<?php print baseurl; ?>newsmedia/">News Media</a></li>
          <li><a href="<?php print baseurl; ?>publishednews/">Published News</a></li>
          <li><a href="<?php print baseurl; ?>user/">User</a></li>
          <li><a href="<?php print baseurl; ?>loginhistory/">Login History</a></li>
          
      <li><a href="<?php print baseurl; ?>profile/<?php print $_SESSION['userid']; ?>"><?php print $_SESSION['username']; ?></a></li>
      <li><a href="<?php print baseurl; ?>user/logout/">Logout</a></li>
	  <?php
      }
      else if(isset($_SESSION['usertype']))
      {
      ?>
      <li><a href="<?php print baseurl; ?>profile/<?php print $_SESSION['userid']; ?>"><?php print $_SESSION['username']; ?></a></li>
      <li><a href="<?php print baseurl; ?>logout/">Logout</a></li>
      <?php
      }
      else
      {
      ?>
      <li><a href="<?php print baseurl; ?>user/login/">Login</a></li>
      <li><a href="<?php print baseurl; ?>register/">Register</a></li>
      <?php	
      }
?>

 </ul>










