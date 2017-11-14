<?php get_header(); ?>

  <?php get_template_part('partials/learn_nav', 'section'); ?>

  <main id="main">
    <section id="timeline">
      <div class="container narrow timeline-container">
        <span></span>
        <?php if(have_rows('timeline_events')): $i=1; while(have_rows('timeline_events')): the_row(); ?>
          <div class="timeline-event<?php if($i<4){ echo ' fadein'; } ?>">
            <div class="event-year"><?php the_sub_field('event_year'); ?></div>
            <div class="event">
              <?php the_sub_field('event'); ?>
            </div>
          </div>
        <?php $i++; endwhile; endif; ?>
      </div>
    </section>
  </main>

  <?php get_template_part('partials/learn_pagination', 'section'); ?>
  
<?php get_footer(); ?>