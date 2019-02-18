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

<table id="forum-topic">
  <colgroup>
    <col style="width: 0">
    <col style="width: 60%">
    <col style="width: 20%">
    <col style="width: 20%">
  </colgroup>
  <thead>
    <tr><?php print $header; ?></tr>
  </thead>
  <tbody>
  <?php foreach ($topics as $topic): ?>
    <tr class="<?php print $topic->zebra;?>">
      <td class="topic" colspan="2">
        <div class="title">
          <?php print $topic->icon; ?>
          <?php print $topic->title; ?>
        </div>
        <?php print $topic->created; ?>        
      </td>
    <?php if ($topic->moved): ?>
      <td colspan="2"><?php print $topic->message; ?></td>
    <?php else: ?>
      <td class="replies">
        <?php print $topic->comment_count; ?>
        <?php if ($topic->new_replies): ?>
          <br />
          <a href="<?php print $topic->new_url; ?>"><?php print $topic->new_text; ?></a>
        <?php endif; ?>
      </td>
      <td class="last-reply"><?php print $topic->last_reply; ?></td>
    <?php endif; ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php print $pager; ?>
