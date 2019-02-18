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
  <article class="node blog teaser contextual-links-region clearfix">

    <div class="meta alter clearfix">
      <?php if (!empty($content['links'])): ?>
        <?php print render($content['links']); ?>
      <?php endif; ?>
    </div>
     
    <div class="content clearfix">
      <header>
        <?php if ($display_submitted): ?>
          <?php print $user_picture; ?>           
        <?php endif; ?>
        <div class="date">
          <span class="author"><?php print $name; ?></span> • 
          <span class="month"><?php print date("F d", $created);?></span> •
          <span class="year"><?php print date("Y", $created);?></span>
        </div>
        <?php print render($title_prefix); ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php print render($title_suffix); ?>
      </header>
      
      <div class="image-default">
        <?php if (!empty($content['field_image'])): ?>
          <?php print render($content['field_image']); ?>
        <?php endif; ?>
      </div>                  
      <?php
        hide($content['field_tags']); 
        hide($content['field_image']); 
        hide($content['links']);
        hide($content['addtoany']);
        print render($content);
      ?>
      <div class="more-link"><?php print l(t('Continue reading ...'), 'node/'.$nid, array('html' => TRUE)); ?></div>
    </div>
  </article>
<?php endif; ?>
          
<?php if ($page): ?>
  <article class="node blog full clearfix">
    
    <div class="meta alter">
      <?php if ($display_submitted): ?>
        <?php print $user_picture; ?>
      <?php endif; ?>
      <?php if (!empty($content['links'])): ?>
        <?php print render($content['links']); ?>
      <?php endif; ?>
      <?php if (!empty($content['field_tags'])): ?>
      <div class="terms"><span class="fa fa-tags"></span> <?php print t("Tags: ").render($content['field_tags']); ?></div>
      <?php endif; ?>
    </div>

    <div class="content clearfix">
      <header>
        <div class="comment-count">
          <?php if (($node->comment_count==0)||($node->comment_count==1)): ?>
            <?php print $node->comment_count." comment"; ?>
          <?php else: ?>
            <?php print $node->comment_count." comments"; ?>
          <?php endif; ?>
        </div>
        <div class="date">
          <span class="author"><?php print $name; ?></span> • 
          <span class="month"><?php print date("F d", $created);?></span> •
          <span class="year"><?php print date("Y", $created);?></span>
        </div>
        <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
        <div class="meta">
          <?php if ($display_submitted): ?>
            <?php print $user_picture; ?>
          <?php endif; ?>
          <?php if (!empty($content['addtoany'])): ?>
            <div id="share">
                <?php print render($content['addtoany']); ?>
            </div>
          <?php endif; ?>
          <?php if (!empty($content['links'])): ?>
            <?php print render($content['links']); ?>
          <?php endif; ?>
          <?php if (!empty($content['field_tags'])): ?>
          <div class="terms"><span class="fa fa-tags"></span> <?php print t("Tags: ").render($content['field_tags']); ?></div>
          <?php endif; ?>
        </div>      
      </header>     

      <div class="image-default">
        <?php if (!empty($content['field_image'])): ?>
          <?php print render($content['field_image']); ?>
        <?php endif; ?>
      </div>    
      
      <?php
        hide($content['field_tags']); 
        hide($content['field_image']); 
        hide($content['comments']);
        hide($content['links']);
        hide($content['addtoany']);
        print render($content);
      ?>
    </div>
  </article>
  <?php print render($content['comments']); ?>
<?php endif; ?>