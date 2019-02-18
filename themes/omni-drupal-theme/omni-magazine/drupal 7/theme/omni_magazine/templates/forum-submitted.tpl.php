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

<?php if ($time): ?>
  <div class="submitted">
  <?php print t('By ').$author.'<span class="date"> <em>'.$time.t(' ago').'</em></span>'; ?>
  </div>
<?php else: ?>
  <?php print t('n/a'); ?>
<?php endif; ?>
