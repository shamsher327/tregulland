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

<?php if ($teaser): ?>
  <article class="node article teaser contextual-links-region clearfix">    
    <?php if (!empty($content['field_section'])): ?>
      <?php print render($content['field_section']); ?>
    <?php endif; ?>
    
    <header>
      <?php print render($title_prefix); ?>
        <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php print render($title_suffix); ?>
      <?php if ($display_submitted): ?>
        <div class="meta">
          <span class="author"><?php print t('Author: ').$name; ?></span> /
          <span class="date"><?php print t('Date: ').$date; ?></span> 
          <?php if (!empty($content['field_tags'])): ?>
            / <span class="terms"><?php print t('Tags: ').render($content['field_tags']); ?></span>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </header>
    
    <?php if (!empty($content['field_image'])): ?>
      <div class="image-default">
        <?php print render($content['field_image']); ?>
      </div>
    <?php endif; ?>  

    <div class="content">
      <?php
        hide($content['field_section']); 
        hide($content['field_tags']); 
        hide($content['field_image']); 
        hide($content['links']);
        hide($content['addtoany']);
        print render($content);
      ?>	    
    </div> 
    <div class="more-link"><?php print l(t('read more ...'), 'node/'.$nid, array('html' => TRUE)); ?></div>
  </article>
<?php else: ?>
  <?php if (!empty($content['addtoany'])): ?>
    <article class="node article full with-share clearfix">
  <?php else: ?>
    <article class="node article full clearfix">
  <?php endif; ?>            
    <header>
      <?php if (!empty($content['field_section'])): ?>
        <?php print render($content['field_section']); ?>
      <?php endif; ?>
      <?php print render($title_prefix); ?>
        <h1 class="title" <?php print $title_attributes; ?>><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>
      <?php if ($display_submitted): ?>
        <div class="meta clearfix">
          <?php print $user_picture; ?>
          <span class="author"><?php print t('Author: ').$name; ?></span> /
          <span class="date"><?php print t('Date: ').$date; ?></span> /
          <?php if (!empty($content['field_tags'])): ?>
          <span class="terms"><?php print t('Tags: ').render($content['field_tags']); ?></span>
          <?php endif; ?>   
        </div>
      <?php endif; ?>   
    </header>
    <?php if (!empty($content['addtoany'])): ?>
      <div id="share">
          <?php print render($content['addtoany']); ?>
      </div>
    <?php endif; ?>
    <div class="content clearfix">
      <?php if (!empty($content['links'])): ?>
        <?php print render($content['links']); ?>
      <?php endif; ?>

      <?php if (!empty($content['field_image'])): ?>
      <div class="image-default"><?php print render($content['field_image']); ?></div>
      <?php endif; ?>
      
      <?php
        hide($content['field_section']);
        hide($content['field_tags']); 
        hide($content['field_image']); 
        hide($content['comments']);
        hide($content['links']);
        print render($content);
      ?>
    </div>
  </article>
  <?php print render($content['comments']); ?>
<?php endif; ?>