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

<?php if($block->region =='main_menu' || $block->region =='header_left' || $block->region =='header_right' || $block->region =='newsflash' || $block->region =='content'|| $block->module =='omni_custom'): ?>
  <?php print $content; ?>
<?php elseif($block->region =='search'): ?>
  <div id="<?php print $block_html_id; ?>">      
    <?php print $content ?>   
  </div>
<?php elseif($block->region =='quick_link'): ?>
  <?php if ($block->subject): ?>
    <h3 class="title"><?php print $block->subject ?></h3>
  <?php endif;?>
  <?php print $content ?>   
<?php else: ?>
  <div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <div class="inner">
      <?php print render($title_prefix); ?>
      <?php if ($block->subject): ?>
        <h3 class="title"<?php print $title_attributes; ?>><?php print $block->subject ?></h3>
      <?php endif;?>
      <?php print render($title_suffix); ?>
      <div class="content clearfix"<?php print $content_attributes; ?>>
          <?php print $content ?>
      </div>
    </div>
  </div>
<?php endif;?>