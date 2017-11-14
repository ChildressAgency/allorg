<?php

add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'allorg_scripts', 100);
function allorg_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );

  wp_register_script(
    'fontawesome',
    '//use.fontawesome.com/004c3c54fb.js',
    array('jquery'),
    '',
    false
  );

  wp_register_script(
    'jquery-libs',
    get_template_directory_uri() . '/js/jquery.libs.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'allorg-scripts', 
    get_template_directory_uri() . '/js/allorg-scripts.js', 
    array('jquery'), 
    '', 
    true
  ); 
  
  wp_enqueue_script('bootstrap-script');
  wp_enqueue_script('fontawesome');
  wp_enqueue_script('jquery-libs');
  wp_enqueue_script('allorg-scripts');  
}

add_action('wp_enqueue_scripts', 'allorg_styles');
function allorg_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_register_style('allorg', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('allorg');
}

add_theme_support('post-thumbnails');
//register_nav_menu( 'header-nav', 'Header Navigation' );
add_action('init', 'allorg_register_menus');
function allorg_register_menus(){
  register_nav_menus(
    array(
      'header-nav' => 'Header Navigation',
      'learn-nav-left' => 'Learn Navigation Left',
      'learn-nav-center' => 'Learn Navigation Center',
      'learn-nav-right' => 'Learn Navigation Right',
      'activist-materials-nav-left' => 'Activist Materials Navigation Left',
      'activist-materials-nav-center' => 'Activist Materials Navigation Center',
      'activist-materials-nav-right' => 'Activist Materials Navigation Right'
    )
  );
}

function allorg_learn_nav_left_fallback(){ ?>
  <ul class="nav learn-nav">
    <li<?php if(is_page('the-preborn-baby')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('the-preborn-baby'); ?>" title="The Preborn Baby">The Preborn Baby</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle<?php if(is_page('abortion') || 
                                                  is_page('abortion-history') || 
                                                  is_page('statistics') || 
                                                  is_page('methods') || 
                                                  is_page('exceptions')){ echo ' active'; } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="abortion">Abortion <i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo home_url('abortion'); ?>">Abortion</a></li>
        <li><a href="<?php echo home_url('abortion-history'); ?>">History</a></li>
        <li><a href="<?php echo home_url('statistics'); ?>">Statistics</a></li>
        <li><a href="<?php echo home_url('methods'); ?>">Methods</a></li>
        <li><a href="<?php echo home_url('exceptions'); ?>">Exceptions</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle<?php if(is_page('contraception') || 
                                                  is_page('words-matter') || 
                                                  is_page('abortion-connection') || 
                                                  is_page('naturally-spacing-children')){ echo ' active'; } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Contraception">Contraception <i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo home_url('contraception'); ?>">Contraception</a></li>
        <li><a href="<?php echo home_url('words-matter'); ?>">Words Matter</a></li>
        <li><a href="<?php echo home_url('abortion-connection'); ?>">Abortion Connection</a></li>
        <li><a href="<?php echo home_url('naturally-spacing-children'); ?>">Naturally Spacing Children (NFP)</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle<?php if(is_page('euthanasia') ||
                                                  is_page('euthanasia-history') ||
                                                  is_page('definitions') ||
                                                  is_page('strategy-and-analysis-of-strategic-concepts') ||
                                                  is_page('law-and-suicide') ||
                                                  is_page('arguments-against-euthanasia') ||
                                                  is_page('physician-assisted-suicide') ||
                                                  is_page('the-lving-will') ||
                                                  is_page('legislators-medical-policy-manual') ||
                                                  is_page('the-schiavo-case-and-death-by-dehydration') ||
                                                  is_page('ordinary-vs-extraordinary-care') ||
                                                  is_page('living-wills-and-advanced-directives') ||
                                                  is_page('end-of-life-issues-guide-decision-making-by-patie') ||
                                                  is_page('miracles')){ echo ' active'; } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Euthanasia">Euthanasia <i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo home_url('euthanasia'); ?>">Euthanasia</a></li>
        <li><a href="<?php echo home_url('history'); ?>">History</a></li>
        <li><a href="<?php echo home_url('definitions'); ?>">Definitions</a></li>
        <li><a href="<?php echo home_url('strategy-and-analysis-of-strategic-concepts'); ?>">Strategy and Analysis of Strategic Concepts</a></li>
        <li><a href="<?php echo home_url('law-and-suicide'); ?>">Law and Suicide</a></li>
        <li><a href="<?php echo home_url('arguments-against-euthanasia'); ?>">Arguments Against Euthanasia</a></li>
        <li><a href="<?php echo home_url('physician-assisted-suicide'); ?>">Physician Assisted Suicide</a></li>
        <li><a href="<?php echo home_url('the-loving-will'); ?>">The Loving Will</a></li>
        <li><a href="<?php echo home_url('legislators-medical-policy-manual'); ?>">Legislators' Medical Policy Manual</a></li>
        <li><a href="<?php echo home_url('the_schiavo-case-and-death-by-dehydration'); ?>">The Schiavo Case and Death by Dehydration</a></li>
        <li><a href="<?php echo home_url('ordinary-vs-extraordinary'); ?>">Ordinary vs. Extraordinary Care</a></li>
        <li><a href="<?php echo home_url('living-wills-and-advanced-directives'); ?>">Living Wills and Advanced Directives</a></li>
        <li><a href="<?php echo home_url('end-of-life-issues-guide-decision-making-by-patie'); ?>">End of Life Issues Guide: Decision Making by Patie</a></li>
        <li><a href="<?php echo home_url('miracles'); ?>">Miracles</a></li>
      </ul>
    </li>
  </ul>
<?php }

