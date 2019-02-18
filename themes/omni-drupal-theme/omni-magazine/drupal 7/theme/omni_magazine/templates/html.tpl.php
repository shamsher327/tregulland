<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
  <head>
    <?php print $head; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?php print $head_title; ?></title>  
    <?php print $styles; ?>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
    <!--[if IE 9]>
      <link type="text/css" rel="stylesheet" href="<?php print base_path().path_to_theme(); ?>/css/ie9.css" media="all" />
    <![endif]-->
    <?php print $scripts; ?>
  </head>
  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <div id="skip-link">
      <a href="#menu-primary" class="element-invisible element-focusable"><?php print t('Jump to Navigation'); ?></a>
    </div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
</html>