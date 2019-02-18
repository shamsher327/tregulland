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

<?php $items = count($rows); ?>

<?php if ($items >= 3): ?>
  <div class="row clearfix"> 

    <?php if (!empty($title)): ?>
      <header><?php print $title; ?></header>
    <?php endif; ?>    

    <?php $counter = 0; ?>
    <?php $column_one = ''; ?>
    <?php $column_two = ''; ?>
    <?php $column_three = ''; ?>

    <?php

      switch ($items){

        case 3:

          foreach ($rows as $id => $row) {

            $row = remove_image($row, 'thumbnail');

            if ($counter==0) {
              $column_one = "<li class=\"item-default clearfix\">".$row."</li>";
            }

            if ($counter==1) {
              $column_two = "<li class=\"item-default clearfix\">".$row."</li>";
            }

            if ($counter==2) {
              $column_three = "<li class=\"item-default clearfix\">".$row."</li>";
            }

            $counter ++;
          }

        break;

        case 4:

          foreach ($rows as $id => $row) {

            if ($counter==3) {         
              $row = remove_image($row, 'default');
            } else {
              $row = remove_image($row, 'thumbnail');
            }

            if ($counter==0) {
              $column_one = "<li class=\"item-default clearfix\">".$row."</li>";
            }

            if ($counter==1) {
              $column_two = "<li class=\"item-default clearfix\">".$row."</li>";
            }

            if ($counter==2) {
              $column_three = "<li class=\"item-compact clearfix\">".$row."</li>";
            }

            if ($counter==3) {
              $column_three = $column_three."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }  

            $counter ++;
          }

        break;

        case 5:

          foreach ($rows as $id => $row) {

            if ($counter==0 || $counter==1) {         
              $row = remove_image($row, 'thumbnail');
            } else {
              $row = remove_image($row, 'default');
            }

            if ($counter==0) {
              $column_one = "<li class=\"item-default clearfix\">".$row."</li>";
            }

            if ($counter==1) {
              $column_two = "<li class=\"item-default clearfix\">".$row."</li>";
            }

            if ($counter==2) {
              $column_three = "<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter==3) {
              $column_three = $column_three."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter==4) {
              $column_three = $column_three."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            $counter ++;
          }

        break;

        case 6:

          foreach ($rows as $id => $row) {        

            if ($counter==0 || $counter==5) {         
              $row = remove_image($row, 'thumbnail');
            } else {
              $row = remove_image($row, 'default');
            }

            if ($counter==0) {
              $column_one = "<li class=\"item-default clearfix\">".$row."</li>";
            }

            if ($counter==1) {
              $column_two = "<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter==2) {
              $column_two = $column_two."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter==3) {
              $column_two = $column_two."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter==4) {
              $column_three = "<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter==5) {
              $column_three = $column_three."<li class=\"item-compact clearfix\">".$row."</li>";
            }

            $counter ++;
          }

        break;

        case 7:

          foreach ($rows as $id => $row) {

            if ($counter==0 || $counter==6 ) {         
              $row = remove_image($row, 'thumbnail');
            } else {
              $row = remove_image($row, 'default');
            }

            if ($counter==0) {
              $column_one = "<li class=\"item-compact clearfix\">".$row."</li>";
            }

            if ($counter==1) {
              $column_one = $column_one."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter>=2 && $counter<=4) {
              $column_two = $column_two."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter==5) {
              $column_three = "<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter==6) {
              $column_three = $column_three."<li class=\"item-compact clearfix\">".$row."</li>";
            }

            $counter ++;
          }

        break;

        case 8:

          foreach ($rows as $id => $row) {

            if ($counter==0 ) {         
              $row = remove_image($row, 'thumbnail');
              $column_one = $column_one."<li class=\"item-compact clearfix\">".$row."</li>";
            } else {
              $row = remove_image($row, 'default');
            }

            if ($counter==1) {
              $column_one = $column_one."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter>=2 && $counter<=4) {
              $column_two = $column_two."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter>=5) {
              $column_three = $column_three."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            $counter ++;
          }    

        break;

        case 9:

          foreach ($rows as $id => $row) {

            $row = remove_image($row, 'default');

            if ($counter<=2) {
              $column_one = $column_one."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter>=3 && $counter<=5) {
              $column_two = $column_two."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter>=6) {
              $column_three = $column_three."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            $counter ++;
          }

        break;

        default:

          foreach ($rows as $id => $row) {

            $row = remove_image($row, 'default');

            if ($counter<=2) {
              $column_one = $column_one."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter>=3 && $counter<=5) {
              $column_two = $column_two."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            if ($counter>=6 && $counter<=8 ) {
              $column_three = $column_three."<li class=\"item-thumbnail clearfix\">".$row."</li>";
            }

            $counter ++;
          }

        break;
      }

      print "<div class=\"column first\"><ul class=\"no-bullet\">".$column_one."</ul></div>";
      print "<div class=\"column second\"><ul class=\"no-bullet\">".$column_two."</ul></div>";
      print "<div class=\"column last\"><ul class=\"no-bullet\">".$column_three."</ul></div>";

    ?>

  </div>
<?php endif; ?> 