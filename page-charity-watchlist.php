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
?>

<main id="main">
  <div class="container narrow">
    <article>
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </article>
    <div class="alpha-nav">
      <ul class="list-unstyled list-inline">
        <li><a href="#A">A</a></li>
        <li><a href="#B">B</a></li>
        <li><a href="#C">C</a></li>
        <li><a href="#D">D</a></li>
        <li><a href="#E">E</a></li>
        <li><a href="#F">F</a></li>
        <li><a href="#G">G</a></li>
        <li><a href="#H">H</a></li>
        <li><a href="#I">I</a></li>
        <li><a href="#J">J</a></li>
        <li><a href="#K">K</a></li>
        <li><a href="#L">L</a></li>
        <li><a href="#M">M</a></li>
        <li><a href="#N">N</a></li>
        <li><a href="#O">O</a></li>
        <li><a href="#P">P</a></li>
        <li><a href="#Q">Q</a></li>
        <li><a href="#R">R</a></li>
        <li><a href="#S">S</a></li>
        <li><a href="#T">T</a></li>
        <li><a href="#U">U</a></li>
        <li><a href="#V">V</a></li>
        <li><a href="#W">W</a></li>
        <li><a href="#X">X</a></li>
        <li><a href="#Y">Y</a></li>
        <li><a href="#Z">Z</a></li>
      </ul>
    </div>
    <?php if(have_rows('charities')): 
      $previous_letter='A'; 
      echo '<div id="A"><h3>A</h3>';

      while(have_rows('charities')): the_row(); 
        $first_letter = substr(get_sub_field('charity_name'), 0, 1);
        if(strcasecmp($previous_letter, $first_letter) != 0){
          $previous_letter = $first_letter;
          echo '</div><div id="' . $first_letter .'"><h3>' . $first_letter . '</h3>';
        } ?>

        <div class="charity">
          <div class="charity-info">
            <h4><span class="<?php the_sub_field('rating'); ?>"></span><?php the_sub_field('charity_name'); ?></h4>
            <p><?php the_sub_field('charity_address_1'); ?>
            <?php echo get_sub_field('charity_address_2') ? '<br />' . get_sub_field('charity_address_2') : ''; ?>
            <br /><?php the_sub_field('charity_city_state_zip'); ?>
            <br />Phone: <?php the_sub_field('charity_phone'); ?>
            <?php echo get_sub_field('charity_fax') ? '<br />Phone: ' . get_sub_field('charity_fax') : ''; ?>
            <br /><?php echo get_sub_field('charity_website_url') ? '<a href="' . get_sub_field('charity_website_url') . '">' . get_sub_field('charity_website') . '</a>' : get_sub_field('charity_website'); ?>
          </div>
          <?php the_sub_field('charity_content'); ?>
          <a href="#main" class="back-to-top"><i class="fa fa-arrow-up"></i></a>
        </div>

      <?php endwhile; echo '</div>'; endif; ?>
  </div>
</main>

<?php 
  if($parent->post_name == 'learn'){
    get_template_part('partials/learn_pagination', 'section');
  }
?>
<?php get_footer(); ?>