<?php get_header(); ?>
<?php get_template_part('partials/breadcrumb', 'section'); ?>
<?php 
  global $post;
  $parents = get_post_ancestors($post->ID);
  $id = ($parents) ? $parents[count($parents) - 1] : $post->ID;
  $parent = get_post($id);
  if($parent->post_name == 'learn'){
    get_template_part('partials/learn_nav', 'section');
  }
  elseif($parent->post_name == 'activist-materials'){
    get_template_part('partials/activist_materials_nav', 'section');
  }
?>

<main id="main">
  <div class="container narrow">
    <article>
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php if($parent->post_name == 'learn' || $parent->post_name == 'activist-materials'): ?>
          <h1 class="text-center"><?php the_title(); ?></h1>
        <?php endif; ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </article>
  </div>
</main>

<?php 
  if($parent->post_name == 'learn'){
    get_template_part('partials/learn_pagination', 'section');
  }
?>
<?php get_footer(); ?>