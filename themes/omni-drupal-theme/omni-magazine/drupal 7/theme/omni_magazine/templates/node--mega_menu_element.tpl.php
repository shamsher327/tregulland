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

<?php 
  $wrapper = entity_metadata_wrapper('node', $node);
  $style = $wrapper->field_mega_menu_element_style->value();  
  $url = $wrapper->field_link_url->value();
 ?>

<?php if (($style =='col_1_s1')||($style =='col_2_s1')): ?>
  <li class="fix-width">
<?php else: ?>
  <li>
<?php endif; ?> 
  <a href="<?php print $url; ?>"><?php print $title; ?></a>
  <?php if (!empty($content['field_mega_menu_element_item'])): ?>
    <ul class="mega-menu <?php print $style; ?>">
      <?php print render($content['field_mega_menu_element_item']); ?>   
    </ul> 
  <?php endif; ?> 
</li>