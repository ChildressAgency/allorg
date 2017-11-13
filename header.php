<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title>All.org</title>

  <?php wp_head(); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <nav id="header-nav">
    <div class="masthead">
      <a href="<?php the_field('donation_link', 'option'); ?>" class="header-donate">Donate</a>
      <div class="header-store-cart hidden-xs">
        <a href="<?php the_field('store_link', 'option'); ?>">Store</a>
      </div>
      <div class="register-login">
        <a href="<?php echo wp_registration_url(); ?>">Register</a>
        <hr />
        <?php wp_loginout(); ?>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo home_url(); ?>" class="header-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="American Life League Logo" /></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="expanded" aria-controls="navbar">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <?php
            $header_nav_args = array(
              'theme_location' => 'header-nav',
              'menu' => '',
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'nav navbar-nav navbar-right',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'allorg_header_nav_fallback',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="hidden-xs"><a href="#" class="ico-search"><i class="fa fa-search"></i></a></li></ul>',
              'depth' => 0,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($header_nav_args);

            function allorg_header_nav_fallback(){ ?>
              <ul class="nav navbar-nav navbar-right">
                <li<?php if(is_page('learn')){ echo ' class="active"'; } ?>><a href="<?php echo home_url(); ?>">Learn</a></li>
                <li<?php if(is_page('get-involved')){ echo ' class="active"'; } ?>><a href="<?php echo home_url(); ?>">Get Involved</a></li>
                <li<?php if(is_page('programs')){ echo ' class="active"'; } ?>><a href="<?php echo home_url(); ?>">Programs</a></li>
                <li><a href="<?php the_field('store_link', 'option'); ?>">Store</a></li>
                <li<?php if(is_home()){ echo ' class="active"'; } ?>><a href="<?php echo home_url('publications'); ?>">Publications</a></li>
                <li<?php if(is_page()){ echo ' class="active"'; } ?>><a href="<?php echo home_url('about'); ?>">About</a></li>
                <li class="hidden-xs"><a href="#" class="ico-search"><i class="fa fa-search"></i></a></li>
              </ul>
          <?php } ?>

          <div class="header-search-form">
            <span class="dismiss-search-form hidden-xs">x</span>
            <?php get_search_form(); ?>
          </div>
        </div>

      </div>
    </div>
  </nav>

  <?php if(is_front_page()): ?>
    <div class="hero hp-hero">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="">
        <div class="carousel-inner">

          <?php if(have_rows('hero_carousel_items')): $ci=0; while(have_rows('hero_carousel_items')): the_row(); ?>

            <div class="item<?php if($ci==0){ echo ' active'; } ?>" style="background-image:url(<?php the_sub_field('carousel_item_image'); ?>);<?php the_sub_field('carousel_item_image_css'); ?>">
              <div class="carousel-caption">
                <h1><?php the_sub_field('carousel_item_title'); ?></h1>
                <?php $carousel_item_category = get_sub_field('carousel_item_category');
                  if($carousel_item_category): ?>
                    <a href="<?php echo get_term_link($carousel_item_category); ?>" class="category"><?php echo $carousel_item_category->name; ?></a>
                <?php endif; ?>
                <p><?php the_sub_field('carousel_item_summary_text'); ?></p>
                <a href="<?php echo the_sub_field('carousel_item_link'); ?>" class="read-more">READ MORE</a>
                <div class="carousel-nav">
                  <a href="#heroCarousel" class="carousel-nav-left" role="button" data-slide="prev">
                    <i class="fa fa-caret-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a href="#heroCarousel" class="carousel-nav-right" role="button" data-slide="next">
                    <i class="fa fa-caret-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          <?php $ci++; endwhile; endif; ?>

        </div>
      </div>
    </div>
  <?php else: ?>
    <?php
      $hero_image = get_stylesheet_directory_uri() . '/images/baby-with-umbilical.jpg';
      $hero_image_css = 'background-position:center center;';
      if(get_field('hero_image')){
        $hero_image = get_field('hero_image');
        if(get_field('hero_image_css')){
          $hero_image_css = get_field('hero_image_css');
        }
        else{
          $hero_image_css = '';
        }
      }
    ?>
    <div class="hero" style="background-image:url(<?php echo $hero_image; ?>);<?php echo hero_image_css; ?>">
      <div class="container">
        <?php 
          if(get_field('hero_caption')){
            $hero_caption = get_field('hero_caption');
          }
          else{
            $hero_caption = get_the_title(); 
          }
        ?>
        <p class="caption"><?php echo $hero_caption; ?></p>
      </div>
    </div>
  <?php endif; ?> 