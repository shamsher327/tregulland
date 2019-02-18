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

  if ($icon_class == "hot") {
    $font_icon = "fa fa-bomb";
  } else if ($icon_class == "hot-new") {
    $font_icon = "fa fa-fire";
  } else if ($icon_class == "new") {
    $font_icon = "fa fa-file-text";
  } else if ($icon_class == "closed") {
    $font_icon = "fa fa-times-circle";
  } else if ($icon_class == "sticky") {
    $font_icon = "fa fa-thumb-tack";
  } else {
    $font_icon = "fa fa-file-text-o";
  } 
?>

<span class="<?php print $font_icon;?>"></span>
