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
    'title'          => t('Title'),
    'link'           => t('Link'),  
    'linkactive'     => t('Link Active'),   
    'meta'           => t('Meta'), 
    'border'         => t('Border'),
    'base'           => t('Background'),
    'foreground'     => t('Foreground'),
    'headerbg'       => t('Header Background'), 
    'pmlink'         => t('Primary Menu Link'),
  ),
  'schemes' => array(
    'default' => array(
      'title' => t('Default'),
      'colors' => array(
        'text'           => '#777777',        
        'title'          => '#3d3e41',
        'link'           => '#ce4656',  
        'linkactive'     => '#2199e8',
        'meta'           => '#999999',
        'border'         => '#e9e9e9', 
        'base'           => '#f9f9f9',
        'foreground'     => '#fefefe',
        'headerbg'       => '#303030',
        'pmlink'         => '#ffffff',
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
