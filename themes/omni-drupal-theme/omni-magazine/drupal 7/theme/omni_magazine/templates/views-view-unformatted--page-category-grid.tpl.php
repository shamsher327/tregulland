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

<div class="column">
  <div class="inner">
    <?php if (!empty($title)): ?>
      <?php print $title; ?>
    <?php endif; ?>

    <?php $column = ''; ?>
    <?php $counter = 0; ?>
    
    <?php
      foreach ($rows as $id => $row) {
        
        if ($counter<5) {
          if ($counter==0) {         
            $row = remove_image_alter($row, 'thumbnail');
            $column = "<li class=\"item-compact clearfix\">".$row."</li>";
          } else {
            $row = remove_image_alter($row, 'default');
            $column = $column."<li class=\"item-thumbnail clearfix\">".$row."</li>";
          }
        }
        
        $counter ++;
      }

      print "<ul class=\"no-bullet\">".$column."</ul>";      
    ?>
  </div>
</div>