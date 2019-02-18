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

function omni_magazine_preprocess_html(&$vars) {
  
  if ($index = array_search('no-sidebars', $vars['classes_array'])) {
      unset($vars['classes_array'][$index]);
  }

  if (!empty($vars['page']['sidebar_left']) && !empty($vars['page']['sidebar_right'])) {
    $vars['classes_array'][] = 'two-sidebars';
  }
  
  if (empty($vars['page']['sidebar_left']) && empty($vars['page']['sidebar_right'])) {
    $vars['classes_array'][] = 'no-sidebars';
  }
  
  if (!empty($vars['page']['sidebar_left']) && empty($vars['page']['sidebar_right'])) {
    $vars['classes_array'][] = 'sidebar-tertiary';
  }
  
  if (empty($vars['page']['sidebar_left']) && !empty($vars['page']['sidebar_right'])) {
    $vars['classes_array'][] = 'sidebar-secondary';
  }
    
  if (module_exists('views')) {
      
    $view = views_get_page_view();
  
    if (isset($view)) {

      if ($view->name == 'page_block' && (($view->current_display == "page_grid") || ($view->current_display == "page_category"))) {
         $vars['classes_array'][] = 'page-view-page-block';    
      }

      if ($view->name == 'page_block' && ($view->current_display == "page_category_grid")) {
        $vars['classes_array'][] = 'page-view-page-block page-category-grid';      
      }  
    }    
  }
}

function omni_magazine_preprocess_page(&$vars) {
  
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'id' => 'secondary-menu',
      )
    ));
  }
  
  $form = drupal_get_form('search_form');
  $search_form = drupal_render($form);
  
  $vars['header'] = count(array_filter(array($vars['page']['header_left'], $vars['page']['header_right'])));
  $vars['header_search'] = $search_form;  
  $vars['spotlight'] = count(array_filter(array($vars['page']['spotlight_one'], $vars['page']['spotlight_two'], $vars['page']['spotlight_three'])));
  $vars['content_top'] = count(array_filter(array($vars['page']['content_top_left'], $vars['page']['content_top_right'])));
  $vars['content_bottom'] = count(array_filter(array($vars['page']['content_bottom_left'], $vars['page']['content_bottom_right'])));
  $vars['main_edge'] = count(array_filter(array($vars['page']['quick_link'], $vars['page']['newsflash'])));
  $vars['main_top'] = count(array_filter(array($vars['page']['main_top_one'], $vars['page']['main_top_two'], $vars['page']['main_top_three'], $vars['page']['main_top_four'])));
  $vars['main_bottom'] = count(array_filter(array($vars['page']['main_bottom_one'], $vars['page']['main_bottom_two'], $vars['page']['main_bottom_three'], $vars['page']['main_bottom_four'])));
  $vars['footer'] = count(array_filter(array($vars['page']['footer_one'], $vars['page']['footer_two'], $vars['page']['footer_three'], $vars['page']['footer_four'])));
}

function omni_magazine_process_html(&$variables) {
  if (module_exists('color')) {
  _color_html_alter($variables);
  }
}

function omni_magazine_process_page(&$variables) {
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
}

function omni_magazine_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
     unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul>' . drupal_render($element['#below']) . '</ul>';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function omni_magazine_menu_tree__main_menu(&$variables) {
  return '<ul id="primary-list" class="sm collapsed">' . $variables['tree'] . '</ul>';
} 

