<?php
/**
 * Contains all the functions related to sidebar and widget.
 *
 * @package Theme Horse
 * @subpackage Interface-Pro
 * @since Interface-Pro 1.0
 */

/****************************************************************************************/

add_action( 'widgets_init', 'interface_widgets_init');
/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function interface_widgets_init() {

	// Registering main left sidebar
	register_sidebar( array(
		'name' 				=> __( 'Left Sidebar', 'interface' ),
		'id' 					=> 'interface_left_sidebar',
		'description'   	=> __( 'Shows widgets at Left side.', 'interface' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>'
		) );

	// Registering main right sidebar
	register_sidebar( array(
		'name' 				=> __( 'Right Sidebar', 'interface' ),
		'id' 					=> 'interface_right_sidebar',
		'description'   	=> __( 'Shows widgets at Right side.', 'interface' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>'
		) );
	
	// Registering Business Page template for our clients sidebar
	register_sidebar( array(
		'name' 				=> __( 'Business Page Our Clients Section', 'interface' ),
		'id' 					=> 'interface_business_page_our_client_sidebar',
		'description'   	=> __( 'Shows widgets on Business Page Template at bottom of the page. Suitable widget: Theme Horse: Featured Image', 'interface' ),
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</div>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>',
		
		) );

	// Registering Business Page template sidebar
	register_sidebar( array(
		'name' 				=> __( 'Business Page Section', 'interface' ),
		'id' 					=> 'interface_business_page_sidebar',
		'description'   	=> __( 'Shows widgets on Business Page Template. Suitable widget: Theme Horse: Featured Recent Work, Theme Horse: Testimonial, Theme Horse: Services, Theme Horse: PromoBox', 'interface' ),
		'before_widget' 	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>',
		
		) );

	// Registering contact Page sidebar
	register_sidebar( array(
		'name' 				=> __( 'Contact Page Sidebar', 'interface' ),
		'id' 					=> 'interface_contact_page_sidebar',
		'description'   	=> __( 'Shows widgets on Contact Page Template.', 'interface' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>'
		) );

	/** 
	 * Registering footer sidebar 1
	 * For upgrade compatible reason footer id not kept interface_footer_column1
	 */
	register_sidebar( array(
		'name' 				=> __( 'Footer - Column1', 'interface' ),
		'id' 					=> 'interface_footer_sidebar',
		'description'   	=> __( 'Shows widgets at footer Column 1.', 'interface' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>'
		) );

	// Registering footer sidebar 2
	register_sidebar( array(
		'name' 				=> __( 'Footer - Column2', 'interface' ),
		'id' 					=> 'interface_footer_column2',
		'description'   	=> __( 'Shows widgets at footer Column 2.', 'interface' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>'
		) );

	// Registering footer sidebar 3
	register_sidebar( array(
		'name' 				=> __( 'Footer - Column3', 'interface' ),
		'id' 					=> 'interface_footer_column3',
		'description'   	=> __( 'Shows widgets at footer Column 3.', 'interface' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>'
		) );
	// Registering Testimonial Page template for our clients sidebar
	register_sidebar( array(
		'name' 				=> __( 'Testimonial Page Section', 'interface' ),
		'id' 					=> 'interface_testimonial_page_our_client_sidebar',
		'description'   	=> __( 'Shows widgets on Testimonial Page Template. Suitable widget: Theme Horse: Testimonial', 'interface' ),
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</div>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>',
		
		) );
	
	// Registering services Page template
	register_sidebar( array(
		'name' 				=> __( 'Services Page Section', 'interface' ),
		'id' 					=> 'interface_services_page_section',
		'description'   	=> __( 'Shows widgets on Services Page Template. Suitable widget: Theme Horse: Services', 'interface' ),
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</div>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>',
		
		) );
	
	// Registering Ourteam Page template
	register_sidebar( array(
		'name' 				=> __( 'Our Team Page Section', 'interface' ),
		'id' 					=> 'interface_ourteam_page_section',
		'description'   	=> __( 'Shows widgets on Our Team Page Template. Suitable widget: Theme Horse: Our Team Recommended image size (222 * 222)px.' , 'interface' ),
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</div>',
		'before_title'  	=> '<h2 class="widget-title">',
		'after_title'   	=> '</h2>',
		
		) );

	// Registering widgets
	register_widget( "interface_custom_tag_widget" );
	register_widget( "interface_service_widget" );
	register_widget( "interface_promobox_widget" );
	register_widget( "interface_recent_work_widget" );
	register_widget( "interface_Widget_Testimonial" );
	register_widget( "interface_featured_image_widget" );
	register_widget( "interface_ourteam_widget" );

}

/****************************************************************************************/

/** 
 * Extends class wp_widget
 * 
 * Creates a function CustomTagWidget
 * $widget_ops option array passed to wp_register_sidebar_widget().
 * $control_ops option array passed to wp_register_widget_control().
 * $name, Name for this widget which appear on widget bar.
 */
class interface_custom_tag_widget extends WP_Widget {
	function interface_custom_tag_widget() {
		$widget_ops = array( 'classname' => 'widget_custom-tagcloud', 'description' => __( 'Displays Custom Tag Cloud', 'interface' ) );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name = __( 'Theme Horse: Custom Tag Cloud', 'interface' ), $widget_ops, $control_ops );
	}
	
	/** Displays the Widget in the front-end.
	 * 
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = empty( $instance[ 'title' ] ) ? 'Tags' : $instance[ 'title' ];
		
		echo $before_widget;

		if ( $title ):
			echo $before_title . $title . $after_title;
		endif;

		wp_tag_cloud('smallest=13&largest=13px&unit=px');

		echo $after_widget;
	}
	
	/**
	 * update the particular instant  
	 * 
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}	
	
	/**
	 * Creates the form for the widget in the back-end which includes the Title 
	 * $instance Current settings
	 */
	function form($instance) {
		$instance = wp_parse_args( ( array ) $instance, array( 'title'=>'Tags' ) );
		$title = esc_attr( $instance[ 'title' ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e( 'Title:', 'interface' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php			
	}
}

/**
 * Widget for business layout that shows selected page content,title and featured image.
 * Construct the widget. 
 * i.e. Name, description and control options.
 */
class interface_service_widget extends WP_Widget {
	function interface_service_widget() {
		$widget_ops = array( 'classname' => 'widget_service', 'description' => __( 'Display Services( Business Layout )', 'interface' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::__construct( false, $name = __( 'Theme Horse: Services', 'interface' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'number' => '8','page_id0'=>'','page_id1'=>'','page_id2'=>'','page_id3'=>'','page_id4'=>'','page_id5'=>'','page_id6'=>'','page_id7'=>'',));
		$number = absint( $instance[ 'number' ] );
		for ( $i=0; $i<$number; $i++ ) {
			$var = 'page_id'.$i;
			$defaults[$var] = '';
		} ?>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e( 'Number of Services:', 'interface' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<?php	for ( $i=0; $i<$number; $i++ ) {
			$var = 'page_id'.$i;
			$var = absint( $instance[ $var ] );
		}
		?>
		<?php for( $i=0; $i<$number; $i++) { ?>
		<p>
			<label for="<?php echo $this->get_field_id( key($defaults) ); ?>">
				<?php _e( 'Page', 'interface' ); ?>
				:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( key($defaults) ), 'selected' => $instance[key($defaults)] ) ); ?>
			</p>
			<?php
		next( $defaults );// forwards the key of $defaults array
	}
}

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['number'] = absint( $new_instance['number'] );

	for( $i=0; $i<$instance['number']; $i++ ) {
		$var = 'page_id'.$i;
		$instance[ $var] = absint( $new_instance[ $var ] );
	}

	return $instance;
}

function widget( $args, $instance ) {
	extract( $args );
	extract( $instance );
	$number = empty( $instance['number'] ) ? 8 : $instance['number'];

	global $post;
	global $options, $array_of_default_settings;
 	$options = wp_parse_args( get_option( 'interface_theme_options', array() ), interface_get_option_defaults());
	$page_array = array();
	for( $i=0; $i<$number ; $i++ ) {
		$var = 'page_id'.$i;
		$page_id = isset( $instance[ $var ] ) ? $instance[ $var ] : '';

		if( !empty( $page_id ) )
 				array_push( $page_array, $page_id );// Push the page id in the array
 		}
 		$get_featured_pages = new WP_Query( array(
 			'posts_per_page' 			=> -1,
 			'post_type'					=>  array( 'page' ),
 			'post__in'		 			=> $page_array,
 			'orderby' 		 			=> 'post__in'
 			) ); 
 			echo $before_widget; ?>
 			<div class="column clearfix">
 				<?php 
 				$j = 1;
 				while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
 				$page_title = get_the_title();
 				if( $j % 4 == 3 && $j > 1 ) {
 					$service_class = "one-fourth clearfix-half";
 				}
 				elseif ( $j % 4 == 1 && $j > 1 ) {
 					$service_class = "one-fourth clearfix-half clearfix-fourth";
 				}	
 				else {
 					$service_class = "one-fourth";
 				}			
 				?>
 				<div class="<?php echo $service_class; ?>">
 					<div class="service-item clearfix">
 						<?php 
 						if ( has_post_thumbnail() ) : ?>
 							<div class="service-icon">
 								<a class="more-link" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
 									<?=get_the_post_thumbnail( $post->ID, 'icon' )?>
 								</a>
 							</div>
 						<?php endif; ?>
 						<h3 class="service-title"><?php echo esc_attr($page_title); ?></h3>
 					</div>
 					<!-- .service-item -->
 					<article>
 						<?php the_excerpt(); ?>
 					</article>
 					<?php if( !empty( $options[ 'post_excerpt_more_text' ] ) ) { ?>
 					<a class="more-link" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
 						<?php echo $options[ 'post_excerpt_more_text' ]; ?></a>
 						<?php } ?>
 					</div>
 					<!-- .one-fourth -->
 					<?php $j++; ?>
 					<?php endwhile;
		 		// Reset Post Data
 					wp_reset_query(); 
 					?>
 				</div>
 				<!-- .column --> 
 				<?php echo $after_widget;
 			}
 		}

 		/**************************************************************************************/
/**
 * Widget for business layout that shows Promo Box.
 * Construct the widget. 
 * i.e. Home Page PromoBox1, Home Page PromoBox2, Redirect Button Text and Redirect Button Link
 */
class interface_promobox_widget extends WP_Widget {
	function interface_promobox_widget() {
		$widget_ops = array( 'classname' => 'widget_promotional_bar clearfix', 'description' => __( 'Display PromoBox( Business Layout )', 'interface' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::__construct( false, $name = __( 'Theme Horse: PromoBox', 'interface' ), $widget_ops, $control_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
		$widget_primary = apply_filters( 'widget_primary', empty( $instance['widget_primary'] ) ? '' : $instance['widget_primary'], $instance, $this->id_base );
		$widget_secondary = apply_filters( 'widget_secondary', empty( $instance['widget_secondary'] ) ? '' : $instance['widget_secondary'], $instance, $this->id_base );
		$redirect_text = apply_filters( 'redirect_text', empty( $instance['redirect_text'] ) ? '' : $instance['redirect_text'], $instance );
		
		$widget_redirecturl = apply_filters( 'widget_redirecturl', empty( $instance['widget_redirecturl'] ) ? '' : $instance['widget_redirecturl'], $instance, $this->id_base );

		echo $before_widget;
		if ( !empty( $widget_primary ) ) { echo '<div class="promotional-text">' . esc_html( $widget_primary ); } ?> <span> <?php echo esc_html( $widget_secondary ); ?> </span> <?php echo '</div>';?> <a class="call-to-action" href="<?php echo esc_html($widget_redirecturl); ?>" title="<?php echo esc_attr($redirect_text); ?>"><?php echo esc_attr( $redirect_text ); ?></a>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['widget_primary'] = esc_textarea($new_instance['widget_primary']);
		$instance['widget_secondary'] = esc_textarea($new_instance['widget_secondary']);
		$instance['widget_redirecturl'] = esc_url($new_instance['widget_redirecturl']);
		$instance['redirect_text'] =  strip_tags($new_instance['redirect_text']);
		
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'widget_primary' => '', 'widget_secondary' => '', 'redirect_text' =>'', 'widget_redirecturl'=>'' ) );
		$widget_primary = esc_textarea($instance['widget_primary']);
		$widget_secondary = esc_textarea($instance['widget_secondary']);
		$redirect_text = strip_tags($instance['redirect_text']);
		$widget_redirecturl = esc_url($instance['widget_redirecturl']);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('widget_primary'); ?>">
				<?php _e( 'Primary Promotional:', 'interface' ); ?>
			</label>
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('widget_primary'); ?>" name="<?php echo $this->get_field_name('widget_primary'); ?>"><?php echo $widget_primary; ?></textarea>
		</p>
		<?php _e( 'Secondary Promotional','interface'); ?>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('widget_secondary'); ?>" name="<?php echo $this->get_field_name('widget_secondary'); ?>"><?php echo $widget_secondary; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id('redirect_text'); ?>">
				<?php _e( 'Redirect Text:', 'interface' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('redirect_text'); ?>" name="<?php echo $this->get_field_name('redirect_text'); ?>" type="text" value="<?php echo esc_attr($redirect_text); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('widget_redirecturl'); ?>">
				<?php _e( 'Redirect Url:', 'interface' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('widget_redirecturl'); ?>" name="<?php echo $this->get_field_name('widget_redirecturl'); ?>" type="text" value="<?php echo $widget_redirecturl; ?>" />
		</p>
		<?php
	}
}
/**************************************************************************************/

/**
 * Widget for business layout that shows Featured page title and featured image.
 * Construct the widget. 
 * Widget for the recent work
 * i.e. Name, description and control options.
 */
class interface_recent_work_widget extends WP_Widget {
	function interface_recent_work_widget() {
		$widget_ops = array( 'classname' => 'widget_recent_work', 'description' => __( 'Use this widget to show recent work, portfolio or any pages as your wish ( Business Layout )', 'interface' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::__construct( false, $name = __( 'Theme Horse: Featured Recent Work', 'interface' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		for ( $i=0; $i<3; $i++ ) {
			$var = 'page_id'.$i;
			$defaults[$var] = '';
		}
		$att_defaults = $defaults;
		$att_defaults['title'] = '';
		$att_defaults['text'] = '';
		$att_defaults['redirect_recentwork'] = '';
		$att_defaults['redirect_recenturl'] = '';
		
		$instance = wp_parse_args( (array) $instance, $att_defaults );
		for ( $i=0; $i<3; $i++ ) {
			$var = 'page_id'.$i;
			$var = absint( $instance[ $var ] );
		}
		$title = esc_attr( $instance[ 'title' ] );
		$text = esc_textarea($instance['text']);
		$redirect_recentwork = strip_tags($instance['redirect_recentwork']);
		$redirect_recenturl = esc_url($instance['redirect_recenturl']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e( 'Title:', 'interface' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php _e( 'Description','interface' ); ?>
		<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_attr($text); ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id('redirect_recentwork'); ?>">
				<?php _e( 'Redirect Text:', 'interface' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('redirect_recentwork'); ?>" name="<?php echo $this->get_field_name('redirect_recentwork'); ?>" type="text" value="<?php echo esc_attr($redirect_recentwork); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('widget_redirecturl'); ?>">
				<?php _e( 'Redirect Url:', 'interface' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('redirect_recenturl'); ?>" name="<?php echo $this->get_field_name('redirect_recenturl'); ?>" type="text" value="<?php echo esc_html($redirect_recenturl); ?>" />
		</p>
		<?php
		for( $i=0; $i<3; $i++) { 
			?>
			<p>
				<label for="<?php echo $this->get_field_id( key($defaults) ); ?>">
					<?php _e( 'Page', 'interface' ); ?>
					:</label>
					<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( key($defaults) ), 'selected' => $instance[key($defaults)] ) ); ?>
				</p>
				<?php
		next( $defaults );// forwards the key of $defaults array
	}
}

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	$instance['redirect_recenturl'] = esc_url($new_instance['redirect_recenturl']);
	$instance['redirect_recentwork'] =  strip_tags($new_instance['redirect_recentwork']);
	for( $i=0; $i<3; $i++ ) {
		$var = 'page_id'.$i;
		$instance[ $var] = absint( $new_instance[ $var ] );
	}
	if ( current_user_can('unfiltered_html') )
		$instance['text'] =  $new_instance['text'];
	else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$redirect_recentwork = apply_filters( 'redirect_recentwork', empty( $instance['redirect_recentwork'] ) ? '' : $instance['redirect_recentwork'], $instance );
		
		$redirect_recenturl = apply_filters( 'redirect_recenturl', empty( $instance['redirect_recenturl'] ) ? '' : $instance['redirect_recenturl'], $instance, $this->id_base );
		$page_array = array();
		for( $i=0; $i<6; $i++ ) {
			$var = 'page_id'.$i;
			$page_id = isset( $instance[ $var ] ) ? $instance[ $var ] : '';

			if( !empty( $page_id ))
 				array_push( $page_array, $page_id );// Push the page id in the array
 		}
 		$get_featured_pages = new WP_Query( array(
 			'posts_per_page' 			=> -1,
 			'post_type'					=>  array( 'page' ),
 			'post__in'		 			=> $page_array,
 			'orderby' 		 			=> 'post__in'
 			) );
 		echo $before_widget;
 		echo '<div class="column clearfix">';
 		if ( !empty( $title ) ) { echo '<div class="one-fourth">' . $before_title . esc_html( $title ) . $after_title; ?>
 		<p><?php echo esc_textarea( $text ); ?></p>
 		<a class="call-to-action" href="<?php echo esc_html($redirect_recenturl); ?>" title="<?php echo esc_attr($redirect_recentwork); ?>"><?php echo esc_attr( $redirect_recentwork ); ?></a> <!-- .call-to-action --> 
 		<?php echo  '</div>';  }

 		$j = 1;
 		while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
 		$page_title = get_the_title();
 		if( $j % 4 == 2 && $j > 1 ) {
 			$service_class = "one-fourth clearfix-half";
 		}

 		else {
 			$service_class = "one-fourth";
 		}	
 		?>
 		<div class="<?php echo $service_class; ?>">
 			<?php 
 			if ( has_post_thumbnail( ) ) {
 				echo '<a title="'.get_the_title().'" ' .'href="'.get_permalink().'">'.get_the_post_thumbnail( $post->ID,'gallery').'</a>';				
 			}
 			?>
 			<h3 class="custom-gallery-title"><a href="<?php the_permalink(); ?>" title=""><?php echo esc_attr($page_title); ?></a></h3>
 			<p><?php echo get_the_excerpt(); ?></p>
 		</div>
 		<!-- .one-fourth -->
 		<?php  $j++;
 		endwhile;
		 		// Reset Post Data
 		wp_reset_query(); 
 		?>
 		<?php 
 		echo  '</div>'; 
 		echo $after_widget;
 	}
 }

 /**************************************************************************************/

 /**
 * Testimonial widget
 */
 class interface_Widget_Testimonial extends WP_Widget {

 	function interface_Widget_Testimonial() {
 		$widget_ops = array( 'classname' => 'widget_testimonial', 'description' => __( 'Display Testimonial( Business Layout )recommendation size (168 * 168)', 'interface' ) );
 		$control_ops = array( 'width' => 200, 'height' =>250 ); 
 		parent::__construct( false, $name = __( 'Theme Horse: Testimonial', 'interface' ), $widget_ops, $control_ops);
 	}



 	function form( $instance ) {

 		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number' => '2', 'image1' => '', 'text1' => '', 'name1' =>'', 'designation1'=>'','company_name1'=>'','company_link1'=>'', 'image2'=>'', 'text2'=>'','name2'=>'','designation2'=>'','company_name2'=>'','company_link2'=>'' ) );
 		$title = strip_tags($instance['title']);
 		$number = absint( $instance[ 'number' ] );

 		for ( $i=1; $i<=$number; $i++ ) {
 			$image = 'image'.$i;	
 			$text  = 'text'.$i;
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$company_name = 'company_name'.$i;
 			$company_link = 'company_link'.$i;

 			$instance[ $image ] = esc_url( $instance[ $image ] );
 			$instance[ $text ] = strip_tags( $instance[ $text ] );
 			$instance[ $name ] = strip_tags( $instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $instance[ $designation ] );
 			$instance[ $company_name ] = strip_tags( $instance[ $company_name ] );
 			$instance[ $company_link ] = esc_url( $instance[ $company_link ] );


 		}
 		?>
 		<p>
 			<label for="<?php echo $this->get_field_id('number'); ?>">
 				<?php _e( 'Number of Testimonial:', 'interface' ); ?>
 			</label>
 			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
 			<input type="submit" name="savewidget" id="widget-interface_testimonial-3-savewidget" class="button button-primary widget-control-save right" value="Save">			<span class="spinner"></span>
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id('title'); ?>">
 				<?php _e( 'Title:', 'interface' ); ?>
 			</label>
 			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
 		</p>
 		<p>&nbsp; </p>
 		<?php for ( $i=1; $i<=$number; $i++ ) {
 			$image = 'image'.$i;	
 			$text  = 'text'.$i;
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$company_name = 'company_name'.$i;
 			$company_link = 'company_link'.$i;

 			$instance[ $image ] = esc_url( $instance[ $image ] );
 			$instance[ $text ] = strip_tags( $instance[ $text ] );
 			$instance[ $name ] = strip_tags( $instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $instance[ $designation ] );
 			$instance[ $company_name ] = strip_tags( $instance[ $company_name ] );
 			$instance[ $company_link ] = esc_url( $instance[ $company_link ] );

 			?>
 			<p>
 				<input class="upload1" type="text"  name="<?php echo $this->get_field_name($image); ?>" value="<?php if(isset ( $instance[$image] ) ) 
 				echo esc_url( $instance[$image] ); ?>" />
 				<input class="upload-button1" name="image-add" type="button" value="<?php esc_attr_e( 'Add Image', 'interface' ); ?>" />
 			</p>
 			<?php _e( 'Testimonial Description '.$i,'interface'); ?>
 			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id($text); ?>" name="<?php echo $this->get_field_name($text); ?>"><?php if(isset ( $instance[$text] ) ) echo esc_attr( $instance[$text] ); ?></textarea>
 			<p>
 				<label for="<?php echo $this->get_field_id('name'); ?>">
 					<?php _e( 'Name '.$i, 'interface' ); ?>
 				</label>
 				<input class="widefat" id="<?php echo $this->get_field_id($name); ?>" name="<?php echo $this->get_field_name($name); ?>" type="text" value="<?php if(isset ( $instance[$name] ) ) echo esc_attr( $instance[$name] ); ?>" />
 			</p>
 			<p>
 				<label for="<?php echo $this->get_field_id('designation'); ?>">
 					<?php _e( 'Designation '.$i, 'interface' ); ?>
 				</label>
 				<input class="widefat" id="<?php echo $this->get_field_id($designation); ?>" name="<?php echo $this->get_field_name($designation); ?>" type="text" value="<?php if(isset ( $instance[$designation] ) ) echo esc_attr( $instance[$designation] ); ?>" />
 			</p>
 			<p>
 				<label for="<?php echo $this->get_field_id('company_name'); ?>">
 					<?php _e( 'Comapany Name '.$i, 'interface' ); ?>
 				</label>
 				<input class="widefat" id="<?php echo $this->get_field_id($company_name); ?>" name="<?php echo $this->get_field_name($company_name); ?>" type="text" value="<?php if(isset ( $instance[$company_name] ) ) echo esc_attr( $instance[$company_name] ); ?>" />
 			</p>
 			<p>
 				<label for="<?php echo $this->get_field_id('company_link'); ?>">
 					<?php _e( 'Company Link '.$i, 'interface' ); ?>
 				</label>
 				<input class="widefat" id="<?php echo $this->get_field_id($company_link); ?>" name="<?php echo $this->get_field_name($company_link); ?>" type="text" value="<?php if(isset ( $instance[$company_link] ) ) echo esc_url_raw( $instance[$company_link] ); ?>" />
 			</p>
 			<p>&nbsp; </p>
 			<hr>
 			<p>&nbsp; </p>

 			<?php
 		}
 	}

 	function update( $new_instance, $old_instance ) {

 		$instance = $old_instance;
 		$instance['title'] = strip_tags($new_instance['title']);
 		$instance['number'] = absint( $new_instance['number'] );

 		for( $i=1; $i<=$instance['number']; $i++ ) {
 			$image = 'image'.$i;	
 			$text  = 'text'.$i;
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$company_name = 'company_name'.$i;
 			$company_link = 'company_link'.$i;
 			$instance[ $image ] = esc_url_raw( $new_instance[ $image ] );
 			$instance[ $text ] = strip_tags( $new_instance[ $text ] );
 			$instance[ $name ] = strip_tags( $new_instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $new_instance[ $designation ] );
 			$instance[ $company_name ] = strip_tags( $new_instance[ $company_name ] );
 			$instance[ $company_link ] = esc_url_raw( $new_instance[ $company_link ] );
 		}
 		return $instance;

 	}

 	function widget( $args, $instance ) {
 		extract($args);
 		$title = empty( $instance['title'] ) ? '' : $instance['title'];
 		$number = empty( $instance['number'] ) ? 2 : $instance['number'];
 		$image_array = array();
 		$text_array = array();
 		$name_array = array();
 		$designation_array = array();
 		$company_name_array = array();
 		$company_link_array = array();

 		for( $i=1; $i<=$number; $i++ ) {
 			$image = 'image'.$i;	
 			$text  = 'text'.$i;
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$company_name = 'company_name'.$i;
 			$company_link = 'company_link'.$i;

 			$image = isset( $instance[ $image ] ) ? $instance[ $image ] : '';
 			$text = isset( $instance[ $text ] ) ? $instance[ $text ] : ''; 	
 			$name = isset( $instance[ $name ] ) ? $instance[ $name ] : '';
 			$designation = isset( $instance[ $designation ] ) ? $instance[ $designation ] : ''; 
 			$company_name = isset( $instance[ $company_name ] ) ? $instance[ $company_name ] : '';
 			$company_link = isset( $instance[ $company_link ] ) ? $instance[ $company_link ] : ''; 
 	if( !empty( $image )  || !empty( $text ) || !empty( $name ) || !empty( $designation )|| !empty( $company_name )|| !empty( $company_link ))  {		
 			if( !empty( $image ) )
 				array_push( $image_array, $image ); 
 			else array_push($image_array, "");
 			if( !empty( $text ) )
 				array_push( $text_array, $text ); 
 			else array_push($text_array, "");
 			if( !empty( $name ) )
				array_push( $name_array, $name );
				else array_push($name_array, ""); 
			if( !empty( $designation ) )
				array_push( $designation_array, $designation ); 
			else array_push($designation_array, "");
			if( !empty( $company_name ) )
				array_push( $company_name_array, $company_name ); 
			else array_push($company_name_array, "");
			if( !empty( $company_link ) )
				array_push( $company_link_array, $company_link );
			else array_push($company_link_array, "");
		}
	}

		echo $before_widget;

		if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
		<div class="column clearfix">
			<?php
			$j = 1;
			for( $i=0; $i<$number; $i++ ) {
				if( $j % 2 == 1 && $j > 1 ) {
					$testimonial_class = "one-half clearfix";
				}else{
					$testimonial_class = "one-half";
				}
				if((!empty($image_array[$i])) ||(!empty($name_array[$i])) ||(!empty($text_array[$i])) ||(!empty($designation_array[$i])) ||
					(!empty($company_name_array[$i])) ||(!empty($company_link_array[$i])) ){ ?>
				<div class="<?php echo $testimonial_class; ?>">
					<?php if(!empty($image_array[$i])){ ?> 
					<div class="testimonial-image"> <img src="<?php if(!empty($image_array[$i])){ echo $image_array[$i]; } ?>" title="<?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?>" alt="<?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?>" /> </div>
					<?php }?>
					<?php if((!empty($text_array[$i])) ||(!empty($name_array[$i])) ||(!empty($designation_array[$i]))||(!empty($company_name_array[$i]))||(!empty($company_link_array[$i]))){ ?>
					<div class="testimonial-content">
						<p><?php if(!empty($text_array[$i])){ echo esc_html($text_array[$i]); }?></p>
						<div class="testimonial-meta"> <strong><?php if(!empty($name_array[$i])){ echo esc_attr($name_array[$i]); } ?></strong> <?php if(!empty($designation_array[$i])){ echo esc_attr($designation_array[$i]); } if(!empty($company_name_array[$i])){  echo ' - '; } ?> <a href="<?php 
						if(!empty($company_link_array[$i])){  echo $company_link_array[$i]; } ?>" title="<?php if(!empty($company_link_array[$i])){ echo esc_html($company_link_array[$i]); } ?>" target="_blank"> <?php if(!empty($company_name_array[$i])){ echo esc_attr($company_name_array[$i]); }?></a> </div>
					</div>
					<?php } ?>
				</div>
				<?php } 
				$j++;
			}?>
		</div>
		<?php 
		
		echo $after_widget;
	}
}

/*********************************************************************************************************/
class interface_featured_image_widget extends WP_Widget {

	function interface_featured_image_widget() {
		$widget_ops = array( 'classname' => 'widget_ourclients', 'description' => __( 'Use to show your clients logos or any thing.', 'interface') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name='Theme Horse: Featured Image', $widget_ops, $control_ops );
	}

	function form( $instance ) {		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number' => '5', 'path0' => '', 'path1' => '', 'path2' => '', 'path3' => '', 'path4' => '', 'redirectlink0' => '', 'redirectlink1' => '', 'redirectlink2' => '', 'redirectlink3' => '', 'redirectlink4' => '') );	
		$title = strip_tags($instance['title']);
		$number = absint( $instance[ 'number' ] );	 
		for ( $i=0; $i<$number; $i++ ) {
			$var = 'path'.$i;
			$var1 = 'redirectlink'.$i;
			$instance[ $var ] = esc_url( $instance[ $var ] );
			$instance[ $var1 ] = esc_url( $instance[ $var1 ] );
		}		
		?>
		<p class="description">
			<?php _e( 'Note: Recommended size for the image is 400px (width) and 150px (height). If you want more image adding fields then first enter the number and click on Save, this will allow you more image adding fields', 'interface' ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Image Title:', 'interface'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e( 'Number of Images:', 'interface' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<?php for ( $i=0; $i<$number; $i++ ) {
			$var = 'path'.$i;
			$var1 = 'redirectlink'.$i;
			?>
			<p>
				<input type="text" class="upload1" name="<?php echo $this->get_field_name( $var ); ?>" value="<?php if(isset ( $instance[$var] ) ) echo esc_url( $instance[$var] ); ?>" />
				<input class="upload-button1" name="image-add" type="button" value="<?php echo esc_attr( 'Add Image'); ?>" />
				<br />
			</p>
			<p>
				<?php _e('Redirect Link:', 'interface'); ?>
				<input class="widefat" name="<?php echo $this->get_field_name($var1); ?>" type="text" value="<?php if(isset ( $instance[$var1] ) ) echo esc_url( $instance[$var1] ); ?>" />
			</p>
			<?php } ?>
			<?php
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = absint( $new_instance['number'] );

			for( $i=0; $i<$instance[ 'number' ]; $i++ ) {
				$var = 'path'.$i;
				$var1 = 'redirectlink'.$i;
				$instance[ $var] = esc_url_raw( $new_instance[ $var ] );			
				$instance[ $var1] = esc_url_raw( $new_instance[ $var1 ] );
			}
			return $instance;
		}	

		function widget( $args, $instance ) {
			extract($args);
			$title = empty( $instance['title'] ) ? '' : $instance['title'];
			$number = empty( $instance['number'] ) ? 5 : $instance['number'];
			$path_array = array();
			$redirectlink_array = array();

			for( $i=0; $i<$number; $i++ ) {
				$var = 'path'.$i;
				$var1 = 'redirectlink'.$i;
				$path = isset( $instance[ $var ] ) ? $instance[ $var ] : '';
				$redirectlink = isset( $instance[ $var1 ] ) ? $instance[ $var1 ] : ''; 			
			if( !empty( $path )  || !empty( $redirectlink ))  {		

				if( !empty( $path ) ){
 				array_push( $path_array, $path ); // Push the page id in the array
		 			}else{
		 			 array_push($path_array, "");

		 			}
	 			if( !empty( $redirectlink ) ){
	 				array_push( $redirectlink_array, $redirectlink ); // Push the page id in the array
		 			}else{
		 			 array_push($redirectlink_array, "");
		 			}
		 		}
	 		}

 		echo $before_widget;


 		if ( !empty( $path_array ) ) {
 			$output = '';

 			$output .= '<div class="container">';
 			$output .= '<ul>';
 			for( $i=0; $i<$number; $i++ ) {
 				$output .= '<li>';
 				if((!empty( $redirectlink_array[$i] )) || (!empty( $path_array[$i] )) ) {
 					$output .= '<a href="'.$redirectlink_array[$i].'" title="'.$title.'" target="_blank">
 					<img src="'.$path_array[$i].'" alt="'.$title.'">
 					</a>';
 				}
 				else {
 					if(!empty($path_array[$i])){
 						$output .= '<img src="'.$path_array[$i].'" alt="'.$title.'">';
 					}
 				}

 				$output .=	'</li>';
 			}
 			$output .= '</ul>';

 			$output .= '</div>';

 			echo $output;

 		}

 		echo $after_widget;
 	}

 }
 /**************************************************************************************/

 /**
 * Our Team widget
 */
 class interface_ourteam_widget extends WP_Widget {

 	function interface_ourteam_widget() {
 		$widget_ops = array( 'classname' => 'widget_our_team', 'description' => __( 'Display OurTeam( Our Team Layout )recommendation size (168 * 168)', 'interface' ) );
 		$control_ops = array( 'width' => 200, 'height' =>250 ); 
 		parent::__construct( false, $name = __( 'Theme Horse: Our Team', 'interface' ), $widget_ops, $control_ops);
 	}



 	function form( $instance ) {

 		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number' => '3', 'image1' => '', 'text1' => '', 'name1' =>'', 'designation1'=>'','image2'=>'', 'text2'=>'','name2'=>'','designation2'=>'','image3' => '', 'text3' => '', 'name3' =>'', 'designation3'=>'' ) );
 		$title = strip_tags($instance['title']);
 		$number = absint( $instance[ 'number' ] );

 		for ( $i=1; $i<=$number; $i++ ) {
 			$image = 'image'.$i;	
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$text  = 'text'.$i;

 			$instance[ $image ] = esc_url( $instance[ $image ] );
 			$instance[ $name ] = strip_tags( $instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $instance[ $designation ] );
 			$instance[ $text ] = strip_tags( $instance[ $text ] );


 		}
 		?>
 		<p>
 			<label for="<?php echo $this->get_field_id('number'); ?>">
 				<?php _e( 'Number of OurTeam:', 'interface' ); ?>
 			</label>
 			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /> 
 			<input type="submit" name="savewidget" id="widget-interface_ourteam_widget-2-savewidget" class="button button-primary widget-control-save right" value="Save">			<span class="spinner" style="display: none;"></span>
 		</p>

 		<p>
 			<label for="<?php echo $this->get_field_id('title'); ?>">
 				<?php _e( 'Title:', 'interface' ); ?>
 			</label>
 			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
 		</p>
 		<p>&nbsp; </p>
 		<?php for ( $i=1; $i<=$number; $i++ ) {
 			$image = 'image'.$i;	
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$text  = 'text'.$i;

 			$instance[ $image ] = esc_url( $instance[ $image ] );
 			$instance[ $name ] = strip_tags( $instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $instance[ $designation ] );
 			$instance[ $text ] = strip_tags( $instance[ $text ] );

 			?>
 			<p>
 				<input class="upload1" type="text"  name="<?php echo $this->get_field_name($image); ?>" value="<?php if(isset ( $instance[$image] ) ) 
 				echo esc_url( $instance[$image] ); ?>" />
 				<input class="upload-button1" name="image-add" type="button" value="<?php esc_attr_e( 'Add Image', 'interface' ); ?>" />
 			</p>
 			<p>
 				<label for="<?php echo $this->get_field_id('name'); ?>">
 					<?php _e( 'Name '.$i, 'interface' ); ?>
 				</label>
 				<input class="widefat" id="<?php echo $this->get_field_id($name); ?>" name="<?php echo $this->get_field_name($name); ?>" type="text" value="<?php if(isset ( $instance[$name] ) ) echo esc_attr( $instance[$name] ); ?>" />
 			</p>
 			<p>
 				<label for="<?php echo $this->get_field_id('designation'); ?>">
 					<?php _e( 'Designation '.$i, 'interface' ); ?>
 				</label>
 				<input class="widefat" id="<?php echo $this->get_field_id($designation); ?>" name="<?php echo $this->get_field_name($designation); ?>" type="text" value="<?php if(isset ( $instance[$designation] ) ) echo esc_attr( $instance[$designation] ); ?>" />
 			</p>
 			<?php _e( 'OurTeam Description '.$i,'interface'); ?>
 			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id($text); ?>" name="<?php echo $this->get_field_name($text); ?>"><?php if(isset ( $instance[$text] ) ) echo esc_attr( $instance[$text] ); ?></textarea>
 			<p>&nbsp; </p>
 			<hr>
 			<p>&nbsp; </p>
 			<?php
 		}
 	}

 	function update( $new_instance, $old_instance ) {

 		$instance = $old_instance;
 		$instance['title'] = strip_tags($new_instance['title']);
 		$instance['number'] = absint( $new_instance['number'] );

 		for( $i=1; $i<=$instance['number']; $i++ ) {
 			$image = 'image'.$i;	
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$text  = 'text'.$i;


 			$instance[ $image ] = esc_url_raw( $new_instance[ $image ] );
 			$instance[ $name ] = strip_tags( $new_instance[ $name ] );
 			$instance[ $designation ] = strip_tags( $new_instance[ $designation ] );			
 			$instance[ $text ] = strip_tags( $new_instance[ $text ] );
 		}
 		return $instance;

 	}

 	function widget( $args, $instance ) {
 		extract($args);
 		global $options, $array_of_default_settings;
 		$options = wp_parse_args( get_option( 'interface_theme_options', array() ), interface_get_option_defaults()); 
 		$title = empty( $instance['title'] ) ? '' : $instance['title'];
 		$number = empty( $instance['number'] ) ? 2 : $instance['number'];
 		$image_array = array();
 		$name_array = array();
 		$designation_array = array();
 		$text_array = array();



 		for( $i=1; $i<=$number; $i++ ) {
 			$image = 'image'.$i;	
 			$name  = 'name'.$i;
 			$designation = 'designation'.$i;
 			$text  = 'text'.$i;

 			$image = isset( $instance[ $image ] ) ? $instance[ $image ] : '';
 			$name = isset( $instance[ $name ] ) ? $instance[ $name ] : '';
 			$designation = isset( $instance[ $designation ] ) ? $instance[ $designation ] : ''; 
 			$text = isset( $instance[ $text ] ) ? $instance[ $text ] : ''; 	

if( !empty( $image )  || !empty( $name ) || !empty( $designation ) || !empty( $text ))  {
 			if( !empty( $image ) )
 				array_push( $image_array, $image ); // Push the page id in the array
 			 else array_push($image_array, "");

 			if( !empty( $name ) )
				array_push( $name_array, $name ); // Push the page id in the array
			 	else array_push($name_array, "");

			if( !empty( $designation ) )
				array_push( $designation_array, $designation ); // Push the page id in the array
			 	else array_push($designation_array, "");

			if( !empty( $text ) )
 				array_push( $text_array, $text ); // Push the page id in the array
 			 	else array_push($text_array, "");
}
 		}

 		echo $before_widget;

 		if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
 		<div class="column clearfix">

 			<?php 
 			$j = 1;
 			for( $i=0; $i<$number; $i++ ) { 
 				if( $j % 4 == 1 && $j > 1 ) {
 					$ourteam_class = "one-fourth clearfix-half-team clearfix-fourth";
 				}
 				elseif ( $j % 3 == 1 && $j > 1 ) {
 					if($j<=4){
 						$ourteam_class = "one-fourth clearfix-third-team";
 					}else{
 						$ourteam_class = "one-fourth clearfix-half-team clearfix-third-team";
 					}
 				}
 				elseif ($j % 2 == 1 && $j > 1 ) {
 					$ourteam_class = "one-fourth clearfix-half-team";
 				}		
 				else{

 					$ourteam_class = "one-fourth";
 				}	?>
 				<?php if(!empty($image_array[$i]) || !empty($text_array[$i])){?>
 				<div class="<?php echo $ourteam_class; ?>">
 				<?php if(!empty($image_array[$i])){ ?>
 					<div class="our-team-photo"> <img src="<?php echo $image_array[$i]; ?>" title="<?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?>" alt="<?php if(!empty($image_array[$i])){ echo $name_array[$i]; }?>" /> </div>
 				<?php }
 					if(!empty($text_array[$i])){?>
 					<div class="our-team-content">
 						<h3 class="our-team-name"><?php if(!empty($name_array[$i])){ echo $name_array[$i]; } ?></h3> <div class="our-team-designation"><?php if(!empty($designation_array[$i])){ echo' - '; echo $designation_array[$i]; }?></div>
 						<p><?php echo $text_array[$i]; ?></p>
 					</div><!-- .our-team-content -->
 				<?php } ?>
 				</div><!-- .one-fourth -->
 				<?php } ?>
 				<?php  $j++ ;
 			}
 			?>
 		</div>
 		<?php 

 		echo $after_widget;
 	}
 }

 /*********************************************************************************************************/
 ?>
