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
  $showcase_type = $wrapper->field_showcase_type->value();

  if ($showcase_type == 'highlight') {
    
    $items_count = count($items);
    $column_one = '';
    $column_two = '';
    $column_three = '';


    switch ($items_count) {
        
      case 1:

        $column_one = $column_one.drupal_render($items[0]);

      break;
        
      case 2:

        $column_one = $column_one.drupal_render($items[0]);
        $column_two = $column_two.drupal_render($items[1]);

      break;
        
      case 3:

        $column_one = $column_one.drupal_render($items[0]);
        $column_two = $column_two.drupal_render($items[1]);
        $column_two = $column_two.drupal_render($items[2]);

      break;
        
      case 4:

        foreach ($variables ['items'] as $delta => $item) {

          if ($delta == 0) {
            $column_one = $column_one.drupal_render($item);
          } 

          if ($delta == 1) {
            $column_two = $column_two.drupal_render($item);
          }
          
          if ($delta >= 2) {
            $column_three = $column_three.drupal_render($item);
          }
          
        }

      break;
        
      case 5:

        foreach ($variables ['items'] as $delta => $item) {

          if ($delta == 0) {
            $column_one = $column_one.drupal_render($item);
          } 

          if ($delta == 1 || $delta == 2) {
            $column_two = $column_two.drupal_render($item);
          }

          if ($delta >= 3) {
            $column_three = $column_three.drupal_render($item);
          }

        }

      break;
        
      case 6:

        foreach ($variables ['items'] as $delta => $item) {

          if ($delta <= 1) {
            $column_one = $column_one.drupal_render($item);
          } 

          if ($delta == 2 || $delta == 3) {
            $column_two = $column_two.drupal_render($item);
          }

          if ($delta >= 4) {
            $column_three = $column_three.drupal_render($item);
          }

        }

      break; 
        
      case 7:
      case 8:

        foreach ($variables ['items'] as $delta => $item) {

          if ($delta <= 1) {
            $column_one = $column_one.drupal_render($item);
          } 

          if ($delta >= 2 && $delta <= 4) {
            $column_two = $column_two.drupal_render($item);
          }

          if ($delta >= 5) {
            $column_three = $column_three.drupal_render($item);
          }

        }

      break;
    
      case 9:

        foreach ($variables ['items'] as $delta => $item) {

          if ($delta <= 2) {
            $column_one = $column_one.drupal_render($item);
          } 

          if ($delta >= 3 && $delta <= 5) {
            $column_two = $column_two.drupal_render($item);
          }

          if ($delta >= 6) {
            $column_three = $column_three.drupal_render($item);
          }

        }

      break;
        
      default:
      break;
    }
    
    print "<div class=\"inner size-".$items_count." clearfix\">";
    print "<div class=\"column first\"><ul>".$column_one."</ul></div>";

    if (!empty($column_two)) {
      print "<div class=\"column second\"><ul>".$column_two."</ul></div>";
    }
    
    if (!empty($column_three)) {
      print "<div class=\"column third\"><ul>".$column_three."</ul></div>";
    }
    
    print "</div>";    
  }

?>
