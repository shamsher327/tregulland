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
/**
 * @file
 * Contains \Drupal\omni_custom\Twig\OmniExtension. 
 */

namespace Drupal\omni_custom\Twig;

class OmniExtension extends \Twig_Extension {
  
  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'omni';
  }

  /**
   * {@inheritdoc}
   */
  public function getFunctions() {
    return array(
      new \Twig_SimpleFunction('background_image', array($this, 'background_image'), array('is_safe' => array('html'),)),
      new \Twig_SimpleFunction('background_image_path', array($this, 'background_image_path'), array('is_safe' => array('html'),)),
      new \Twig_SimpleFunction('background_image_responsive', array($this, 'background_image_responsive'), array('is_safe' => array('html'),)),
    );
  }
  
  public function background_image($str) {
    
    $html = preg_replace('/<!--(.|\s)*?-->/', '', $str);
    preg_match( '@src="([^"]+)"@' , $html, $match );
    $src = array_pop($match);
    return "background-image: url(".$src.");";
  } 

  public function background_image_path($str) {
    
    $html = preg_replace('/<!--(.|\s)*?-->/', '', $str);
    preg_match( '@src="([^"]+)"@' , $html, $match );
    $src = array_pop($match);
    return $src;
  } 

  public function background_image_responsive($str) {
    
    $html = preg_replace('/<!--(.|\s)*?-->/', '', $str);
    preg_match_all( '@srcset="([^"]+)"@' , $html, $match );
    
    // $max_2600 = substr($match[0][0],8);
    // $max_2600 = substr($max_2600,0,strrpos($max_2600,' '));

    // $max_1300 = substr($match[0][0],8);
    // $max_1300 = substr($max_1300,0,strrpos($max_1300,' '));

    $medium = substr($match[0][0],8);
    $medium = substr($medium,0,strrpos($medium,' '));

    $small = substr($match[0][1],8);
    $small = substr($small,0,strrpos($small,'?'));

    //$src = "[".$max_325.", small],[".$max_650.", medium],[".$max_1300.", large],[".$max_2600.", xlarge]";
    $src = "[".$small.", small],[".$medium.", medium]";
    return "data-interchange=\"".$src."\"";
  }
}