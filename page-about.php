<?php get_header(); ?>
  <?php get_template_part('partials/breadcrumb', 'section'); ?>
  <main id="main">
    <article>
      <div class="container narrow">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
      </div>
    </article>
    <?php if(get_field('mission_statement')): ?>
      <article id="missionStatement">
        <div class="container narrow">
          <h2>Our Mission</h2>
          <?php the_field('mission_statement'); ?>
          <p class="text-center">
            <a href="#leadershipTeam" class="btn-main">Our dedicated team</a>
          </p>
        </div>
      </article>
    <?php endif; ?>

    <section id="epic">
      <div class="container narrow">
        <div class="row">
          <div class="col-sm-5">
            <ul class="acronym">
              <!-- .acronym>li::first-letter-->
              <li>Educate</li>
              <li>Protect</li>
              <li>Inspire</li>
              <li>Care</li>
            </ul>
          </div>
          <div class="col-sm-7">
            <div class="epic-vision-mission">
              <?php the_field('epic_section_content'); ?>
            </div>
            <blockquote class="epic-fashion">
              <p>Do ALL things for God in an <span>EPIC</span> fashion!</p>
              <footer><?php the_field('epic_section_quote'); ?> <span>- <?php the_field('epic_section_quote_author'); ?></span></footer>
            </blockquote>
          </div>
        </div>
      </div>
    </section>
    <?php if(get_field('culture_of_life_section_content')): ?>
      <section id="culture-life-death">
        <div class="container">
          <article>
            <?php the_field('culture_of_life_section_content'); ?>
          </article>
        </div>
      </section>
    <?php endif; ?>
    <section id="leadershipTeam">
      <div class="container narrow">
        <h1>Leadership Team</h1>
        <div class="row">
          <?php if(have_rows('leadership_team_members')): $l=0; while(have_rows('leadership_team_members')): the_row(); ?>
            <?php if($l%2==0){ echo '<div class="clearfix"></div>'; } ?>
            <div class="col-sm-6">
              <a href="#" class="team-member-card" data-toggle="modal" data-target="#leadershipModal" data-member_name="<?php the_sub_field('leadership_member_name'); ?>" data-member_title="<?php the_sub_field('leadership_member_title'); ?>" data-member_image="<?php the_sub_field('leadership_member_image'); ?>" data-member_bio="<?php the_sub_field('leadership_member_bio'); ?>">
              <img src="<?php the_sub_field('leadership_member_image'); ?>" class="img-responsive center-block" alt="" />
              <h2><?php the_sub_field('leadership_member_name'); ?></h2>
              <p><?php the_sub_field('leadership_member_title'); ?></p>
              </a>
            </div>
          <?php $l++; endwhile; endif; ?>
        </div>
      </div>

      <?php if(have_rows('speakers')): ?>
        <div class="container">
          <h1 style="margin-top:40px; margin-bottom:0;">Speakers</h1>
          <?php the_field('speakers_booking_info'); ?>
          <div class="row">
            <?php $s=0; while(have_rows('speakers')): the_row(); ?>
              <?php if($s%4==0){ echo '<div class="clearfix"></div>'; } ?>
              <div class="col-sm-3">
                <a href="#" class="team-member-card"<?php if(get_sub_field('speaker_bio')){ echo ' data-toggle="modal" data-target="#leadershipModal" data-member_bio="' . get_sub_field('speaker_bio') . '"'; } ?> data-member_name="<?php the_sub_field('speaker_name'); ?>" data-member_title="<?php the_sub_field('speaker_title'); ?>" data-member_image="<?php the_sub_field('speaker_image'); ?>">
                  <img src="<?php the_sub_field('speaker_image'); ?>" class="img-responsive center-block" alt="" />
                  <h2><?php the_sub_field('speaker_name'); ?></h2>
                  <p><?php the_sub_field('speaker_title'); ?></p>
                </a>
              </div>
            <?php $s++; endwhile; ?>
          </div>
        </div>
      <?php endif; ?>

    </section>

      <!-- leadership team modal -->
      <div class="modal fade" id="leadershipModal" tabindex="-1" role="dialog" aria-labelledby="leadershipModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3>Leadership Team</h3>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-4">
                  <div class="member-pic-name">
                    <img src="" class="img-responsive center-block member-image" alt="" />
                    <h4 class="member-name"></h4>
                    <p class="member-title"></p>
                  </div>
                </div>
                <div class="col-sm-8">
                  <article class="member-bio"></article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end leadership modal -->
    <?php if(get_field('ad_spot_image')): ?>
      <section id="adspot">
        <div class="container narrow">
          <img src="<?php the_field('ad_spot_image'); ?>" class="img-responsive center-block" alt="" />
        </div>
      </section>
    <?php endif; ?>
  </main>
  
<?php get_footer(); ?>