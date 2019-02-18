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

<article class="node forum full clearfix">
  
  <div class="meta clearfix">
    <?php print $user_picture; ?>
    <div class="detail">
      <span class="author"><?php print $name; ?></span> • 
      <span class="date"><?php print $date; ?></span> • 
      <span class="terms"><?php print render($content['taxonomy_forums']); ?></span>
    </div>
  </div>

  <div class="content clearfix">
    <?php
      hide($content['comments']);
      hide($content['links']);
      hide($content['taxonomy_forums']);
      print render($content);
    ?>
  </div> 
  <?php if (!empty($content['links'])): ?>
    <?php print render($content['links']); ?>
  <?php endif; ?>
</article>
<?php print render($content['comments']); ?>
