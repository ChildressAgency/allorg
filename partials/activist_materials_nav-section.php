<nav id="top-nav">
  <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <?php
            $activist_materials_nav_left_args = array(
              'theme_location' => 'activist-materials-nav-left',
              'menu' => 'Activist Materials Navigation Left',
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'nav top-nav',
              'menu_id' => '',
              'echo' => true,
              //'fallback_cb' => 'allorg_activist_materials_nav_left_fallback',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($activist_materials_nav_left_args);
          ?>  
        </div>
        <div class="col-sm-4">
          <?php
            $activist_materials_nav_center_args = array(
              'theme_location' => 'activist-materials-nav-center',
              'menu' => 'Activist Materials Navigation Center',
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'nav top-nav',
              'menu_id' => '',
              'echo' => true,
              //'fallback_cb' => 'allorg_activist_materials_nav_center_fallback',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($activist_materials_nav_center_args);
          ?>
        </div>
        <div class="col-sm-4">
          <?php
            $activist_materials_nav_right_args = array(
              'theme_location' => 'activist-materials-nav-right',
              'menu' => 'Activist Materials Navigation Right',
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'nav top-nav',
              'menu_id' => '',
              'echo' => true,
              //'fallback_cb' => 'allorg_activist_materials_nav_right_fallback',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new wp_bootstrap_navwalker()
            );
            wp_nav_menu($activist_materials_nav_right_args);
          ?>
        </div>
      </div>
  </div>
</nav>