<?php
/* COPYRIGHT
------------------------------------------------------------------  
  Omni for Drupal 8.x - Version 1.0                           
  Copyright (C) 2016 esors.com All Rights Reserved.           
  @license - Copyrighted Commercial Software                   
------------------------------------------------------------------  
  Theme Name: Omni Agency                                            
  Author: ESORS                                           
  Date: 19th May 2016                                        
  Website: http://www.esors.com/                              
------------------------------------------------------------------  
  This file may not be redistributed in whole or   
  significant part.                                            
----------------------------------------------------------------*/   
?>

<?php

$info = array(
  'fields' => array(
    'text'           => t('Text'),
    'link'           => t('Link'),  
    'linkactive'     => t('Link Active'),    
    'border'         => t('Border'),
    'base'           => t('Background'),
    'headerbg'       => t('Header Background'), 
    'pmlink'         => t('Primary Menu Link'),
    'pmbg'           => t('Primary Menu Background'),
  ),
  'schemes' => array(
    'default' => array(
      'title' => t('Default'),
      'colors' => array(
        'text'           => '#0a0a0a',
        'link'           => '#c7a462',  
        'linkactive'     => '#a37e3a',
        'border'         => '#eeeeee', 
        'base'           => '#fefefe',
        'headerbg'       => '#202020',
        'pmlink'         => '#808285',
        'pmbg'           => '#040404', 
      ),
    ),
  ),

  'css' => array(
    'css/theme/omni-color-dynamic.css',
  ),

  'copy' => array(
    'logo.png',
  ),

  'gradients' => array(
  ),

  'preview_html' => 'color/preview.html',
);
