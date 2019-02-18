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

<?php if ($content): ?>
  <section id="comment">
    <?php if ($content['comments']): ?>
      <div id="comment-post" class="clearfix">
        <?php if ($node->type!='forum'): ?>
          <header>
            <h3 class="title"><?php print t('Comments'); ?></h3>
          </header>
        <?php endif ?> 
        <div class="comments">
          <?php print render($content['comments']); ?>
        </div>
     </div>
    <?php endif; ?> 
    <?php if ($content['comment_form']): ?>        
      <div id="comment-box" class="clearfix">
        <header>
          <h3 class="title"><?php print t('Post new comment'); ?></h3>
        </header>
        <?php print render($content['comment_form']); ?>
      </div>
    <?php endif; ?>    
  </section>
<?php endif; ?>