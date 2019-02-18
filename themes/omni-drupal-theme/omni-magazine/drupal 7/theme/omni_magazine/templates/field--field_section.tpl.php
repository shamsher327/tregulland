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

<?php foreach ($items as $delta => $item): ?>
  <?php 
    $wrapper = entity_metadata_wrapper('taxonomy_term', $item['#options']['entity']->tid); 
    $term_color ="";
    if (isset($wrapper->field_taxonomy_color)){
      $term_color = $wrapper->field_taxonomy_color->value();
    }    
  ?>
  <div class="section<?php print !empty($term_color)?" ".$term_color:"" ?>">
    <?php print render($item); ?>
  </div>
<?php endforeach; ?>