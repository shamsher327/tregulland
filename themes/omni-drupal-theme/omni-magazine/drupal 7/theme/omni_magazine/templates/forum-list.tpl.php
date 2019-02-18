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
  $forum_only = true;
?>
<?php foreach ($forums as $child_id => $forum): ?>
  <?php if ($forum->is_container): ?>      
  <?php $forum_only = false; ?>
  <?php endif; ?>
<?php endforeach; ?>

<table id="forum-overview">
  <colgroup>
    <col style="width: 65%">
    <col style="width: 15%">
    <col style="width: 10%">
    <col style="width: 10%">
  </colgroup>
  <thead>
    <tr <?php print $forum_only==true ? 'class="forum-only odd"' : ''; ?>>
      <th><?php print t('Forum'); ?></th>
      <th class="last-reply"><?php print t('Last post'); ?></th>
      <th><?php print t('Topics');?></th>
      <th><?php print t('Posts'); ?></th>      
    </tr>
  </thead>
  <tbody>

  <?php foreach ($forums as $child_id => $forum): ?>
    <tr id="forum-list-<?php print $child_id; ?>" class="<?php print $forum_only==true ? 'forum-only ' : ''; ?><?php print $forum->zebra; ?>">
      <?php if ($forum->is_container): ?>
        <td class="container<?php print $forum->depth>0 ? ' indent indent-'.$forum->depth : ''; ?>" colspan="4">    
          <div>          
            <div class="name"><span class="fa<?php print $forum->depth>0 ? ' fa-arrow-circle-o-right' : ' fa-arrow-circle-o-down'; ?>"></span><a href="<?php print $forum->link; ?>"><?php print $forum->name; ?></a></div>
            <?php if ($forum->description): ?>
              <div class="description"><em><?php print $forum->description; ?></em></div>
            <?php endif; ?>
          </div>
        </td>
      <?php else: ?>
        <td class="forum<?php print $forum->depth>0 ? ' indent indent-'.$forum->depth : ''; ?>">  
          <div>          
            <div class="name"><span class="fa <?php print $forum->new_topics == TRUE ? 'fa-folder-open' : 'fa-folder-open-o'; ?>"></span><a href="<?php print $forum->link; ?>"><?php print $forum->name; ?></a></div>
            <?php if ($forum->description): ?>
              <div class="description"><em><?php print $forum->description; ?></em></div>
            <?php endif; ?>
          </div>
        </td>
        <td class="last-reply"><?php print $forum->last_reply ?></td>
        <td class="topics">
          <?php print $forum->num_topics ?>
          <?php if ($forum->new_topics): ?>
            <br />
            <a href="<?php print $forum->new_url; ?>"><?php print $forum->new_text; ?></a>
          <?php endif; ?>
        </td>
        <td class="posts"><?php print $forum->num_posts ?></td>
      <?php endif; ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
