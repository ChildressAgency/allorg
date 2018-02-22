<?php get_header(); ?>
<?php get_template_part('partials/breadcrumb', 'section'); ?>
<main id="main">
  <div class="container narrow">
    <article>
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php
          if(has_post_thumbnail()){
            the_post_thumbnail('full', array('class' => 'alignright'));
          }
        ?>
        <h1><?php the_title(); ?></h1>
        <p><a href="<?php echo home_url() . '/' . get_the_date('Y') . '/' . get_the_date('m'); ?>" class="post-date"><?php echo get_the_date('F j, Y'); ?></a></p>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </article>
  </div>
</main>
<?php get_footer(); ?>