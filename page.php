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
    <article>
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </article>
  </div>
</main>
<?php get_footer(); ?>