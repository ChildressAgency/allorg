  <section id="donate">
    <div class="container">
      <?php the_field('donate_section_content'); ?>
      <a href="<?php the_field('donation_link', 'option'); ?>" class="btn-main btn-donate">DONATE</a>
    </div>
  </section>
  <?php if(is_front_page() && get_field('show_amazon_section')): ?>
    <section id="amazon-smile">
      <div class="container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/amazon-smile-logo.png" class="img-responsive center-block" alt="" />
        <h3>YOU SHOP. <span>AMAZON GIVES.</span></h3>
        <a href="<?php the_field('amazon_section_link'); ?>" class="btn-main">Learn More</a>
      </div>
    </section>
  <?php endif; ?>

  <section id="newsletterSocial">
    <div class="container">

      <?php if(is_front_page()): ?>
        <div class="row">
          <div class="col-sm-6">
      <?php endif; ?>

          <div class="newsletter-signup">
            <h4>Sign Up for Our Newsletters</h4>
            <p><?php the_field('newsletter_signup_section_content', 'option'); ?></p>
            <a href="<?php echo home_url('newsletter-signup'); ?>" class="btn-main">Sign Up</a>
          </div>

      <?php if(is_front_page()): ?>
          </div>
          <div class="col-sm-6">
            <?php
              $facebook = get_field('facebook', 'option');
              $twitter = get_field('twitter', 'option');
              $instagram = get_field('instagram', 'option');
              $youtube = get_field('youtube', 'option');
            ?>
            <div class="social">
              <?php if($facebook): ?>
                <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook-official"></i></a>
              <?php endif; if($twitter): ?>
                <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
              <?php endif; if($instagram): ?>
                <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
              <?php endif; if($youtube): ?>
                <a href="<?php echo $youtube; ?>"><i class="fa fa-youtube-play"></i></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <footer>
    <nav id="footer-nav">
      <div class="container">
        <ul class="nav nav-justified">
          <li><a href="<?php echo home_url('learn'); ?>">Learn</a></li>
          <li><a href="<?php echo home_url('get-involved'); ?>">Get Involved</a></li>
          <li><a href="<?php echo home_url('programs'); ?>">Programs</a></li>
          <li><a href="<?php echo home_url('publications'); ?>">Publications</a></li>
          <li><a href="<?php the_field('store_link', 'option'); ?>">Store</a></li>
          <li><a href="<?php echo home_url('about'); ?>">About</a></li>
          <li><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
        </ul>
      </div>
    </nav>
    <div class="footer-main">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <a href="<?php echo home_url(); ?>" class="footer-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" class="img-responsive center-block" alt="" /></a>
          </div>
          <div class="col-sm-7">
            <div class="row">
              <div class="col-sm-3">
                <h4>Mailing Address</h4>
                <p><?php the_field('address', 'option'); ?><br /><?php the_field('city_state_zip', 'option'); ?></p>
              </div>
              <div class="col-sm-3">
                <h4>Phone</h4>
                <p><?php the_field('phone', 'option'); ?></p>
              </div>
              <div class="col-sm-6">
                <?php if(have_rows('shopping_links', 'option')): ?>
                  <h4>Purchase</h4>
                  <ul class="purchase-nav">
                    <?php while(have_rows('shopping_links', 'option')): the_row(); ?>
                      <li><a href="<?php the_sub_field('shopping_link'); ?>"><?php the_sub_field('shopping_link_text'); ?></a></li>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <?php 
              $facebook = get_field('facebook', 'option');
              $twitter = get_field('twitter', 'option');
              $instagram = get_field('instagram', 'option');
              $youtube = get_field('youtube', 'option');
            ?>
            <div class="social">
              <?php if($facebook): ?>
                <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook-official"></i></a>
              <?php endif; if($twitter): ?>
                <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
              <?php endif; if($instagram): ?>
                <a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a>
              <?php endif; if($youtube): ?>
                <a href="<?php echo $youtube; ?>"><i class="fa fa-youtube-play"></i></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if(have_rows('related_sites', 'option')): ?>
      <div class="related-sites">
        <div class="container">
          <ul class="list-unstyled list-inline">
            <?php while(have_rows('related_sites', 'option')): the_row(); ?>
              <li>
                <a href="<?php the_sub_field('related_site_link'); ?>" title="<?php the_sub_field('related_site_name'); ?>">
                  <img src="<?php the_sub_field('related_site_image'); ?>" class="img-responsive center-block" alt="<?php the_sub_field('related_site_name'); ?>" />
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>

    <div class="copyright">
      <div class="container">
        <p>&copy;<?php echo date('Y'); ?> American Life League, Inc.</p>
        <p>website created by <a href="https://childressagency.com">The Childress Agency</a></p>
      </div>
    </div>
  </footer>
</body>

</html>