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
  $wrapper = entity_metadata_wrapper('node',  $element['#object']);
  $column_count = substr($wrapper->field_mega_menu_element_style->value(),4,1);  
  $edge_menu = $wrapper->field_mega_menu_element_edge->value();
  $item_count = count($items)
?>

<?php if (($edge_menu == false) && ($column_count == $item_count)): ?>
  <?php for ($i = 0; $i < $item_count; ++$i): ?>
    <li class="col-<?php print $i+1; ?>">
      <?php print render($items[$i]); ?>
    </li>
  <?php endfor; ?>
<?php endif ?>

<?php if (($edge_menu == true) && ($column_count+1 == $item_count)): ?>
  <?php for ($i = 0; $i < $column_count+1; ++$i): ?>
    <li class="col-<?php print $i+1; ?><?php print $i == $column_count?" edge-menu":"";?>">
      <?php print render($items[$i]); ?>
    </li>
  <?php endfor; ?>
<?php endif ?>
                                                                                          
<?php if (($edge_menu == true) && ($item_count == 1)): ?>
  <li class="col-1 edge-menu edge-menu-only">
    <?php print render($items[0]); ?>
  </li>
<?php endif ?>