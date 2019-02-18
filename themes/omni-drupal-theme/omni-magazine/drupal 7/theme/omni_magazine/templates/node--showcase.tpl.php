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
  $showcase_type  = $wrapper->field_showcase_type->value();
  $showcase_style = $wrapper->field_showcase_style->value();
  $title_display  = $wrapper->field_title_display->value();    
?>

<div class="block block-showcase showcase-<?php print $showcase_type; ?> <?php print $showcase_style; ?> clearfix">
  
  <?php

    switch ($showcase_type) {

      case "basic":

        print "<div class=\"slider slider-basic slider-shared\"".$data_slick.">";
        print render($content['field_showcase_slide']);
        print "</div>";
        break;

      case "thumbnail":

        print "<div class=\"slider slider-thumbnail slider-shared\"".$data_slick.">";
        print render($content['field_showcase_slide']);
        print "</div>";
        print "<div class=\"slider pager-thumbnail\"".$data_slick_pager.">";
        print render($content['field_showcase_thumbnail']);
        print "</div>";
        break;
     
      case "playlist":

        print "<div class=\"slider slider-playlist slider-shared\"".$data_slick.">";
        print render($content['field_showcase_slide']);
        print "</div>" ;
        print "<h3 class=\"title\">".$title."</h3>";
        print "<div class=\"slider pager-playlist\"".$data_slick_pager.">";      
        print render($content['field_showcase_playlist']);
        print "</div>";
        break;
        
      case "headline":

        if (empty($content['field_showcase_subheadline'])) {
              
           print "<div class=\"slider slider-headline no-subheadline\"".$data_slick.">";
           print render($content['field_showcase_slide']);
           print "</div>";     
             
        } else {
          
           print "<div class=\"slider slider-headline\"".$data_slick.">";
           print render($content['field_showcase_slide']);
           print "</div>"; 
           print "<div class=\"subheadline clearfix\">";
           print "<h3 class=\"title\">".$title."</h3>";
           print render($content['field_showcase_subheadline']);
           print "</div>";
        }

        break;

      case "newsflash":

        print "<span class=\"fa fa-bell-o\"></span>";
        print "<div class=\"slider slider-newsflash\"".$data_slick.">";      
        print render($content['field_showcase_slide']);      
        print "</div>";
        break;

      case "highlight":        

        print render($content['field_showcase_slide']); 
        break;
      
      case "gallery":        
        
        print "<div class=\"inner\">";
        if ($title_display =='show') {              
          print "<h3 class=\"title\">".$title."</h3>";          
        }
        
        print "<div class=\"slider slider-gallery\"".$data_slick.">"; 
        print render($content['field_showcase_slide']); 
        print "</div></div>";
        break;
        
      default:
        
        print "<div class=\"slider slider-".$showcase_type."\"".$data_slick.">"; 
        print render($content['field_showcase_slide']); 
        print "</div>";
        break;
    }

  ?>
</div>
