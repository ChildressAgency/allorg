<?php get_header(); ?>
<main id="main">
  <div class="container narrow">
    <?php if(have_post()): while(have_psots()): the_post(); ?>
      <?php if(is_archive()): ?>

        <div class="post-summary">
          <div class="row">
            <div class="col-sm-3 col-md-2">
              <?php
                if(has_post_thumbnail()){
                  the_post_thumbnail('thumbnail', array('class' => 'img-responsive center-block'));
                }
                else{
                  if(get_field('blog_post_default_image', 'option')){
                    echo '<img src="' . get_field('blog_post_default_image', 'option') . '" class="img-responsive center-block" alt="" />';
                  }
                }
              ?>
            </div>
            <div class="col-sm-9 col-md-10">
              <div class="row">
                <div class="col-sm-6">
                  <a href="<?php echo home_url() . '/' . get_the_date('Y') . '/' . get_the_date('m'); ?>" class="post-date"><?php echo get_the_date('F j, Y h:i A'); ?></a>
                </div>
                <div class="col-sm-6">
                  <?php 
                    $categories = get_the_category();
                    $cat_name = esc_html($categories[0]->name);
                    $cat_link = esc_url(get_category_link($categories[0]->term_id));
                  ?>
                  <a href="<?php echo $cat_link; ?>" class="post-category" style="color:#666;"><?php echo cat_name; ?></a>
                </div>
              </div>
              <h1><?php the_title(); ?></h1>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
            </div>
          </div>
        </div>

      <?php else: ?>

        <article>
          <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
        </article>

      <?php endif; ?>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>