function allorg_learn_nav_center_fallback(){ ?>
  <ul class="nav learn-nav">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle<?php if(is_page('ivf') ||
                                                  is_page('artificial-fertilization-and-the-catholic-response') ||
                                                  is_page('embryo-adoption')){ echo ' active'; } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="IVF">IVF <i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo home_url('ivf'); ?>">IVF</a></li>
        <li><a href="<?php echo home_url('artificial-fertilization-and-the-catholic-response'); ?>">Artificial Fertilization and the Catholic Response</a></li>
        <li><a href="<?php echo home_url('embryo-adoption'); ?>">Embryo Adoption</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle<?php if(is_page('organ-donation') ||
                                                  is_page('when-is-a-person-really-dead') ||
                                                  is_page('the-ventilator') ||
                                                  is_page('do-i-have-to-spend-my-last-days-hooked-up-to-machines') ||
                                                  is_page('understanding-brain-death') ||
                                                  is_page('life-life-support-and-death') ||
                                                  is_page('should-i-be-an-organ-donor')){ echo ' active'; } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Organ Donation">Organ Donation <i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo home_url('organ-donation'); ?>">Organ Donation</a></li>
        <li><a href="<?php echo home_url('when-is-a-person-really-dead'); ?>">When is a Person Really Dead?</a></li>
        <li><a href="<?php echo home_url('the-ventilator'); ?>">The Ventilator</a></li>
        <li><a href="<?php echo home_url('do-i-have-to-spend-my-last-days-hooked-up-to-machines'); ?>">Do I have to Spend my Last Days Hooked up to Machines?</a></li>
        <li><a href="<?php echo home_url('understanding-brain-death'); ?>">Understanding Brain Death</a></li>
        <li><a href="<?php echo home_url('life-life-support-and-death'); ?>">Life, Life Support and Death</a></li>
        <li><a href="<?php echo home_url('should-i-be-an-organ-donor'); ?>">Should I be an Organ Donor?</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle<?php if(is_page('stem-cells') ||
                                                  is_page('embryology') ||
                                                  is_page('when-does-human-life-begin-the-final-answer') ||
                                                  is_page('ethical-sources-of-stem-cells') ||
                                                  is_page('aborted-fetal-tissue') ||
                                                  is_page('human-cloning') ||
                                                  is_page('church-teachings') ||
                                                  is_page('variations-on-stem-cell-research') ||
                                                  is_page('frozen embryos') ||
                                                  is_page('moral-arguments') ||
                                                  is_page('bioethics')){ echo ' active'; } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Stem Cells">Stem Cells <i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo home_url('stem-cells'); ?>">Stem Cells</a></li>
        <li><a href="<?php echo home_url('embryology'); ?>">Embryology</a></li>
        <li><a href="<?php echo home_url('when-does-human-life-begin'); ?>">When does human life begin? The final answer</a></li>
        <li><a href="<?php echo home_url('ethical-sources-of-stem-cells'); ?>">Ethical sources of stem cells</a></li>
        <li><a href="<?php echo home_url('aborted-fetal-tissue'); ?>">Aborted Fetal Tissue</a></li>
        <li><a href="<?php echo home_url('human-cloning'); ?>">Human Cloning</a></li>
        <li><a href="<?php echo home_url('church-teachings'); ?>">Church Teachings</a></li>
        <li><a href="<?php echo home_url('variations-on-stem-cell-research'); ?>">Variations on Stem Cell Research</a></li>
        <li><a href="<?php echo home_url('frozen-embryos'); ?>">Frozen Embryos</a></li>
        <li><a href="<?php echo home_url('moral arguments'); ?>">Moral Arguments</a></li>
        <li><a href="<?php echo home_url('bioethics'); ?>">Bioethics</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle<?php if(is_page('planned-parenthood') ||
                                                  is_page('margaret-sanger') ||
                                                  is_page('guttmacher-institute') ||
                                                  is_page('resources')){ echo ' active'; } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Planned Parenthood">Planned Parenthood <i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo home_url('planned-parenthood'); ?>">Planned Parenthood</a></li>
        <li><a href="<?php echo home_url('margaret-sanger'); ?>">Margaret Sanger</a></li>
        <li><a href="<?php echo home_url('guttmacher-institute'); ?>">Guttmacher Institute</a></li>
        <li><a href="<?php echo home_url('resources'); ?>">Resources</a></li>
      </ul>
    </li>
  </ul>
<?php }

