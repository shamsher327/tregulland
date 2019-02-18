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

<?php $num_fields = count($items); ?>
<?php $i = 1; ?>
<?php foreach ($items as $delta => $item) : ?>
  <?php print render($item); ?><?php $i != $num_fields ? print ', ' : ''; ?>
  <?php $i++; ?>
<?php endforeach; ?>