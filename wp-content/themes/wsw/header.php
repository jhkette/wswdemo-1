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
      <ul>
        <li><a href="<?php echo esc_url(site_url('/')); ?>">Home</a></li>
        <li><a href="<?php echo esc_url(
        	site_url('/activities')
        ); ?>">Activities</a></li>
        <li><a href="<?php echo esc_url(
        	site_url('/events')
        ); ?>">Events</a></li>
        <li><a href="<?php echo esc_url(site_url('/news')); ?>">News</a></li>
        <li><a href="<?php echo esc_url(
        	site_url('/information')
        ); ?>">Info</a></li>
      </ul>
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
            <li>Contact</li>
          </ul>
        </nav>
      </div>
      <header class="lead-header" role="banner">
      <a href="<?php echo esc_url(site_url('/')); ?>"><nav id="logo"></nav></a>
        <div>
          <nav class="main-nav" role="navigation">
            <ul>
            <li><a href="<?php echo esc_url(site_url('/')); ?>">Home</a></li>
        <li><a href="<?php echo esc_url(
        	site_url('/activities')
        ); ?>">Activities</a></li>
        <li><a href="<?php echo esc_url(
        	site_url('/events')
        ); ?>">Events</a></li>
        <li><a href="<?php echo esc_url(site_url('/news')); ?>">News</a></li>
        <li><a href="<?php echo esc_url(
        	site_url('/information')
        ); ?>">Info</a></li>
            </ul>
          </nav>
        </div>
        <div id="nav-icon1" role="navigation">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </header>
      </div>
   