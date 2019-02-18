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

use Drupal\Component\Utility\Html;
use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\file\Entity\File;
use Drupal\Core\Url;

  function omni_agency_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {

    $form['omni_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Omni settings')
    );
    
    $form['omni_settings']['omni_header_sticky'] = array(
      '#type'          => 'checkbox',
      '#title'         => t('Sticky header'),
      '#default_value' => theme_get_setting('omni_header_sticky'),
    ); 
    
    $form['omni_settings']['omni_menu_reveal'] = array(
      '#type'          => 'checkbox',
      '#title'         => t('Reveal mobile menu'),
      '#default_value' => theme_get_setting('omni_menu_reveal'),
    ); 
  }
?>