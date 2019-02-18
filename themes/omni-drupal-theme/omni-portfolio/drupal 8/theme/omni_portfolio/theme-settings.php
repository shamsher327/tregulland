<?php
/* COPYRIGHT
------------------------------------------------------------------  
  Omni for Drupal 8.x - Version 1.0                           
  Copyright (C) 2016 esors.com All Rights Reserved.           
  @license - Copyrighted Commercial Software                   
------------------------------------------------------------------  
  Theme Name: Omni Portfolio                                           
  Author: ESORS                                           
  Date: 19th August 2016                                        
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

  function omni_portfolio_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {

    $form['omni_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Omni settings')
    );

    $form['omni_settings']['omni_header_login'] = array(
      '#type'          => 'checkbox',
      '#title'         => t('Login & register link'),
      '#default_value' => theme_get_setting('omni_header_login'),
    );
  }
?>