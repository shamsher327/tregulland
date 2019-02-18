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

use Drupal\Component\Utility\Html;
use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\file\Entity\File;
use Drupal\Core\Url;

  function omni_magazine_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {

    $form['omni_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Omni settings')
    );
    
    $form['omni_settings']['omni_header'] = array(
      '#type'          => 'select',
      '#title'         => t('Header Style'),
      '#default_value' => theme_get_setting('omni_header'),
      '#options'       => array(
        'compact-width'=> t('Compact Style'),
        'full-width'   => t('Full Width Style'),
        'box-width'    => t('Box Width Style'),                
      ),      
    );
    
    $form['omni_settings']['omni_menu'] = array(
      '#type'          => 'select',
      '#title'         => t('Menu Style'),
      '#default_value' => theme_get_setting('omni_menu'),
      '#options'       => array(
        'list-style'   => t('Dropdown Menu'),
        'mega-style'   => t('Mega Menu'),
        'hybrid-style' => t('Hybrid Menu'),        
      ),      
    );
    
    $form['omni_settings']['omni_layout'] = array(
      '#type'          => 'select',
      '#title'         => t('Layout Options'),
      '#default_value' => theme_get_setting('omni_layout'),
      '#options'       => array(
        'pst' => t('Primary/Secondary/Tertiary'),
        'spt' => t('Secondary/Primary/Tertiary'),
        'tps' => t('Tertiary/Primary/Secondary'),
      ),      
    );
    
    $form['omni_settings']['omni_header_search'] = array(
      '#type'          => 'select',
      '#title'         => t('Display header search box?'),
      '#description'   => t('Can only be used when Header Style select as Full or Box Width.'),
      '#default_value' => theme_get_setting('omni_header_search'),      
      '#options'       => array(
        'yes'   => t('Yes'),
        'no'    => t('No'),
      ),
    ); 
  }
?>