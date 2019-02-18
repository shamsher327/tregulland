<?php
/* COPYRIGHT
------------------------------------------------------------------  
  Omni for Drupal 8.x - Version 1.0                           
  Copyright (C) 2016 esors.com All Rights Reserved.           
  @license - Copyrighted Commercial Software                   
------------------------------------------------------------------  
  Theme Name: Omni Expo                                          
  Author: ESORS                                           
  Date: 1st October 2016                                        
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
    'headerlink'     => t('Header Link'),
  ),
  'schemes' => array(
    'default' => array(
      'title' => t('Default'),
      'colors' => array(
        'text'           => '#0a0a0a',        
        'title'          => '#333333',
        'link'           => '#c7a462',  
        'linkactive'     => '#a37e3a',
        'meta'           => '#999999',
        'border'         => '#eeeeee', 
        'base'           => '#ffffff',
        'foreground'     => '#f9f9f9',
        'headerlink'     => '#666666',
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
