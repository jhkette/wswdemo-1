<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>
<body>
    <nav class="mobile-nav" id="mobile-nav" >
    <?php wp_nav_menu([
    	'theme_location' => 'headerMenu',
    ]); ?>
    </nav>

    <div id="header-container">
      <div class="common-container" id="commonlinks-cont">
        <nav class="common-links-nav" role="navigation">
          <ul>
            <li><a href="<?php echo esc_url(
            	site_url('/wp-admin')
            ); ?>">Log in</a></li>
            <li><a href="<?php echo esc_url(
            	site_url('/calender')
            ); ?>">Calender</a></li>
            <li><a href="<?php echo esc_url(
            	site_url('/contact'));?>">Contact</a></li>
          </ul>
        </nav>
      </div>
      <header class="lead-header" role="banner">
      <nav id="logo">  <a href="<?php echo esc_url(site_url('/')); ?>"><img
                src=<?php echo get_theme_file_uri(
                	'/assets/images/WSW_siteLogo870.png'
                ); ?>
                
                alt="logo"
              /></a></nav>
         <div>
          <nav class="main-nav" role="navigation">
         <?php wp_nav_menu([
         	'theme_location' => 'headerMenu',
         ]); ?>
          </nav>
        </div>
        <div id="nav-icon1" role="navigation">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </header>
   </div>
   