function omni_magazine_preprocess_node(&$variables) {

  $node = $variables ['node'];
  
  if (module_exists('entity')) {
    
    $wrapper = entity_metadata_wrapper('node', $node);  

    if ($node->type =='block'){

      $tabs = $wrapper->field_block_merging->value();

      if (!empty($tabs)){      

        $tab_list = '';
        $first = true;

        foreach($tabs as $tab){

          if ( $first ) {

            $tab_list = $tab_list.'<li class="active">'.$tab->title.'</li>';
            $first = false;
          } else {            
            $tab_list = $tab_list.'<li>'.$tab->title.'</li>';
          }
        }

        $variables['block_tab_nav'] = '<ul class="tab_nav">'.$tab_list.'</ul>';
      }
    }  

    if ($node->type =='showcase'){

      $data_slick = "";
      $data_slick_pager = "";

      $showcase_type = $wrapper->field_showcase_type->value();
      $effect_fade = $wrapper->field_showcase_fade->value();
      $effect_auto = $wrapper->field_showcase_autoplay->value();
      $effect_speed = $wrapper->field_showcase_autoplay_speed->value();

      if ($effect_fade==true) {
        $data_slick = $data_slick."\"fade\": true, ";
      }

      if ($effect_auto==true) {
        $data_slick = $data_slick."\"autoplay\": true, ";
      }

      if (!empty($effect_speed)) {
        $data_slick = $data_slick."\"autoplaySpeed\": ".$effect_speed.", ";
      }    

      if (($showcase_type=='thumbnail')||($showcase_type=='playlist')||($showcase_type=='gallery')) {
        $image_show = $wrapper->field_showcase_show->value();
        $image_scroll  = $wrapper->field_showcase_scroll->value();

        $data_slick_pager = "\"slidesToShow\": ".$image_show.", ";
        $data_slick_pager = $data_slick_pager."\"slidesToScroll\": ".$image_scroll.", ";

        $variables['data_slick_pager'] = " data-slick='{".substr($data_slick_pager, 0, -2)."}'";
      }

      if ($showcase_type=='gallery') {
        if ($image_show > 3) {
          $data_slick = $data_slick.$data_slick_pager."\"responsive\": [{ \"breakpoint\": 1439, \"settings\": { \"slidesToShow\":".($image_show-1).", \"slidesToScroll\": 1 }}, { \"breakpoint\": 1199, \"settings\": { \"slidesToShow\": ".($image_show-2)." }}, { \"breakpoint\": 1024, \"settings\": { \"slidesToShow\": 2}}, { \"breakpoint\": 640, \"settings\": { \"slidesToShow\": 1}}]";
        } elseif ($image_show == 3) {
          $data_slick = $data_slick.$data_slick_pager."\"responsive\": [{ \"breakpoint\": 1439, \"settings\": { \"slidesToShow\": 2, \"slidesToScroll\": 1 }}, { \"breakpoint\": 640, \"settings\": { \"slidesToShow\": 1}}]";
        } elseif ($image_show == 2) {
          $data_slick = $data_slick.$data_slick_pager."\"responsive\": [{ \"breakpoint\": 640, \"settings\": { \"slidesToShow\": 1}}]";
        } else {
          $data_slick = substr($data_slick.$data_slick_pager, 0, -2);
        }

        $variables['data_slick'] = " data-slick='{".$data_slick."}'";      

      } else {
        $variables['data_slick'] = " data-slick='{".substr($data_slick, 0, -2)."}'";
      }       
    }  
  }  
}

function omni_magazine_preprocess_comment(&$variables) {  

  if (isset($variables['content']['links']['comment']['#links']['comment-delete'])) {
    $title_delete = $variables['content']['links']['comment']['#links']['comment-delete']['title'];
    $variables['content']['links']['comment']['#links']['comment-delete']['title'] ='<span class="fa fa-times"></span>';
    $variables['content']['links']['comment']['#links']['comment-delete']['attributes']['title'] = $title_delete;
  }
  
  if (isset($variables['content']['links']['comment']['#links']['comment-edit'])) {
    $title_edit = $variables['content']['links']['comment']['#links']['comment-edit']['title'];
    $variables['content']['links']['comment']['#links']['comment-edit']['title'] ='<span class="fa fa-pencil"></span>';
    $variables['content']['links']['comment']['#links']['comment-edit']['attributes']['title'] = $title_edit;
  }
  
  if (isset($variables['content']['links']['comment']['#links']['comment-reply'])) {
    $title_reply = $variables['content']['links']['comment']['#links']['comment-reply']['title'];
    $variables['content']['links']['comment']['#links']['comment-reply']['title'] ='<span class="fa fa-reply"></span>';
    $variables['content']['links']['comment']['#links']['comment-reply']['attributes']['title'] = $title_reply;
  }
  
  if (isset($variables['content']['links']['comment']['#links']['comment-approve'])) {
    $title_approve = $variables['content']['links']['comment']['#links']['comment-approve']['title'];
    $variables['content']['links']['comment']['#links']['comment-approve']['title'] ='<span class="fa fa-check"></span>';
    $variables['content']['links']['comment']['#links']['comment-approve']['attributes']['title'] = $title_approve;
  }  
}

