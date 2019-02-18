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
  $wrapper = entity_metadata_wrapper('node', $node);
  $title_display = $wrapper->field_title_display->value();
?>

<?php if (empty($content['field_block_merging'])): ?>
  <?php 
    $title_align = $wrapper->field_title_align->value();
    $title_location = $wrapper->field_title_location->value();  
    $title_color = $wrapper->field_title_color->value();
    $title_border = $wrapper->field_title_border->value();
    $image_align = $wrapper->field_image_align->value();
    $body_text_color = $wrapper->field_block_body_text_color->value();
    $body_bg_color = $wrapper->field_block_body_bg_color->value();
    $body_transparent = $wrapper->field_block_body_transparent->value();
    $url = $wrapper->field_url->value();
  
    if (!empty($url)) {
      $link_by = $wrapper->field_block_link_by->value();
      $link_text = $wrapper->field_block_link_text->value();            
      $link_icon = $wrapper->field_block_link_icon->value();
      $link_icon_pos = $wrapper->field_block_link_icon_pos->value();
      
      if (!empty($link_text)) {
        if (!empty($link_icon)) {
          if ($link_icon_pos == 'before') {
            $link_text = "<span class=\"".$link_icon." before\"></span> ".$link_text;
          } else {
            $link_text = $link_text." <span class=\"".$link_icon." after\"></span>";
          }
        }  
      } else {
        if (!empty($link_icon)) {
          if ($link_icon_pos == 'before') {
            $link_text = "<span class=\"".$link_icon." before\"></span> read more";
          } else {
            $link_text = "read more <span class=\"".$link_icon." after\"></span>";
          }
        } else {
          $link_text = "read more";
        }        
      }
    }

    if (!empty($title_color)) {
      $title_color = "color:#".$title_color.";"."border-color:#".$title_color.";";
    }
    if (!empty($body_text_color)) {
      $body_text_color = "color:#".$body_text_color.";";
    }
    if (!empty($body_bg_color)) {
      $body_bg_color = "background-color:#".$body_bg_color.";";
    }
  ?>

  <div id="block-node-<?php print $node->nid; ?>" class="block<?php print $body_transparent==true?" no-bg-color":""; ?> contextual-links-region clearfix"<?php print $attributes; ?>>
    <?php if (($title_display =='show')&&($title_location == 0)): ?>
      <?php print render($title_prefix); ?>
      <h3 class="title<?php print ' text-'.$title_align;?><?php print $title_border==true?" with-border":"";?>" style="<?php print $title_color; ?>"<?php print $title_attributes; ?>>
        <?php print $title; ?>
      </h3>
      <?php print render($title_suffix); ?>
    <?php endif; ?>
    <div class="inner" style="<?php print $body_text_color.$body_bg_color;?>">
      <?php if (($title_display =='show')&&($title_location == 1)): ?>
        <?php print render($title_prefix); ?>
        <h3 class="title<?php print ' text-'.$title_align; ?><?php print $title_border==true?" with-border":"";?>" style="<?php print $title_color; ?>"<?php print $title_attributes; ?>>
          <?php print $title; ?>
        </h3>
        <?php print render($title_suffix); ?>
      <?php endif; ?>

      <?php if (!empty($content['field_image'])): ?>
        <div class="image-<?php print $image_align; ?>">
          <?php if (!empty($url) && in_array('image', $link_by)): ?>
            <a href="<?php print $url; ?>" target="_blank"><?php print render($content['field_image']); ?></a>
          <?php else: ?>
            <?php print render($content['field_image']); ?>
          <?php endif; ?>          
        </div>
      <?php endif; ?>

      <div class="content"<?php print $content_attributes; ?>>        
        <?php 
        hide($content['links']);
        hide($content['field_image']);
        print render($content); 
        ?>
      </div>
       
      <?php if (!empty($url)): ?>
        <?php if (in_array('more_link', $link_by)): ?>
          <a href="<?php print $url; ?>" class="more-link" target="_blank"><?php print $link_text;?></a>
        <?php elseif (in_array('more_button_s1', $link_by)): ?>
          <a href="<?php print $url; ?>" class="button" target="_blank"><?php print $link_text;?></a>
        <?php elseif (in_array('more_button_s2', $link_by)): ?>
          <a href="<?php print $url; ?>" class="button ghost" target="_blank"><?php print $link_text;?></a>
        <?php elseif (in_array('more_button_s3', $link_by)): ?>
          <a href="<?php print $url; ?>" class="button ghost plain"<?php print !empty($body_text_color)?" style=\"".$body_text_color." border-".$body_text_color."\"":"";?> target="_blank"><?php print $link_text;?></a>
        <?php else: ?>  
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
<?php else: ?>
  <?php $mergin_type = $wrapper->field_block_merging_type->value(); ?>  

  <div id="block-node-<?php print $node->nid; ?>" class="block merging contextual-links-region clearfix"<?php print $attributes; ?>>
    <div class="inner">
      <?php if ($title_display =='show'): ?>
        <?php print render($title_prefix); ?>
        <h3 class="title"<?php print $title_attributes; ?>>
          <?php print $title; ?>
        </h3>
        <?php print render($title_suffix); ?>
      <?php endif; ?>
      <?php if ($mergin_type =='accordion'): ?>
        <div class="content accordion-merging"<?php print $content_attributes; ?>>  
          <ul class="accordion">
            <?php print render($content['field_block_merging']); ?>
          </ul>
        </div>
      <?php elseif ($mergin_type =='slider'): ?>
        <div class="slider slider-merging<?php print ($title_display =='show') ? "":" no-title"; ?>">   
          <?php print render($content['field_block_merging']); ?>
        </div>
      <?php elseif ($mergin_type =='tab'): ?>
        <div class="content tab-merging"<?php print $content_attributes; ?>>  
          <?php print $block_tab_nav; ?>
          <ul class="tab_content">
            <?php print render($content['field_block_merging']); ?>
          </ul>
        </div>
      <?php else: ?>
        <div class="content alter-merging"<?php print $content_attributes; ?>>  
          <?php print $block_tab_nav; ?>
          <ul class="tab_content">
            <?php print render($content['field_block_merging']); ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </div>  
<?php endif; ?>