<?php get_header(); ?>
<?php get_template_part('partials/breadcrumb', 'section'); ?>

<main id="main">
  <div class="container narrow">
    <article>
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </article>
    <div class="faqs">
      <?php if(have_rows('faq_category')): while(have_rows('faq_category')): the_row(); ?>
        <?php $faq_id = sanitize_title(get_sub_field('faq_category_title')); ?>
        <h2><?php echo get_sub_field('faq_category_title'); ?></h2>
        <div class="panel-group" id="<?php echo $faq_id; ?>" role="tablist" aria-multiselectable="true">
          <?php if(have_rows('faqs')): $c=0; while(have_rows('faqs')): the_row(); ?>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="question<?php echo '_' . $faq_id . '_' . $c; ?>">
                <h3 class="panel-title">
                  <a href="#answer<?php echo '_' . $faq_id . '_' . $c; ?>" role="button" data-toggle="collapse" data-parent="#<?php echo $faq_id; ?>" aria-expanded="true" aria-controls="answer<?php echo '_' . $faq_id . '_' . $c; ?>"><?php the_sub_field('question'); ?></a>
                </h3>
              </div>
              <div id="answer<?php echo '_' . $faq_id . '_' . $c; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question<?php echo '_' . $faq_id . '_' . $c; ?>">
                <div class="panel-body">
                  <?php the_sub_field('answer'); ?>
                </div>
              </div>
            </div>
          <?php $c++; endwhile; endif; ?>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>