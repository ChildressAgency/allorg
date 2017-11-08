<?php get_header(); ?>
  <section id="hp-blog-loop">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-7 col-lg-8">
          <div class="blog-loop-wrapper">
            <h1>Our Recent Posts</h1>
            <?php
              $recent_posts = new WP_Query(array('posts_per_page' => 4, 'post_status' => 'publish'));
              if($recent_posts->have_posts()): while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                <div class="post-summary">
                  <h2><?php the_title(); ?></h2>
                  <p class="post-date"><?php echo get_the_date('n/j/Y g:i:sA'); ?></p>
                  <?php the_excerpt(); ?>
                  <a href="<?php the_permalink(); ?>" class="read-more">READ MORE</a>
                </div>
              <?php endwhile; endif; wp_reset_postdata(); ?>
            <a href="<?php echo home_url('publications'); ?>" class="btn-main">READ MORE</a>
          </div>
        </div>
        <div class="col-sm-5 col-md-4 testimonial-sidebar">
          <?php if(have_rows('sidebar_testimonials')): while(have_rows('sidebar_testimonials')): the_row(); ?>
            <div class="sidebar-testimonial">
              <p><?php the_sub_field('testimonial'); ?></p>
              <p class="testimonial-author"><?php the_sub_field('testimonial_author'); ?><br /><?php the_sub_field('testimonial_date'); ?>.</p>
            </div>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section id="meetJudie">
    <div class="container container-sm-height">
      <div class="row row-sm-height">
        <div class="col-sm-6 col-sm-height image-side" style="background-image:url(<?php the_field('meet_judie_image'); ?>);<?php the_field('meet_judie_image_css'); ?>"></div>
        <div class="col-sm-6 col-sm-height">
          <h1>Meet Judie Brown!</h1>
          <?php the_field('meet_judie_text'); ?>
          <a href="<?php echo home_url('ask-judie-brown'); ?>" class="btn-main">Ask Judie Brown</a>
          <a href="<?php echo esc_url(get_category_link(get_cat_ID('judies-commentary'))); ?>" class="btn-main">Read Commentary</a>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>