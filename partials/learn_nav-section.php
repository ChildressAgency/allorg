  <nav id="learn-nav">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <?php
            $learn_nav_left_args = array(
              'theme_location' => 'learn-nav-left',
              'menu' => 'Learn Navigation Left',
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'nav learn-nav',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'allorg_learn_nav_left_fallback',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($learn_nav_left_args);
          ?>  
        </div>
        <div class="col-sm-4">
          <?php
            $learn_nav_center_args = array(
              'theme_location' => 'learn-nav-center',
              'menu' => 'Learn Navigation Center',
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'nav learn-nav',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'allorg_learn_nav_center_fallback',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($learn_nav_center_args);
          ?>
        </div>
        <div class="col-sm-4">
          <?php
            $learn_nav_right_args = array(
              'theme_location' => 'learn-nav-right',
              'menu' => 'Learn Navigation Right',
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'nav learn-nav',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'allorg_learn_nav_right_fallback',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($learn_nav_right_args);
          ?>
        </div>
      </div>
    </div>
  </nav>