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
  $showcase_type = $wrapper->field_showcase_type->value();  
  $url = $wrapper->field_link_url->value();
  $link_by = $wrapper->field_link_by->value();
 ?>
 
<?php if (!empty($showcase_type)): ?>
  <?php if ($showcase_type=='highlight'): ?>
    <?php
      $background_image = $wrapper->field_image->value();  
      $background_image = "background-image: url(".file_create_url($background_image['uri']).");";
    ?>
    <li style="<?php print $background_image; ?>">      
      <div class="content">
        <div class="meta">
          <?php if (!empty($content['field_section'])): ?>
            <?php print render($content['field_section']); ?>
            <span class="author with-section"><?php print '<em>'.t('By').'</em> <span class="name">'.$name.'</span>'; ?></span>
          <?php else: ?>
            <span class="author"><?php print '<em>'.t('By').'</em> <span class="name">'.$name.'</span>'; ?></span>
          <?php endif; ?>
          <span class="date"><em><?php print date("M d, Y", $created);?></em></span>                   
        </div>

        <?php if (in_array('title', $link_by) && !empty($url)): ?>
          <h4 class="title"><a href="<?php print $url; ?>" target="_blank"><?php print $title; ?></a></h4>
        <?php else: ?>
          <h4 class="title"><?php print $title; ?></h4>
        <?php endif; ?>        
      
        <a class="link" href="<?php print $url; ?>" target="_blank"></a>
      </div>
    </li>
  <?php elseif ($showcase_type=='newsflash'): ?>
    <div>
      <div class="slide clearfix">  
        <div class="content">
          <div class="inner clearfix">
            <div class="meta">
              <?php if (!empty($content['field_section'])): ?>                
                <?php print render($content['field_section']); ?>                
              <?php endif; ?>
              <span class="date"><?php print date("M d, Y", $created);?></span>
              <span class="author"> / <?php print $name; ?> - </span>                                 
            </div>
            <?php if (in_array('title', $link_by) && !empty($url)): ?>
              <h4 class="title"><a href="<?php print $url; ?>" target="_blank"><?php print $title; ?></a></h4>
            <?php else: ?>
              <h4 class="title"><?php print $title; ?></h4>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php elseif ($showcase_type=='gallery'): ?>
    <div>
      <div class="slide clearfix">        
        <?php if (!empty($content['field_image'])): ?>
          <div class="image-default">
            <?php if (in_array('image', $link_by) && !empty($url)): ?>
              <a href="<?php print $url; ?>" target="_blank"><?php print render($content['field_image']); ?></a>
            <?php else: ?>
              <?php print render($content['field_image']); ?>
            <?php endif; ?>        
          </div>
        <?php endif; ?>       
        
        <div class="content">
          <div class="meta">
            <?php if (!empty($content['field_section'])): ?>
              <?php print render($content['field_section']); ?>            
            <?php endif; ?>
            <span class="author"><?php print '<em>'.t('By').'</em> <span class="name">'.$name.'</span>'; ?></span>
            <span class="date"><em><?php print date("n/j/y", $created);?></em></span>
          </div>

          <?php if (in_array('title', $link_by) && !empty($url)): ?>
            <h4 class="title"><a href="<?php print $url; ?>" target="_blank"><?php print $title; ?></a></h4>
          <?php else: ?>
            <h4 class="title"><?php print $title; ?></h4>
          <?php endif; ?>
          <a class="link" href="<?php print $url; ?>" target="_blank"></a>
        </div>        
      </div>
    </div>
  <?php else: ?>
    <div>
      <div class="slide clearfix">        
        <?php if (!empty($content['field_image'])): ?>
          <div class="image-default">
            <?php if (in_array('image', $link_by) && !empty($url)): ?>
              <a href="<?php print $url; ?>" target="_blank"><?php print render($content['field_image']); ?></a>
            <?php else: ?>
              <?php print render($content['field_image']); ?>
            <?php endif; ?>        
          </div>
        <?php endif; ?>

        <div class="content">
          <div class="inner clearfix">
            <div class="meta">
              <?php if (!empty($content['field_section'])): ?>                
                <?php print render($content['field_section']); ?>                
              <?php endif; ?>
              <span class="author"><?php print t('By ').$name; ?> / </span>
              <span class="date"><?php print date("M d, Y", $created);?></span>                   
            </div>

            <?php if (in_array('title', $link_by) && !empty($url)): ?>
              <h4 class="title"><a href="<?php print $url; ?>" target="_blank"><?php print $title; ?></a></h4>
            <?php else: ?>
              <h4 class="title"><?php print $title; ?></h4>
            <?php endif; ?>

            <?php if (!empty($content['field_caption'])): ?>
              <div class="caption">
                <?php print render($content['field_caption']); ?>
              </div>
            <?php endif; ?>  
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php else: ?>
  <div>
    <div class="slide">
      <div class="inner clearfix">        
  
        <?php if (!empty($content['field_image'])): ?>
          <div class="image-default">
            <?php if (in_array('image', $link_by) && !empty($url)): ?>
              <a href="<?php print $url; ?>" target="_blank"><?php print render($content['field_image']); ?></a>
            <?php else: ?>
              <?php print render($content['field_image']); ?>
            <?php endif; ?>        
          </div>
        <?php endif; ?>

        <div class="content">           
          <?php if (in_array('title', $link_by) && !empty($url)): ?>
            <h4 class="title"><a href="<?php print $url; ?>" target="_blank"><?php print $title; ?></a></h4>
          <?php else: ?>
            <h4 class="title"><?php print $title; ?></h4>
          <?php endif; ?>
          <?php if (!empty($content['field_caption'])): ?>
            <div class="caption">
              <?php print render($content['field_caption']); ?>
            </div>
          <?php endif; ?>
          <div class="meta">
            <span class="author"><?php print $name; ?> / </span>
            <span class="date"><?php print date("M d, Y", $created);?></span>                   
          </div>   
        </div>

        <?php if (!empty($content['field_section'])): ?>
          <?php print render($content['field_section']); ?>          
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>