  <nav id="learn-pagination">
    <div class="container">
      <ul class="nav nav-justified">
        <?php
          global $post;
          $parent = $post->post_parent;

          $pagelist = get_pages('child_of=' . $parent . '&parent=' . $parent . '&sort_column=menu_order&sort_order=asc');
          $pages = array();
          foreach($pagelist as $page){
            $pages[] += $page->ID;
          }
          $current = array_search($post->ID, $pages);
          if($current > 0){
            $prevID = $pages[$current - 1];
            echo '<li>PREVIOUS: <a href="' . get_permalink($prevID) . '">' . get_the_title($prevID) . '</a></li>';
          }
        ?>
        <li>HOME: <a href="<?php echo get_permalink($parent); ?>"><?php echo get_the_title($parent); ?></a></li>

        <?php
          if($current < (count($pages) - 1)){
            $nextID = $pages[$current + 1];
            echo '<li>NEXT: <a href="' . get_permalink($nextID) . '">' . get_the_title($nextID) . '</a></li>';
          }
        ?>
      </ul>
    </div>
  </nav>