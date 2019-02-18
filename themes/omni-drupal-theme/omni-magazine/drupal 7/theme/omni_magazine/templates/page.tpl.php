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

<div id="page">  
  <header id="main-header" class="<?php print theme_get_setting('omni_header'); ?>">
    <?php if ($secondary_menu || $page['social_media']): ?>
      <nav id="menu-secondary">
        <div class="inner wrapper clearfix">           
          <div id="sign">
            <?php if($logged_in == true): ?>
              <a class="sign-out" title="Sign Out" href="<?php print base_path(); ?>user/logout"><span class="fa fa-sign-out"></span></a>
            <?php else: ?>
              <a class="sign-in" title="Sign In" href="<?php print base_path(); ?>user"><span class="fa fa-user"></span></a>          
              <a class="sign-up" title="Sign Up" href="<?php print base_path(); ?>user/register"><span class="fa fa-pencil"></span></a>  
            <?php endif ?>        
          </div>         
          <?php print $secondary_menu; ?>    
          <div id="social-media">
            <?php print render($page['social_media']); ?>
          </div>
        </div>
      </nav> 
    <?php endif; ?>
    <div id="header">
      <div class="inner wrapper clearfix">
        <div id="site-info">           
          <?php if ($logo): ?>
            <div id="logo">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/></a>
            </div>
          <?php endif; ?>
          <?php if ($site_name): ?>  
            <div id="site-name">
              <h1><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></h1>		  	        
            </div>
          <?php endif; ?> 
          <?php if ($site_slogan): ?>  
            <div id="site-slogan">
              <?php print $site_slogan; ?>
            </div>
          <?php endif; ?>
        </div>        
        <?php if (theme_get_setting('omni_header')=='compact-width'): ?>
          <?php if ($page['main_menu']): ?>
            <nav id="menu-primary" class="<?php print theme_get_setting('omni_menu'); ?>">
              <div class="inner clearfix">
                <?php if (theme_get_setting('omni_menu')=='mega-style'): ?>
                  <a href="#" class="menu-button mega collapsed"><span class="fa fa-bars"></span></a>
                <?php else: ?>
                  <a href="#" class="menu-button list collapsed"><span class="fa fa-bars"></span></a>                  
                <?php endif ?>                
                <?php print render($page['main_menu']); ?>
                <?php if($page['search']): ?>          
                  <?php print render($page['search']); ?>
                <?php endif ?>
              </div>
            </nav>
          <?php endif ?>
        <?php else: ?>         
          <?php if (theme_get_setting('omni_header_search')=='yes'): ?>
            <div id="header-left" class="with-search">
              <?php print $header_search; ?>
            </div>    
          <?php else: ?>
            <div id="header-left">
              <?php if ($page['header_left']): ?>              
                <?php print render($page['header_left']); ?>                  
              <?php endif; ?>
            </div>
          <?php endif; ?>         
          <div id="header-right">
            <?php if ($page['header_right']): ?>
              <?php print render($page['header_right']); ?>
            <?php endif; ?>
          </div>        
        <?php endif; ?> 
      </div>
    </div>
    <?php if ((theme_get_setting('omni_header')!='compact-width')&&($page['main_menu'])): ?>
       <nav id="menu-primary" class="<?php print theme_get_setting('omni_menu'); ?>">
        <div class="inner wrapper clearfix">
          <?php if (theme_get_setting('omni_menu')=='mega-style'): ?>
            <a href="#" class="menu-button mega collapsed"><span class="fa fa-bars"></span></a>
          <?php else: ?>
            <a href="#" class="menu-button list collapsed"><span class="fa fa-bars"></span></a>                  
          <?php endif ?>
          <?php print render($page['main_menu']); ?>
          <?php if($page['search']): ?>       
            <?php print render($page['search']); ?>
          <?php endif ?>
        </div>
      </nav>
    <?php endif; ?>
  </header> 

  <div id="main">
    <div class="inner wrapper clearfix">
      <?php if ($main_edge >=1): ?>
        <div id="main-edge" class="col-<?php print $main_edge; ?>">
          <div class="inner clearfix">
            <?php if ($page['quick_link']): ?>
              <div id="quick-link">
                <?php print render($page['quick_link']); ?>
              </div>
            <?php endif; ?> 
            <?php if ($page['newsflash']): ?>
              <div id="newsflash">
                <?php print render($page['newsflash']); ?>
              </div>
            <?php endif; ?>  
          </div>
        </div>
      <?php endif; ?> 
      <?php if ($page['showcase_main']): ?>
        <div id="main-showcase">
          <?php print render($page['showcase_main']); ?>
        </div>
      <?php endif; ?>  
      <?php if ($main_top >=1): ?>
        <div id="main-top" class="col-<?php print $main_top; ?>">
          <div class="inner container clearfix">
            <?php if ($page['main_top_one']): ?>
              <div class="column">
                <?php print render($page['main_top_one']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['main_top_two']): ?>
              <div class="column">
                <?php print render($page['main_top_two']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['main_top_three']): ?>
              <div class="column">
                <?php print render($page['main_top_three']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['main_top_four']): ?>
              <div class="column">
                <?php print render($page['main_top_four']); ?>
              </div>
            <?php endif; ?>
          </div>
        </div> 
      <?php endif; ?>      
      
      <div id="main-middle" class="<?php print theme_get_setting('omni_layout'); ?>">
        <div class="inner container clearfix">
          <div id="primary-secondary" class="clearfix">
            <?php if ($page['showcase_spotlight'] || $spotlight >=1): ?>
              <div id="spotlight">
                <?php if ($page['showcase_spotlight']): ?>
                  <div id="spotlight-showcase">              
                    <?php print render($page['showcase_spotlight']); ?>              
                  </div>
                <?php endif; ?>

                <?php if ($spotlight >=1): ?>
                  <div id="spotlight-bottom" class="col-<?php print $spotlight; ?>">
                    <div class="inner container clearfix">
                      <?php if ($page['spotlight_one']): ?>
                        <div class="column">
                          <?php print render($page['spotlight_one']); ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($page['spotlight_two']): ?>
                        <div class="column">
                          <?php print render($page['spotlight_two']); ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($page['spotlight_three']): ?>
                        <div class="column">
                          <?php print render($page['spotlight_three']); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div> 
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div id="primary">
              <?php if (theme_get_setting('omni_breadcrumb')=='yes'): ?>
                <div id="breadcrumb"><?php print $breadcrumb; ?></div>
              <?php endif; ?>
              <?php if ($page['showcase_content']): ?>
                <div id="content-showcase">
                  <?php print render($page['showcase_content']); ?>
                </div>
              <?php endif; ?>

              <?php if ($content_top >=1): ?>
                <div id="content-top" class="col-<?php print $content_top; ?>">
                  <div class="inner container clearfix">
                    <?php if ($page['content_top_left']): ?>
                      <div class="column">
                        <?php print render($page['content_top_left']); ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($page['content_top_right']): ?>
                      <div class="column">
                        <?php print render($page['content_top_right']); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div> 
              <?php endif; ?>

              <div id="content" class="clearfix">
                <?php if ($title || $tabs || $help || $messages): ?>
                  <header id="content-header">
                    <?php if ($action_links): ?>
                      <ul class="action-links"><?php print render($action_links); ?></ul>
                    <?php endif; ?>
                    <?php
                      if ($title) {
                        if (isset($node)) {
                          if (($node->type != 'article')&&($node->type != 'blog')) {
                              print "<h1 class=\"title\">".$title."</h1>";
                          }
                        } else {
                          print "<h1 class=\"title\">".$title."</h1>";
                        }
                      }
                    ?> 
                    <?php print $messages; ?>
                    <?php if ($tabs): ?>
                      <div class="tabs"><?php print render($tabs); ?></div>
                    <?php endif; ?>
                    <?php print render($page['help']); ?>
                  </header>
                <?php endif; ?>
                <?php print render($page['content']); ?>
              </div>

              <?php if ($content_bottom >=1): ?>
                <div id="content-bottom" class="col-<?php print $content_bottom; ?>">
                  <div class="inner container clearfix">
                    <?php if ($page['content_bottom_left']): ?>
                      <div class="column">
                        <?php print render($page['content_bottom_left']); ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($page['content_bottom_right']): ?>
                      <div class="column">
                        <?php print render($page['content_bottom_right']); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div> 
              <?php endif; ?>                
            </div>                        
            <?php if ($page['sidebar_right']): ?>
              <div id="secondary" class="sidebar">
                <?php print render($page['sidebar_right']); ?>
              </div>
            <?php endif; ?>
          </div>
          <?php if ($page['sidebar_left']): ?>
            <div id="tertiary" class="sidebar">
              <?php print render($page['sidebar_left']); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php if ($main_bottom >=1): ?>
        <div id="main-bottom" class="col-<?php print $main_bottom; ?>">
          <div class="inner container clearfix">
            <?php if ($page['main_bottom_one']): ?>
              <div class="column">
                <?php print render($page['main_bottom_one']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['main_bottom_two']): ?>
              <div class="column">
                <?php print render($page['main_bottom_two']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['main_bottom_three']): ?>
              <div class="column">
                <?php print render($page['main_bottom_three']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['main_bottom_four']): ?>
              <div class="column">
                <?php print render($page['main_bottom_four']); ?>
              </div>
            <?php endif; ?>
          </div>
        </div> 
      <?php endif; ?>
    </div>
  </div> 
  
  <footer id="main-footer">
    <?php if ($footer >=1): ?>
      <div class="inner wrapper">      
        <div id="footer" class="col-<?php print $footer; ?>"> 
          <div class="inner container clearfix">
            <?php if ($page['footer_one']): ?>
              <div class="column">
                <?php print render($page['footer_one']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['footer_two']): ?>
              <div class="column">
                <?php print render($page['footer_two']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['footer_three']): ?>
              <div class="column">
                <?php print render($page['footer_three']); ?>
              </div>
            <?php endif; ?>
            <?php if ($page['footer_four']): ?>
              <div class="column">
                <?php print render($page['footer_four']); ?>
              </div>
            <?php endif; ?>  
          </div>
        </div>      
      </div>
    <?php endif; ?>
    <div id="closure">
      <div class="inner wrapper clearfix">
        <div id="design-by">
          <small><a href="http://www.esors.com" title="Drupal theme">Drupal theme by esors</a></small>
        </div>
        <?php print render($page['closure']); ?>
      </div>
    </div>
  </footer>
</div>
