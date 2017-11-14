<?php get_header(); ?>

  <?php get_template_part('partials/learn_nav', 'section'); ?>

  <main id="main">
    <?php $slides = get_field('preborn_baby_slideshow'); ?>
    <div id="creation-carousel" class="carousel slide carousel-fade" data-ride="">
      <div class="creation-nav">
        <ol class="nav carousel-indicators">
          <?php $i=0; foreach($slides as $slide): ?>
            <li<?php if($i==0){ echo ' class="active"'; } ?> data-target="#creation-carousel" data-slide-to="<?php echo $i; ?>"><a href="#" aria-controls="<?php echo sanitize_title($slide['slide_name']); ?>"><?php echo $slide['slide_name']; ?></a></li>
          <?php $i++; endforeach; reset($slides); ?>
        </ol>
      </div>

      <div class="container narrow">
        <div class="carousel-inner" role="listbox">
          <?php $c=0; foreach($slides as $slide): ?>
            <div class="item<?php if($c==0){ echo ' active'; } ?>">
              <div class="row">
                <div class="col-md-6">
                  <?php echo $slide['slide_content']; ?>
                </div>
                <div class="col-md-6">
                  <img src="<?php echo $slide['slide_image']; ?>" class="img-responsive center-block" alt="" />
                </div>
              </div>
            </div>
          <?php $c++; endforeach; ?>
        </div>
      </div>
    </div>
  </main>  

  <?php get_template_part('partials/learn_pagination', 'section'); ?>

<?php get_footer(); ?>