<?php
if (!isset($website) ) { header('HTTP/1.1 404 Not Found'); die; }
?>

<div class="wrapper">   
    <div id="main-column">
     <div class="padding">
      <div class="inner">
<?php 
foreach ( $NewsData as $News ) {
?>
  <div class="date-outer">
	
<div class="contentpadding">
<div class="blog">

  <div class="post-header">
    <div class="contentheading"><a href="<?=OS_Post_Link($News["id"])?>"><?=$News["title"]?></a></div>
  </div>
  

  <div class="post-body entry-content" id="post-body-<?=$News["id"]?>">
  <?php if ( !OS_is_single() ) { ?>
   <div class="post_thumb">
     <a href="<?=OS_Post_Link($News["id"])?>"><img width="250" height="170" src="<?=OS_GetFirstImage( $News["full_text"] )?>" alt="post-thumb" /></a>
   </div>
   <?php } ?>
   <?=$News["text"]?> <?=$News["read_more"]?>
   
    <div class="post-comment-link">
	<span class="post-timestamp">
    <?=$News["date"]?>
    </span> | 
    <a href="<?=OS_Post_Link($News["id"])?>#comments"><?=$News["comments"]?> <?=$lang["total_comments"]?></a>
    </div>
   <div style="clear: both;"></div>
  </div>


<div class="post-footer">
  <div class="post-footer-line post-footer-line-1"></div>
  <div class="post-footer-line post-footer-line-2">
<?php if (is_logged() AND isset($_SESSION["level"] ) AND $_SESSION["level"]>=9 ) { ?>
    <span class="post-labels"><a href="<?=OS_HOME?>adm/?posts&amp;edit=<?=$News["id"]?>">edit entry</a></span>
<?php } ?>
  </div>
  <div class="post-footer-line post-footer-line-3">
  <span class="post-location"></span>
  </div>
</div>

</div>
   <?php
   if ( OS_is_single() ) {
   include("themes/".OS_THEMES_DIR."/comment_form.php");
   }
   ?>
</div>

  </div>
   <?php
   }
   ?>
     </div>
    </div>
   </div>
 </div>
</div>
<?php
   if ( !OS_is_single() )
   include('inc/pagination.php');
?>
