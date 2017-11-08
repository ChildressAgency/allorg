<?php get_header(); ?>
  <div class="container">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display')){
        bcn_display();
      } ?>
    </div>
    <div class="print-share">
      <a href="#" onclick="window.print();"><i class="fa fa-print"></i></a>
      <?php if(function_exists('ADDTOANY_SHARE_SAVE_KIT')){
        ADDTOANY_SHARE_SAVE_KIT(array('use_current_page' => true));
      } ?>
      <?php if(function_exists('ADDTOANY_SHARE_SAVE_KIT')){
        ADDTOANY_SHARE_SAVE_KIT(array('buttons' => array('email')));
      } ?>
    </div>
  </div>
  <main id="main">
    <div class="container narrow">
      <div class="filters">
        <form method="get" action="" class="form-inline">
          <div class="form-group">
            <label for="post_month" class="sr-only">Month</label>
            <select name="post_month" id="post_month" class="form-control">
              <option value="">Month</option>
              <option value="">All</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
          <div class="form-group">
            <label for="post_year" class="sr-only">Year</label>
            <?php
              global $wpdb;
              $years = $wpdb->get_results("
                SELECT DISTINCT YEAR(post_date) as year
                FROM wp_posts
                WHERE post_status = 'publish'
                  AND post_type = 'post'
                ORDER BY year ASC");
            ?>
            <select name="post_year" id="post_year" class="form-control">
              <option value="">Year</option>
              <option value="">All</option>
              <?php foreach($years as $year): ?>
                <option value="<?php echo $year->year; ?>"><?php echo $year->year; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="post_category" class="sr-only">Category</label>
            <?php $cats = get_categories(array('orderby' => 'name', 'order' => 'ASC')); ?>
            <select name="post_category" id="post_category" class="form-control">
              <option value="">Category</option>
              <option value="">All</option>
              <?php foreach($cats as $cat): ?>
                <option value="<?php echo $cat->term_id; ?>"><?php echo esc_html($cat->name); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" class="btn-main" value="Filter" />
          </div>
        </form>
      </div>

      <?php 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $post_list_args = array(
          'post_status' => 'publish',
          'posts_per_page' => 6,
          'paged' => $paged
        );

        if(isset($_GET['post_month'])){
          $post_list_args['date_query']['month'] => $_GET['post_month'];
        }
        if(isset($_GET['post_year'])){
          $post_list_args['date_query']['year'] => $_GET['post_year'];
        }
        if(isset($_GET['post_category'])){
          $post_list_args['cat'] => $_GET['post_category'];
        }

        $articles = new WP_Query($post_list_args);
      ?>

      <?php wp_pagenavi(array('query' => $articles)); ?>

      <?php if($articles->have_posts()): while($articles->have_posts()): $articles->the_post(); ?>
        <div class="post-summary">
          <div class="row">
            <div class="col-sm-3 col-md-2">
              <?php
                if(has_post_thumbnail()){
                  the_post_thumbnail('thumbnail', array('class' => 'img-responsive center-block'));
                }
                else{
                  if(get_field('blog_post_placeholder_image', 'option')){
                    echo '<img src="' . get_field('blog_post_placeholder_image', 'option') . '" class="img-responsive center-block" alt="" />';
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
      <?php endwhile; endif; wp_pagenavi(array('query' => $articles)); ?>
      
    </div>
  </main>

<?php get_footer(); ?>