<?php
/* COPYRIGHT
------------------------------------------------------------------	
  Omni Magazine for Drupal 7.x - Version 1.0                           
  Copyright (C) 2015 esors.com All Rights Reserved.           
  @license - Copyrighted Commercial Software                   
------------------------------------------------------------------	
  Theme Name: Omni Magazine                                            
  Author: ESORS                                           
  Date: 31st December 2015                                        
  Website: http://www.esors.com/                              
------------------------------------------------------------------	
  This file may not be redistributed in whole or   
  significant part.                                            
----------------------------------------------------------------*/   
?>

<div class="<?php print $classes; ?>">      
  <div class="meta clearfix">
    <?php print $picture;?> 
    <span class="author"><?php print $author; ?></span> • 
    <span class="date"><?php print $created; ?></span>
    <span class="date-short"><?php print date("F d, Y", $comment->created);?></span>
    <?php if ($content['links']): ?>        
      <?php print render($content['links']) ?>
    <?php endif; ?>
  </div>

  <?php if ($node->type !='forum'): ?>
    <div class="arrow"><span class="fa fa-caret-up"></span></div>
  <?php endif ?> 

  <div class="content">
    <?php if ($title): ?><h4 class="title"><?php print $title; ?></h4><?php endif; ?>
    <?php
      hide($content['links']);
      print render($content);
    ?>
    <?php if ($signature): ?><div class="user-signature clearfix"><?php print $signature; ?></div><?php endif; ?> 
  </div>
</div>