function allorg_learn_nav_right_fallback(){ ?>
  <ul class="nav learn-nav">
    <li<?php if(is_page('policy-politicians')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('policy-politicians'); ?>" title="Policy & Politicians">Policy & Politicians</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle<?php if(is_page('research') ||
                                                  is_page('population-control')){ echo ' active'; } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Research">Research <i class="fa fa-caret-down"></i></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo home_url('research'); ?>">Research</a></li>
        <li><a href="<?php echo home_url('population-control'); ?>">Population Control</a></li>
      </ul>
    </li>
    <li<?php if(is_page('sex-education')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('sex-education'); ?>" title="Sex Education">Sex Education</a></li>
  </ul>
<?php }

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
                                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */

			 $item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			if ( ! empty( $item->attr_title ) ){
				$item_output .= '&nbsp;<span class="' . esc_attr( $item->attr_title ) . '"></span>';
			}

			$item_output .= ( $args->has_children && 0 === $depth ) ? ' </a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'General Settings',
    'menu_title' => 'General Settings',
    'menu_slug' => 'general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}

add_filter('acf/load_value/name=charities', 'allorg_acf_load_value', 10, 3);
function allorg_acf_load_value($value, $post_id, $field){
  $order = array();
  $row_key = 'field_5a09ded35ecfd';

  if(empty($value)){ return $value; }

  foreach($value as $i => $row){
    $order[$i] = $row[$row_key];
  }

  array_multisort($order, SORT_ASC, $value);

  return $value;
}