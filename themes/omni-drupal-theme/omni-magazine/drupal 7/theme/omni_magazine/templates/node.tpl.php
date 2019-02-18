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
  <article class="node basic teaser contextual-links-region clearfix">       
    <header>
      <?php print render($title_prefix); ?>
        <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php print render($title_suffix); ?>
      <?php if ($display_submitted): ?>
        <div class="meta">
          <span class="author"><?php print t('Author: ').$name; ?></span> /
          <span class="date"><?php print t('Date: ').$date; ?></span> 
        </div>
      <?php endif; ?>
    </header>
    
    <div class="content">
      <?php
        hide($content['links']);
        print render($content);
      ?>	    
    </div> 
    <div class="more-link"><?php print l(t('read more ...'), 'node/'.$nid, array('html' => TRUE)); ?></div>
  </article>
<?php else: ?>
  <article class="node basic full clearfix">          

    <div class="content clearfix">
      <?php if (!empty($content['links'])): ?>
        <?php print render($content['links']); ?>
      <?php endif; ?>      
      <?php
        hide($content['comments']);
        hide($content['links']);
        print render($content);
      ?>
    </div>
  </article>
  <?php print render($content['comments']); ?>
<?php endif; ?>