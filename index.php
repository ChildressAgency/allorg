<?php get_header(); ?>
<main id="main">
  <div class="container narrow">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <?php if(is_archive() || is_search()): ?>

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
                  <a href="<?php echo home_url() . '/' . get_the_date('Y') . '/' . get_the_date('m'); ?>" class="post-date hidden-xs"><?php echo get_the_date('F j, Y'); ?></a>
                </div>
                <div class="col-sm-6">
                  <?php 
                    $categories = get_the_category();
                    if($categories){
                      $cat_name = esc_html($categories[0]->name);
                      $cat_term_id = $categories[0]->term_id;
                      $cat_link = esc_url(get_category_link($cat_term_id));

                      if($cat_name == 'Homepage'){
                        $cat_name = esc_html($categories[1]->name);
                        $cat_term_id = $categories[1]->term_id;
                        $cat_link = esc_url(get_category_link($cat_term_id));
                      }                      
                      echo '<a href="' . $cat_link . '" class="post-category hidden-xs" style="color:'. get_field('font_color', 'category_' . $cat_term_id) . ';">' . $cat_name . '</a>';
                    }
                  ?>
                </div>
              </div>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <?php
                if($categories){
                  $cat_name = esc_html($categories[0]->name);
                  $cat_term_id = $categories[0]->term_id;
                  $cat_link = esc_url(get_category_link($cat_term_id));
                  
                  if($cat_name == 'Homepage'){
                    $cat_name = esc_html($categories[1]->name);
                    $cat_term_id = $categories[1]->term_id;
                    $cat_link = esc_url(get_category_link($cat_term_id));
                  }                      
                  echo '<a href="' . $cat_link . '" class="post-category visible-xs-block" style="color:'. get_field('font_color', 'category_' . $cat_term_id) . ';">' . $cat_name . '</a>';
                }
              ?>              
              <?php the_excerpt(); ?>
              <div class="row">
                <div class="col-xs-6 col-sm-12">
                  <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                </div>
                <div class="col-xs-6">
                  <a href="<?php echo home_url() . '/' . get_the_date('Y') . '/' . get_the_date('m'); ?>" class="post-date visible-xs-block"><?php echo get_the_date('F j, Y'); ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php else: ?>

        <article>
          <?php the_content(); ?>
        </article>

      <?php endif; ?>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>