function omni_magazine_field__field_block_merging($variables) {
  $output = '';

  foreach ($variables ['items'] as $delta => $item) {

    if ($delta == 0) {
      $output .= '<li class="active">' . drupal_render($item) . '</li>';
    } else {
      $output .= '<li>' . drupal_render($item) . '</li>';
    }
  }
 
  return $output;
}

function omni_magazine_form_alter(&$form, &$form_state, $form_id) {
  
  if ($form_id == 'search_block_form') {
    
    $form['#attributes']['class'][] = 'search-form'; 

    $form['search_block_form']['#title'] = '<span class="fa fa-search"></span>';
    $form['search_block_form']['#title_display'] = 'before';
    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
    $form['actions']['submit']['#value'] = t('');
  }
  
  if ($form_id == 'search_form') {  
    $form['basic']['keys']['#title'] = '<span class="fa fa-search"></span>';
    $form['basic']['keys']['#attributes']['placeholder'] = t('Search...');
    $form['basic']['submit']['#value'] = t('');
  }
}

function omni_magazine_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
    return $output;
  }
}

function remove_image($str, $type) {
  
  if ($type=='thumbnail'){
    $pos = strpos($str, '<div class="image-thumbnail">');      
  }
  
  if ($type=='default'){
    $pos = strpos($str, '<div class="image-default">');      
  }
  
  if ($pos != false) {
    $start = $pos;
    $end = strpos($str, '</div>', $start) + 6;
    return substr_replace($str,'', $start, $end - $start);
  }  else {
    return '<div class="no-image">'.$str.'</div>';
  }
}

function remove_image_alter($str, $type) {
  
  $image_default = strpos($str, '<div class="image-default">');
  $image_thumbnail = strpos($str, '<div class="image-thumbnail">'); 
  
  if ($type=='thumbnail') {   
    
    if ($image_thumbnail != false) {
      $start = $image_thumbnail;
      $end = strpos($str, '</div>', $start) + 6;
      $str = substr_replace($str,'', $start, $end - $start);
    } 
      
    if ($image_default != false ){
      $pos = strpos($str, '<div class="image-default"></div>'); 
      
      if ($pos != false) {
        $str = str_replace('<div class="image-default"></div>','',$str);
        return '<div class="no-image">'.$str.'</div>';
      } else {
        return $str;
      }     
    } else {
      return '<div class="no-image">'.$str.'</div>';
    }     
  }
  
  if ($type=='default') {   
    
    if ($image_default != false) {
      $start = $image_default;
      $end = strpos($str, '</div>', $start) + 6;
      $str = substr_replace($str,'', $start, $end - $start); 
    }     
    
    if ($image_thumbnail != false ){
      $pos = strpos($str, '<div class="image-thumbnail"></div>'); 
      
      if ($pos != false) {
        $str = str_replace('<div class="image-thumbnail"></div>','',$str);
        return '<div class="no-image">'.$str.'</div>';
      } else {
        return $str;
      }       
    } else {
      return '<div class="disable-image">'.$str.'</div>';
    }
  }
} 

function omni_magazine_comment_post_forbidden($variables) {
  $node = $variables ['node'];
  global $user;

  $authenticated_post_comments = &drupal_static(__FUNCTION__, NULL);

  if (!$user->uid) {
    if (!isset($authenticated_post_comments)) {
      $comment_roles = user_roles(TRUE, 'post comments');
      $authenticated_post_comments = isset($comment_roles [DRUPAL_AUTHENTICATED_RID]);
    }

    if ($authenticated_post_comments) {

      if (variable_get('comment_form_location_' . $node->type, COMMENT_FORM_BELOW) == COMMENT_FORM_SEPARATE_PAGE) {
        $destination = array('destination' => "comment/reply/$node->nid#comment-form");
      }
      else {
        $destination = array('destination' => "node/$node->nid#comment-form");
      }

      if (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL)) {
        return t('<a href="@login"><span class="login">Log in to post comments</span><span class="fa fa-reply"></span></a> ', array('@login' => url('user/login', array('query' => $destination))));
      }
      else {
        return t('<a href="@login">Log in to post comments</a>', array('@login' => url('user/login', array('query' => $destination))));
      }
    }
  }
}
