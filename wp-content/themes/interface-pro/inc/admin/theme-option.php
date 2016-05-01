<?php
/**
 * Interface Pro Theme Options
 *
 * Contains all the function related to theme options.
 *
 * @package Theme Horse
 * @subpackage Interface Pro
 * @since Interface Pro 1.0
 */

/****************************************************************************************/

add_action( 'admin_enqueue_scripts', 'interface_jquery_javascript_file_cookie' );
/**
 * Register jquery cookie javascript file.
 *
 * jquery cookie used for remembering admin tabs, and potential future features... so let's register it early
 *
 * @uses wp_register_script
 */
function interface_jquery_javascript_file_cookie() {
   wp_register_script( 'jquery-cookie', INTERFACE_ADMIN_JS_URL . '/jquery.cookie.min.js', array( 'jquery' ) );
}

/****************************************************************************************/

add_action( 'admin_print_scripts-appearance_page_theme_options', 'interface_admin_scripts' );
/**
 * Enqueuing some scripts.
 *
 * @uses wp_enqueue_script to register javascripts.
 * @uses wp_enqueue_script to add javascripts to WordPress generated pages.
 */
function interface_admin_scripts() {
   wp_enqueue_script( 'interface_admin', INTERFACE_ADMIN_JS_URL . '/admin.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-cookie', 'jquery-ui-sortable', 'jquery-ui-draggable' ) );
   wp_enqueue_script( 'interface_toggle_effect', INTERFACE_ADMIN_JS_URL . '/toggle-effect.js' );
   wp_enqueue_script( 'wp-color-picker' );
   wp_enqueue_script( 'interface_colorpicker', INTERFACE_ADMIN_JS_URL . '/colorpicker-admin.js', array( 'jquery','wp-color-picker' ), false, true );
}
/****************************************************************************************/

add_action( 'admin_print_styles-appearance_page_theme_options', 'interface_admin_styles' );
/**
 * Enqueuing some styles.
 *
 * @uses wp_enqueue_style to register stylesheets.
 * @uses wp_enqueue_style to add styles.
 */
function interface_admin_styles() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'interface_admin_style', INTERFACE_ADMIN_CSS_URL. '/admin.css' );
	wp_enqueue_style( 'wp-color-picker' );
}

/****************************************************************************************/

add_action( 'admin_menu', 'interface_options_menu' );
/**
 * Create sub-menu page.
 *
 * @uses add_theme_page to add sub-menu under the Appearance top level menu.
 */
function interface_options_menu() {
    
	add_theme_page( 
		__( 'Theme Options', 'interface' ),           // Name of the page
		__( 'Theme Options', 'interface' ),           // Label in menu (Inside apperance)
		'edit_theme_options',                         // Capability 
		'theme_options',                              // Menu slug, which is used to define uniquely the page
		'interface_theme_options_add_theme_page'      // Function used to rendrs the options page
	);

}

/****************************************************************************************/

add_action( 'admin_init', 'interface_register_settings' );
	/**
		* Register options and function call back of validation
		*
		* this three options interface_theme_options', 'interface_theme_options', 'interface_theme_options_validate'
		* first parameter interface_theme_options  =>    To set all field eg:- social link, design options etc.
		* second parameter interface_theme_options =>	 Option value to sanitize and save. array values etc. can be called global 
		* third parameter interface_theme_options  => 	 Call back function
		* @uses register_setting
	*/
function interface_register_settings() {
   register_setting( 'interface_theme_options', 'interface_theme_options', 'interface_theme_options_validate' );
 
}

/****************************************************************************************/
/**
 * Render the options page
 */
function interface_theme_options_add_theme_page() {
?>
<div class="them_option_block clearfix">
  <div class="theme_option_title">
    <h2>
      <?php _e( 'Theme Options by', 'interface' ); ?>
    </h2>
  </div>
  <div class="theme_option_link">
    <a href="<?php echo esc_url( __( 'http://themehorse.com/', 'interface' ) ); ?>" title="<?php esc_attr_e( 'Theme Horse', 'interface' ); ?>" target="_blank">
      <img src="<?php echo INTERFACE_ADMIN_IMAGES_URL . '/theme-horse.png'; ?>" alt="'<?php _e( 'Theme Horse', 'interface' ); ?>" />
    </a> 
  </div>
</div>
<br/>
<br/>
<br/>
<div class="donate-info">
  <?php _e( 'Some of the Theme Option settings has been moved to ', 'interface' ); ?> <a class="instruction" href="<?php echo wp_customize_url();?>" target="_blank"> <?php _e( 'Customizer', 'interface' ); ?></a> <?php  _e('where you can customize or modify apperance settings in a live Preview.','interface')?>
</div>
<div id="themehorse" class="wrap">
  <form method="post" action="options.php">
    <?php
			/**
			* should match with the register_settings first parameter of line no 117
			*/
				settings_fields( 'interface_theme_options' ); 
				global $interface_theme_default;
				$options = $interface_theme_default;             
			?>
    <?php if( isset( $_GET [ 'settings-updated' ] ) && 'true' == $_GET[ 'settings-updated' ] ): ?>
    <div class="updated" id="message">
      <p><strong>
        <?php _e( 'Settings saved.', 'interface' );?>
        </strong></p>
    </div>
    <?php endif; ?>
    <div id="interface_tabs">
      <ul id="main-navigation" class="tab-navigation">
        <li><a href="#designoptions">
          <?php _e( 'Design Options', 'interface' );?>
          </a></li>
      </ul>
      <!-- .tab-navigation #main-navigation --> 
      <!-- Option for Responsive Layout -->
      <div id="designoptions">
<?php
	$interface_typography_options = array(
		'interface_general_typography'	=> array( 
							'title' => __( 'Content','interface' ),
							'description' => __( 'Changes will reflect in content.', 'interface' )
							 ),
		'interface_navigation'			=> array( 
							'title' => __( 'Navigation','interface' ),
							'description' => __( 'Changes will reflect in the menu', 'interface' )
							 ),
		'interface_title'					=> array( 
							'title' => __( 'Title','interface' ),
							'description' => __( 'Changes will reflect in all titles', 'interface' )
							 )
						);	
	$interface_font_size_options = array(

		'content'							=> array( 
							'title' => __( 'Content','interface' )
							 ),
		'buttons'							=> array( 
							'title' => __( 'Buttons','interface' )
							 ),
		'site_title'							=> array( 
							'title' => __( 'Site Title','interface' )
							 ),
		'navigation'							=> array( 
							'title' => __( 'Navigation','interface' )
							 ),
		'navigation_child'						=> array( 
							'title' => __( 'Navigation Child','interface' )
							),
		'primary_slogan'				=> array( 
							'title' => __( 'Primary Slogan','interface' )
							 ),
		'secondary_slogan'				=> array( 
							'title' => __( 'Secondary Slogan','interface' )
							 ),
		'featured_title'								=> array( 
							'title' => __( 'Featured Title ','interface' )
							 ),
		'business_layout_widget_title'						=> array( 
							'title' => __( 'Business /Our Team/ Testimonial/ Service Template Widget Titles (Parent)','interface' )
							 ),	
		'business_layout_service_promot_featured_recentwork'	=> array( 
							'title' => __( 'Business/ Services/ Promotional/ Featured Recent Work/ Our Team Titles (Child)','interface' )
							 ),
		'post_title'						=> array( 
							'title' => __( 'Post Title','interface' )
							 ),
		'sidebar_colophon_widget_title'						=> array( 
							'title' => __( 'Sidebar/Colophon Widget Title','interface' )
							 )							
						);
				?>
				
        <div class="option-container">
        <h3 class="option-toggle"><a href="#"><?php _e( 'Typography Options', 'interface' ); ?></a></h3>
        <?php /* Font family */ ?>
        <div class="option-content inside">
            <table class="form-table">  
                    <tr>
                        <th>
                            <h3><?php _e( 'Font Family','interface' ); ?></h3>
                        </th>
                    </tr>    
                <?php foreach( $interface_typography_options as $key => $interface_typography_option ) { ?>
                    <tr>
                        <th scope="row">
                            <label for="<?php echo $key; ?>"><?php echo $interface_typography_option[ 'title' ]; ?></label>
                            <p><small><?php printf( __( '%s', 'interface' ), $interface_typography_option[ 'description' ] ); ?></small></p>
                        </th>
                        <td>
                            <div class="<?php echo $key; ?>">
                              <select class="selected" name="interface_theme_options[<?php echo $key; ?>]" id="<?php echo $key; ?>">
                                 <?php 
                                 foreach ( interface_google_fonts() as $value ) { ?>
                                       <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $options[ $key ], $value ); ?>><?php printf( esc_attr( '%s', 'interface' ), $value ); ?></option>
                                 <?php } ?>
                              </select>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        
            <?php /* Font sizes */ ?>
            <table class="form-table">  
                    <tr>
                        <th>
                            <h3><?php _e( 'Font Size','interface' ); ?></h3>
                        </th>
                    </tr>    
                <?php foreach( $interface_font_size_options as $key => $interface_font_size_options ) { ?>
                    <tr>
                        <th scope="row">
                            <label for="<?php echo $key; ?>"><?php echo $interface_font_size_options[ 'title' ]; ?></label>
                        </th>
                        <td>
                            <div class="<?php echo $key; ?>">
                              <select class="selected" name="interface_theme_options[<?php echo $key; ?>]" id="<?php echo $key; ?>">
                                 <?php 
								 $interface_multidimension = interface_font_sizes();
                                 foreach ( $interface_multidimension[$key.'_sizes'] as $value_key => $interface_font_size ) { ?>
                                       <option value="<?php echo esc_attr( $value_key ); ?>" <?php selected( $options[ $key ], $value_key ); ?>><?php printf( esc_attr( '%s', 'interface' ), $interface_font_size ); ?></option>
                                 <?php } ?>
                              </select>
                              <?php _e( 'px','interface' ); ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p>
            <p class="submit"><input type="submit" name="interface_theme_options[reset_font_family]" class="button-primary reset" value="Reset Defaults" /></p>
        </div><!-- .option-content -->
        </div><!-- .option-container -->                      
        
        <div class="option-container">
        <h3 class="option-toggle"><a href="#"><?php _e( 'Color Options', 'interface' ); ?></a></h3>
        <div class="option-content inside">
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Color Skin','interface' ); ?></h3></th>
                    </tr>
                    <tr>                            
                        <th scope="row"><label for="color_scheme"><?php _e( 'Choose Color', 'interface' ); ?></label></th>
        
                            <td>
                                <div class="font">
                                    <select class="select-color" id="interface_cycle_style" name="interface_theme_options[color_scheme]">
                                        <?php 
                                            $interface_colors = array();
                                            $interface_colors = array( 		'Purple',
                                                                                    'Pink',
                                                                                    'Yellow',
                                                                                    'Orange',
                                                                                    'Brown',
                                                                                    'Maroon',
                                                                                    'Aquamarine',
                                                                                    'Cyan',
                                                                                    'Blue',
                                                                                    'Light Red',
                                                                                    'Light Green',
                                                                                    
                                                                        );
                                            foreach( $interface_colors as $interface_color ) {
                                        ?>
        
                                        <option value="<?php echo $interface_color; ?>" <?php selected( $interface_color, $options['color_scheme']); ?>><?php printf( __( '%s', 'interface' ), $interface_color ); ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    <?php     
			global $colour_options;                                            
			$colour_options = array(
				 'interface_link_color'		=> array( 
														'title' => __( 'Link Color','interface' ),
														'description' => __( 'Changes will reflect on Site Title, Navigation and links ', 'interface' )),
			  
				'interface_buttons_color'		=> array( 
														'title' => __( 'Buttons Color','interface' ),
														'description' => __( 'Changes will reflect on Buttons, Custom Tag Cloud, Paginations and Borders', 'interface' ) ),
				 'interface_slogan_slider_title_color'		=> array( 
                                                                'title' => __( 'Slogan/Slider Title Color','interface' ),
                                                                'description' => __( 'Changes will reflect on Featured Slider, Slogan and Page Title', 'interface' ) )
			);
                                    
                    foreach ( $colour_options as $key => $colour_option) :
                    ?>      	
                    <tr>
                        <th scope="row">
                            <label for="<?php echo $key; ?>"><?php echo $colour_option['title']; ?></label>
                        </th>
                        <td width="115px">
                            <input type="text" class="color" id="<?php echo $key; ?>" name="interface_theme_options[<?php echo $key; ?>]" size="8" value="<?php echo $options[$key]; ?>" />
                        <div id="colorpicker_<?php echo $key; ?>" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
                        </td>
                        <td>
                                <p><small><?php printf( __( '%s', 'interface' ), $colour_option[ 'description' ] ); ?></small></p>
                            </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Background Color Options','interface' ); ?></h3></th>
                    </tr>
                    <?php     
                    global $background_options;                                            
                    $background_options = array(
                        'interface_top_info_bar_color'		=> array( 
                                                                'title' => __( 'Top Info Bar','interface' ) ),
                        'interface_header_color'		=> array( 
                                                                'title' => __( 'Header','interface' ) ),
                        'interface_main_content_color'		=> array( 
                                                                'title' => __( 'Main Content', 'interface' ) ),
                        'interface_promotional_clients_blockquote_sticky_color'		=> array( 
                                                                'title' => __( 'Promotional Bar, Our Clients, Blockquote and Sticky post', 'interface' ) ),
                        'interface_form_input_textarea_paginations_color'		=> array( 
                                                                'title' => __( 'Form Input/Textarea Fields and Paginations','interface' ) ),
                        'footer_widget_section_color'		=> array( 
                                                                'title' => __( ' Footer Widget Section','interface' ) ),
                        'bottom_info_bar_color'		=> array( 
                                                                'title' => __( 'Bottom Info Bar','interface' ) ),
                        'site_generator_color'		=> array( 
                                                                'title' => __( 'Site Generator','interface' ) )
                    );
                                    
                    foreach ( $background_options as $key => $background_option) :
                        ?>      	
                        <tr>
                        <th scope="row">
                            <label for="<?php echo $key; ?>"><?php echo $background_option['title']; ?></label>
                        </th>
                        <td>
                            <input type="text" class="color" id="<?php echo $key; ?>" name="interface_theme_options[<?php echo $key; ?>]" size="8" value="<?php echo $options[$key]; ?>" />
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Font Color Options','interface' ); ?></h3></th>
                    </tr>
                    <?php     
                    global $colour_options;                                            
                    $font_colour_options = array(
                        'content_font_color'		=> array( 
                                                                'title' => __( 'Content','interface' ),
                                                                'description' => __( 'Changes will reflect on Content', 'interface' ) ),
                        'top_info_bar_font_color'		=> array( 
                                                                'title' => __( 'Top Info Bar','interface' ),
                                                                'description' => __( 'Changes will reflect on Top Info Bar, slogans,custom gallery', 'interface' ) ),
                        'site_title_font_color'		=> array( 
                                                                'title' => __( 'Site Title','interface' ),
                                                                'description' => __( 'Changes will reflect on Site Title', 'interface' ) ),
                        'navigation_font_color'		=> array( 
                                                                'title' => __( 'Navigation', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Navigation', 'interface' ) ),
                        'solgan_featured_page_breadcrumbs_title_font_color'		=> array( 
                                                                'title' => __( 'Slogan, Featured Title, Page Title and Breadcrumb', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Slogan, Featured Title Page Title and Breadcrumb', 'interface' ) ),
                        'all_heading_titles_font_color'		=> array( 
                                                                'title' => __( 'All Headings/Titles', 'interface' ),
                                                                'description' => __( 'Changes will reflect on All Headings/Titles', 'interface' ) ),
					                        'sidebar_widget_title_font_color'		=> array( 
                                                                'title' => __( 'Sidebar Widget Titles','interface' ),
                                                                'description' => __( 'Changes will reflect on Sidebar Widget Titles', 'interface' ) ),
                        'sidebar_content_font_color'		=> array( 
                                                                'title' => __( 'Sidebar Content','interface' ),
                                                                'description' => __( 'Changes will reflect on Sidebar Content', 'interface' ) ),
                        'footer_widget_title_font_color'		=> array( 
                                                                'title' => __( 'Footer Widget Titles ','interface' ),
                                                                'description' => __( 'Changes will reflect on Footer Widget Titles', 'interface' ) ),
                        'footer_content_font_color'		=> array( 
                                                                'title' => __( 'Footer Content', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Footer Content', 'interface' ) ),
                        'bottom_info_bar_font_color'		=> array( 
                                                                'title' => __( 'Bottom Info Bar', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Bottom Info Bar', 'interface' ) ),
                        'site_generator_font_color'		=> array( 
                                                                'title' => __( 'Site Generator', 'interface' ),
                                                                'description' => __( 'Changes will reflect on Site Generator', 'interface' ) )
                    );
                                    
                    foreach ( $font_colour_options as $key => $font_colour_option) :
                        ?>      	
                        <tr>
                            <th scope="row">
                                <label for="<?php echo $key; ?>"><?php echo $font_colour_option['title']; ?></label>
                            </th>
                            <td width=115px>
                                <input type="text" class="color" id="<?php echo $key; ?>" name="interface_theme_options[<?php echo $key; ?>]" size="8" value="<?php echo esc_attr( $options[ $key ] );?>"  />
                            </td>
                            <td>
                                <p><small><?php printf( __( '%s', 'interface' ), $font_colour_option[ 'description' ] ); ?></small></p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p>
            <p class="submit"><input type="submit" name="interface_theme_options[reset_colors]" class="button-primary reset" value="Reset Defaults" /></p>
        </div><!-- .option-content -->
        </div><!-- .option-container -->
        
        <div class="option-container">
        <h3 class="option-toggle"><a href="#"><?php _e( 'Background Pattern', 'interface' ); ?></a></h3>
        <div class="option-content inside">
            <?php                                            
                    $background_patterns = array(
                        'pattern1'		=> array( 
                                                                'title' => __( 'pattern 1','interface' ),
                                                                'img' => 'pattern-1' ),
                        'pattern2'		=> array( 
                                                                'title' => __( 'pattern 2','interface' ),
                                                                'img' => 'pattern-2' ),
                        'pattern3'		=> array( 
                                                                'title' => __( 'pattern 3', 'interface' ),
                                                                'img' => 'pattern-3' ),
                        'pattern4'		=> array( 
                                                                'title' => __( 'pattern 4','interface' ),
                                                                'img' => 'pattern-4' ),
                        'pattern5'		=> array( 
                                                                'title' => __( 'pattern 5','interface' ),
                                                                'img' => 'pattern-5' ),
                        'pattern6'		=> array( 
                                                                'title' => __( 'pattern 6','interface' ),
                                                                'img' => 'pattern-6' ),
                        'pattern7'		=> array( 
                                                                'title' => __( 'pattern 7','interface' ),
                                                                'img' => 'pattern-7' ),
                        'pattern8'		=> array( 
                                                                'title' => __( 'pattern 8','interface' ),
                                                                'img' => 'pattern-8' ),
                        'pattern9'		=> array( 
                                                                'title' => __( 'pattern 9','interface' ),
                                                                'img' => 'pattern-9' ),
                        'pattern10'		=> array( 
                                                                'title' => __( 'pattern 10','interface' ),
                                                                'img' => 'pattern-10' ),
                        'pattern11'		=> array( 
                                                                'title' => __( 'pattern 11','interface' ),
                                                                'img' => 'pattern-11' ),
                        'pattern12'		=> array( 
                                                                'title' => __( 'pattern 12','interface' ),
                                                                'img' => 'pattern-12' ),
                        'pattern13'		=> array( 
                                                                'title' => __( 'pattern 13','interface' ),
                                                                'img' => 'pattern-13' ),
                        'pattern14'		=> array( 
                                                                'title' => __( 'pattern 14','interface' ),
                                                                'img' => 'pattern-14' ),
                        'No Pattern'		=> array( 
                                                                'title' => __( 'No Pattern','interface' ),
                                                                'img' => 'disable' )
                    ); ?>							
                        
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Content Background Pattern','interface' ); ?></h3></th>
                    </tr>
                    <tr>
                        <td>
                            <?php				
                            foreach ( $background_patterns as $key => $background_pattern) : 
                                if( $key == 'No Pattern'){ ?>
                                    <?php _e( 'Disable Pattern','interface' ); ?>
                                    <label class="pattern_box <?php echo $key; ?>" title="<?php printf( esc_attr__( '%s','interface' ), $background_pattern['title'] ); ?>">
                                        <input class="check" id="<?php echo $key; ?>" type="radio" <?php checked( $options[ 'content_background_pattern'], $background_pattern['img']) ?> value="<?php echo $background_pattern['img']; ?>" name="interface_theme_options[content_background_pattern]">
                                    </label>		
                                <?php }else{ ?>												
                                    <label class="pattern_box <?php echo $key; ?>" title="<?php printf( esc_attr__( '%s','interface' ), $background_pattern['title'] ); ?>">
                                        <img alt="pattern" src="<?php echo INTERFACE_ADMIN_IMAGES_URL ?>/patterns/<?php echo $background_pattern['img']; ?>.jpg ">
                                        <input class="check" id="<?php echo $key; ?>" type="radio" <?php checked( $options[ 'content_background_pattern'], $background_pattern['img']) ?> value="<?php echo $background_pattern['img']; ?>" name="interface_theme_options[content_background_pattern]">
                                    </label>
                                <?php } ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        
            <table class="form-table">
                <tbody>
                    <tr>                            
                        <th><h3><?php _e( 'Footer Widget Background Pattern','interface' ); ?></h3></th>
                    </tr>
                    <tr>
                        <td>
                            <?php				
                            foreach ( $background_patterns as $key => $background_pattern) :
                                if( $key == 'No Pattern'){ ?>
                                    <?php _e( 'Disable Pattern','interface' ); ?>
                                    <label class="pattern_box <?php echo $key; ?>" title="<?php printf( esc_attr__( '%s','interface' ), $background_pattern['title'] ); ?>">
                                        <input class="check" id="<?php echo $key; ?>" type="radio" <?php checked( $options[ 'footer_widget_background_pattern'], $background_pattern['img'] ) ?> value="<?php echo $background_pattern['img']; ?>" name="interface_theme_options[footer_widget_background_pattern]">
                                    </label>
                                <?php }else{ ?>
                                    <label class="pattern_box <?php echo $key; ?>" title="<?php printf( esc_attr__( '%s','interface' ), $background_pattern['title'] ); ?>">
                                        <img alt="pattern" src="<?php echo INTERFACE_ADMIN_IMAGES_URL ?>/patterns/<?php echo $background_pattern['img']; ?>.jpg ">
                                        <input class="check" id="<?php echo $key; ?>" type="radio" <?php checked( $options[ 'footer_widget_background_pattern'], $background_pattern['img'] ) ?> value="<?php echo $background_pattern['img']; ?>" name="interface_theme_options[footer_widget_background_pattern]">
                                    </label>
                                <?php } ?>
                                    
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        
                
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'interface' ); ?>" /></p>
            <p class="submit"><input type="submit" name="interface_theme_options[reset_background]" class="button-primary reset" value="Reset Defaults" /></p>
        </div><!-- .option-content -->
        </div><!-- .option-container -->
      </div>
      <!-- #designoptions -->                  
    </div>
    <!-- #interface_tabs -->
  </form>
</div>
<!-- .wrap -->
<?php
}

/****************************************************************************************/

/**
 * Validate all theme options values
 * 
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, interface_invalidate_caches
 */
function interface_theme_options_validate( $options ) { //validate individual options before saving. using register_setting 3rd parameter interface_theme_options_validate
	global $interface_theme_default, $interface_default;
	$validated_input_values = $interface_theme_default;
	$input = array();
	$input = $options;

	//font family validation
	if( isset( $input['reset_font_family'] ) && $input['reset_font_family'] == 'Reset Defaults' ) {
			$validated_input_values['interface_general_typography'] = $interface_default['interface_general_typography'];
			$validated_input_values['interface_navigation'] = $interface_default['interface_navigation'];
			$validated_input_values['interface_title'] = $interface_default['interface_title'];
	}
	else {
		 if ( isset( $input['interface_general_typography'] ) ) {
		 	$validated_input_values['interface_general_typography'] = stripslashes($input['interface_general_typography']);
		 }
		if ( isset( $input['interface_navigation'] ) ) {
		 	$validated_input_values['interface_navigation'] = stripslashes($input['interface_navigation']);
		 }
		 if ( isset( $input['interface_title'] ) ) {
		 	$validated_input_values['interface_title'] = stripslashes($input['interface_title']);
		 }
	}

	//font size validation
	if( isset( $input['reset_font_family'] ) && $input['reset_font_family'] == 'Reset Defaults' ) {
			$validated_input_values['content'] = $interface_default['content'];
			$validated_input_values['buttons'] = $interface_default['buttons'];
			$validated_input_values['site_title'] = $interface_default['site_title'];
			$validated_input_values['navigation'] = $interface_default['navigation'];
			$validated_input_values['navigation_child'] = $interface_default['navigation_child'];
			$validated_input_values['primary_slogan'] = $interface_default['primary_slogan'];
			$validated_input_values['secondary_slogan'] = $interface_default['secondary_slogan'];
			$validated_input_values['featured_title'] = $interface_default['featured_title'];
			$validated_input_values['business_layout_widget_title'] = $interface_default['business_layout_widget_title'];
			$validated_input_values['business_layout_service_promot_featured_recentwork'] = $interface_default['business_layout_service_promot_featured_recentwork'];
			$validated_input_values['post_title'] = $interface_default['post_title'];
			$validated_input_values['sidebar_colophon_widget_title'] = $interface_default['sidebar_colophon_widget_title'];
	}else{
		if( isset( $input['content'] ) ) {
			$validated_input_values['content'] = absint($input['content']);
		}
		if( isset( $input['buttons'] ) ) {
			$validated_input_values['buttons'] = absint($input['buttons']);
		}
		if( isset( $input['site_title'] ) ) {
			$validated_input_values['site_title'] = absint($input['site_title']);
		}
		if( isset( $input['navigation'] ) ) {
			$validated_input_values['navigation'] = absint($input['navigation']);
		}
		if( isset( $input['navigation_child'] ) ) {
			$validated_input_values['navigation_child'] = absint($input['navigation_child']);
		}
		if( isset( $input['primary_slogan'] ) ) {
			$validated_input_values['primary_slogan'] = absint($input['primary_slogan']);
		}
		if( isset( $input['secondary_slogan'] ) ) {
			$validated_input_values['secondary_slogan'] = absint($input['secondary_slogan']);
		}
		if( isset( $input['featured_title'] ) ) {
			$validated_input_values['featured_title'] = absint($input['featured_title']);
		}
		if( isset( $input['business_layout_widget_title'] ) ) {
			$validated_input_values['business_layout_widget_title'] = absint($input['business_layout_widget_title']);
		}
		if( isset( $input['business_layout_service_promot_featured_recentwork'] ) ) {
			$validated_input_values['business_layout_service_promot_featured_recentwork'] = absint($input['business_layout_service_promot_featured_recentwork']);
		}
		if( isset( $input['post_title'] ) ) {
			$validated_input_values['post_title'] = absint($input['post_title']);
		}
		if( isset( $input['sidebar_colophon_widget_title'] ) ) {
			$validated_input_values['sidebar_colophon_widget_title'] = absint($input['sidebar_colophon_widget_title']);
		}
	}

	//Font Colors Validation
	if( isset( $input['reset_colors'] ) && $input['reset_colors'] == 'Reset Defaults' ) {
			$validated_input_values['content_font_color'] = $interface_default['content_font_color'];
			$validated_input_values['top_info_bar_font_color'] = $interface_default['top_info_bar_font_color'];
			$validated_input_values['site_title_font_color'] = $interface_default['site_title_font_color'];
			$validated_input_values['navigation_font_color'] = $interface_default['navigation_font_color'];		
			$validated_input_values['solgan_featured_page_breadcrumbs_title_font_color'] = $interface_default['solgan_featured_page_breadcrumbs_title_font_color'];		
			$validated_input_values['all_heading_titles_font_color'] = $interface_default['all_heading_titles_font_color'];
			$validated_input_values['sidebar_widget_title_font_color'] = $interface_default['sidebar_widget_title_font_color'];
			$validated_input_values['sidebar_content_font_color'] = $interface_default['sidebar_content_font_color'];
			$validated_input_values['footer_widget_title_font_color'] = $interface_default['footer_widget_title_font_color'];
			$validated_input_values['footer_content_font_color'] = $interface_default['footer_content_font_color'];		
			$validated_input_values['bottom_info_bar_font_color'] = $interface_default['bottom_info_bar_font_color'];		
			$validated_input_values['site_generator_font_color'] = $interface_default['site_generator_font_color'];
		
	}else{
		if ( isset( $input['content_font_color'] ) ) {
			$validated_input_values['content_font_color'] = stripslashes($input['content_font_color']);
		}
		if ( isset( $input['top_info_bar_font_color'] ) ) {
			$validated_input_values['top_info_bar_font_color'] = stripslashes($input['top_info_bar_font_color']);
		}
		if ( isset( $input['site_title_font_color'] ) ) {
			$validated_input_values['site_title_font_color'] = stripslashes($input['site_title_font_color']);
		}
		if ( isset( $input['navigation_font_color'] ) ) {
			$validated_input_values['navigation_font_color'] = stripslashes($input['navigation_font_color']);
		}
		if ( isset( $input['solgan_featured_page_breadcrumbs_title_font_color'] ) ) {
			$validated_input_values['solgan_featured_page_breadcrumbs_title_font_color'] = stripslashes($input['solgan_featured_page_breadcrumbs_title_font_color']);
		}
		if ( isset( $input['all_heading_titles_font_color'] ) ) {
			$validated_input_values['all_heading_titles_font_color'] = stripslashes($input['all_heading_titles_font_color']);
		}
		if ( isset( $input['sidebar_widget_title_font_color'] ) ) {
			$validated_input_values['sidebar_widget_title_font_color'] = stripslashes($input['sidebar_widget_title_font_color']);
		}
		if ( isset( $input['sidebar_content_font_color'] ) ) {
			$validated_input_values['sidebar_content_font_color'] = stripslashes($input['sidebar_content_font_color']);
		}
		if ( isset( $input['footer_widget_title_font_color'] ) ) {
			$validated_input_values['footer_widget_title_font_color'] = stripslashes($input['footer_widget_title_font_color']);
		}
		if ( isset( $input['footer_content_font_color'] ) ) {
			$validated_input_values['footer_content_font_color'] = stripslashes($input['footer_content_font_color']);
		}
		if ( isset( $input['bottom_info_bar_font_color'] ) ) {
			$validated_input_values['bottom_info_bar_font_color'] = stripslashes($input['bottom_info_bar_font_color']);
		}
		if ( isset( $input['site_generator_font_color'] ) ) {
			$validated_input_values['site_generator_font_color'] = stripslashes($input['site_generator_font_color']);
		}
	}

	//Color skin validation
	if( isset( $input['reset_colors'] ) && $input['reset_colors'] == 'Reset Defaults' ) {
			$validated_input_values['color_scheme'] = $interface_default['color_scheme'];
			$validated_input_values['interface_slogan_slider_title_color'] = $interface_default['interface_slogan_slider_title_color'];
			$validated_input_values['interface_buttons_color'] = $interface_default['interface_buttons_color'];
			$validated_input_values['interface_link_color'] = $interface_default['interface_link_color'];	
	}else{
		if ( isset( $input['color_scheme'] ) ) {
			$validated_input_values['color_scheme'] = stripslashes($input['color_scheme']);
		}
		if ( isset( $input['interface_slogan_slider_title_color'] ) ) {
			$validated_input_values['interface_slogan_slider_title_color'] = stripslashes($input['interface_slogan_slider_title_color']);
		}
		if ( isset( $input['interface_buttons_color'] ) ) {
			$validated_input_values['interface_buttons_color'] = stripslashes($input['interface_buttons_color']);
		}
		if ( isset( $input['interface_link_color'] ) ) {
			$validated_input_values['interface_link_color'] = stripslashes($input['interface_link_color']);
		}
	}

	//Colors Validation
	if( isset( $input['reset_colors'] ) && $input['reset_colors'] == 'Reset Defaults' ) {
			$validated_input_values['interface_top_info_bar_color'] = $interface_default['interface_top_info_bar_color'];
			$validated_input_values['interface_header_color'] = $interface_default['interface_header_color'];
			$validated_input_values['interface_main_content_color'] = $interface_default['interface_main_content_color'];
			$validated_input_values['interface_promotional_clients_blockquote_sticky_color'] = $interface_default['interface_promotional_clients_blockquote_sticky_color'];
			$validated_input_values['interface_form_input_textarea_paginations_color'] = $interface_default['interface_form_input_textarea_paginations_color'];
			$validated_input_values['footer_widget_section_color'] = $interface_default['footer_widget_section_color'];
			$validated_input_values['bottom_info_bar_color'] = $interface_default['bottom_info_bar_color'];
			$validated_input_values['site_generator_color'] = $interface_default['site_generator_color'];		
			
		
	}else{
		if ( isset( $input['interface_top_info_bar_color'] ) ) {
			$validated_input_values['interface_top_info_bar_color'] = stripslashes($input['interface_top_info_bar_color']);
		}
		if ( isset( $input['interface_header_color'] ) ) {
			$validated_input_values['interface_header_color'] = stripslashes($input['interface_header_color']);
		}
		if ( isset( $input['interface_main_content_color'] ) ) {
			$validated_input_values['interface_main_content_color'] = stripslashes($input['interface_main_content_color']);
		}
		if ( isset( $input['interface_promotional_clients_blockquote_sticky_color'] ) ) {
			$validated_input_values['interface_promotional_clients_blockquote_sticky_color'] = stripslashes($input['interface_promotional_clients_blockquote_sticky_color']);
		}
		if ( isset( $input['interface_form_input_textarea_paginations_color'] ) ) {
			$validated_input_values['interface_form_input_textarea_paginations_color'] = stripslashes($input['interface_form_input_textarea_paginations_color']);
		}
		if ( isset( $input['footer_widget_section_color'] ) ) {
			$validated_input_values['footer_widget_section_color'] = stripslashes($input['footer_widget_section_color']);
		}
		if ( isset( $input['bottom_info_bar_color'] ) ) {
			$validated_input_values['bottom_info_bar_color'] = stripslashes($input['bottom_info_bar_color']);
		}
		if ( isset( $input['site_generator_color'] ) ) {
			$validated_input_values['site_generator_color'] = stripslashes($input['site_generator_color']);
		}
	}

	//Background pattern validation
	if( isset( $input['reset_background'] ) && $input['reset_background'] == 'Reset Defaults' ) {
			$validated_input_values['content_background_pattern'] = $interface_default['content_background_pattern'];
			$validated_input_values['footer_widget_background_pattern'] = $interface_default['footer_widget_background_pattern'];
	}else{
		//Content Background pattern validation
		if ( isset( $input['content_background_pattern'] ) ) {
				$validated_input_values['content_background_pattern'] = stripslashes($input['content_background_pattern']);
		}
		//Footer Background pattern validation
		if ( isset( $input['footer_widget_background_pattern'] ) ) {
				$validated_input_values['footer_widget_background_pattern'] = stripslashes($input['footer_widget_background_pattern']);
		}
		//Sitegenerator Background pattern validation

	}
	if ( isset( $input[ 'header_logo' ] ) ) {
		$validated_input_values[ 'header_logo' ] = esc_url_raw( $input[ 'header_logo' ] );
	}
										//esc_url_raw -> To save at the databaseSSSS
										// esc_url -> to echo the url
										//sanitize_text_field -> for normal text only if you dont want html text.
	if( isset( $input[ 'header_show' ] ) ) {
		$validated_input_values[ 'header_show' ] = $input[ 'header_show' ];
	}

   if ( isset( $options[ 'hide_header_searchform' ] ) ) {
		$validated_input_values[ 'hide_header_searchform' ] = $input[ 'hide_header_searchform' ];
	}
    
	if ( isset( $options[ 'disable_slogan' ] ) ) {
		$validated_input_values[ 'disable_slogan' ] = $input[ 'disable_slogan' ];
	}

	if( isset( $options[ 'home_slogan1' ] ) ) {
		$validated_input_values[ 'home_slogan1' ] = sanitize_text_field( $input[ 'home_slogan1' ] );
	}

	if( isset( $options[ 'home_slogan2' ] ) ) {
		$validated_input_values[ 'home_slogan2' ] = sanitize_text_field( $input[ 'home_slogan2' ] );
	}

	if( isset( $input[ 'slogan_position' ] ) ) {
		$validated_input_values[ 'slogan_position' ] = $input[ 'slogan_position' ];
	}	

	if( isset( $options[ 'button_text' ] ) ) {
		$validated_input_values[ 'button_text' ] = sanitize_text_field( $input[ 'button_text' ] );
	}

	if( isset( $options[ 'redirect_button_link' ] ) ) {
		$validated_input_values[ 'redirect_button_link' ] = esc_url_raw( $input[ 'redirect_button_link' ] );
	}
        
	if ( isset( $input[ 'favicon' ] ) ) {
		$validated_input_values[ 'favicon' ] = esc_url_raw( $input[ 'favicon' ] );
	}

	if ( isset( $input['disable_favicon'] ) ) {
		$validated_input_values[ 'disable_favicon' ] = $input[ 'disable_favicon' ];
	}

	if ( isset( $input[ 'webpageicon' ] ) ) {
		$validated_input_values[ 'webpageicon' ] = esc_url_raw( $input[ 'webpageicon' ] );
	}

	if ( isset( $input['disable_webpageicon'] ) ) {
		$validated_input_values[ 'disable_webpageicon' ] = $input[ 'disable_webpageicon' ];
	}

	//Site Layout
	if( isset( $input[ 'site_layout' ] ) ) {
		$validated_input_values[ 'site_layout' ] = $input[ 'site_layout' ];
	}

   // Front page posts categories
	if( isset( $input['front_page_category' ] ) ) {
		$validated_input_values['front_page_category'] = $input['front_page_category'];
	}
    
	// Data Validation for Featured Slider
	if( isset( $input[ 'disable_slider' ] ) ) {
		$validated_input_values[ 'disable_slider' ] = $input[ 'disable_slider' ];
	}
	
	if( isset( $input[ 'featured_text_position' ] ) ) {
		$validated_input_values[ 'featured_text_position' ] = $input[ 'featured_text_position' ];
	}
	if ( isset( $input[ 'slider_quantity' ] ) ) {
		$validated_input_values[ 'slider_quantity' ] = absint( $input[ 'slider_quantity' ] ) ? $input [ 'slider_quantity' ] : 4;
	}
	
	if( isset( $input['reset_image_slider'] ) && $input['reset_image_slider'] == 'Reset Defaults' ) {
			$validated_input_values['featured_post_slider'] = $interface_default['featured_post_slider'];
			$validated_input_values['featured_image_slider_image'] = $interface_default['featured_image_slider_image'];
			$validated_input_values['featured_image_slider_link'] = $interface_default['featured_image_slider_link'];
			$validated_input_values['featured_image_slider_title'] = $interface_default['featured_image_slider_title'];
			$validated_input_values['featured_image_slider_description'] = $interface_default['featured_image_slider_description'];
	
		}else{
	if( isset( $input[ 'slider_quantity' ] ) )   
			for ( $i = 1; $i <= $input [ 'slider_quantity' ]; $i++ ) {
				if ( !empty( $input[ 'featured_post_slider' ][ $i ] ) ) {
					$validated_input_values[ 'featured_post_slider' ][ $i ] = absint($input[ 'featured_post_slider' ][ $i ] );
				}
				if ( !empty( $input[ 'featured_image_slider_image' ][ $i ] ) ) {
					$validated_input_values[ 'featured_image_slider_image' ][ $i ] = esc_url_raw($input[ 'featured_image_slider_image' ][ $i ] );
				}
				if ( !empty( $input[ 'featured_image_slider_link' ][ $i ] ) ) {
					$validated_input_values[ 'featured_image_slider_link' ][ $i ] = esc_url_raw($input[ 'featured_image_slider_link' ][ $i ]);
				}
				if ( !empty( $input[ 'featured_image_slider_title' ][ $i ] ) ) {
					$validated_input_values[ 'featured_image_slider_title' ][ $i ] = sanitize_text_field($input[ 'featured_image_slider_title' ][ $i ]);
				}
				if ( !empty( $input[ 'featured_image_slider_description' ][ $i ] ) ) {
					$validated_input_values[ 'featured_image_slider_description' ][ $i ] = wp_kses_stripslashes($input[ 'featured_image_slider_description' ][ $i ]);
				}
			}
		}
	if ( isset( $input['exclude_slider_post'] ) ) {
		$validated_input_values[ 'exclude_slider_post' ] = $input[ 'exclude_slider_post' ];	

	}
	if ( isset( $input[ 'featured_post_slider' ] ) ) {
		$validated_input_values[ 'featured_post_slider' ] = array();
	}   
	if( isset( $input[ 'slider_quantity' ] ) )   
	for ( $i = 1; $i <= $input [ 'slider_quantity' ]; $i++ ) {
		if ( !empty( $input[ 'featured_post_slider' ][ $i ] ) ) {
			$validated_input_values[ 'featured_post_slider' ][ $i ] = absint($input[ 'featured_post_slider' ][ $i ] );
		}
	} 
	if( isset( $input[ 'slider_status' ] ) ) {
		$validated_input_values[ 'slider_status' ] = $input[ 'slider_status' ];
	} 
	
	if( isset( $input[ 'slider_type' ] ) ) {
		$validated_input_values[ 'slider_type' ] = $input[ 'slider_type' ];
	}
		
	
	
	
   // data validation for transition effect
	if( isset( $input[ 'transition_effect' ] ) ) {
		$validated_input_values['transition_effect'] = wp_filter_nohtml_kses( $input['transition_effect'] );
	}
		if( isset( $input[ 'header_slider' ] ) ) {
		$validated_input_values[ 'header_slider' ] = $input[ 'header_slider' ];
	}

	if ( isset( $input[ 'revslider_homepage' ] ) ) {
		$validated_input_values[ 'revslider_homepage' ] = $input[ 'revslider_homepage' ];	
	}  

	if( isset( $options[ 'pages_id_revslider' ] ) ) {
		$validated_input_values[ 'pages_id_revslider' ] = sanitize_text_field( $input[ 'pages_id_revslider' ] );
	}

	// data validation for transition delay
	if ( isset( $input[ 'transition_delay' ] ) && is_numeric( $input[ 'transition_delay' ] ) ) {
		$validated_input_values[ 'transition_delay' ] = $input[ 'transition_delay' ];
	}

	// data validation for transition length
	if ( isset( $input[ 'transition_duration' ] ) && is_numeric( $input[ 'transition_duration' ] ) ) {
		$validated_input_values[ 'transition_duration' ] = $input[ 'transition_duration' ];
	}
    
   // data validation for Social Icons

   if ( isset( $input['disable_top'] ) ) {
		$validated_input_values[ 'disable_top' ] = $input[ 'disable_top' ];
	}
	 if ( isset( $input['disable_bottom'] ) ) {
		$validated_input_values[ 'disable_bottom' ] = $input[ 'disable_bottom' ];
	}
   if ( isset( $input[ 'social_phone' ] ) ) {
		$validated_input_values[ 'social_phone' ] = preg_replace("/[^() 0-9+-]/", '', $options[ 'social_phone' ]);
	}

	if( isset( $input[ 'social_email' ] ) ) {
		$validated_input_values[ 'social_email' ] = sanitize_email( $input[ 'social_email' ] );
	}
	if( isset( $input[ 'social_location' ] ) ) {
		$validated_input_values[ 'social_location' ] = sanitize_text_field( $input[ 'social_location' ] );
	}

	if( isset( $input[ 'social_facebook' ] ) ) {
		$validated_input_values[ 'social_facebook' ] = esc_url_raw( $input[ 'social_facebook' ] );
	}
	if( isset( $input[ 'social_twitter' ] ) ) {
		$validated_input_values[ 'social_twitter' ] = esc_url_raw( $input[ 'social_twitter' ] );
	}
	if( isset( $input[ 'social_googleplus' ] ) ) {
		$validated_input_values[ 'social_googleplus' ] = esc_url_raw( $input[ 'social_googleplus' ] );
	}
	if( isset( $input[ 'social_pinterest' ] ) ) {
		$validated_input_values[ 'social_pinterest' ] = esc_url_raw( $input[ 'social_pinterest' ] );
	}   
	if( isset( $input[ 'social_youtube' ] ) ) {
		$validated_input_values[ 'social_youtube' ] = esc_url_raw( $input[ 'social_youtube' ] );
	}
	if( isset( $input[ 'social_vimeo' ] ) ) {
		$validated_input_values[ 'social_vimeo' ] = esc_url_raw( $input[ 'social_vimeo' ] );
	}   
	if( isset( $input[ 'social_linkedin' ] ) ) {
		$validated_input_values[ 'social_linkedin' ] = esc_url_raw( $input[ 'social_linkedin' ] );
	}
	if( isset( $input[ 'social_flickr' ] ) ) {
		$validated_input_values[ 'social_flickr' ] = esc_url_raw( $input[ 'social_flickr' ] );
	}
	if( isset( $input[ 'social_tumblr' ] ) ) {
		$validated_input_values[ 'social_tumblr' ] = esc_url_raw( $input[ 'social_tumblr' ] );
	}   
	if( isset( $input[ 'social_myspace' ] ) ) {
		$validated_input_values[ 'social_myspace' ] = esc_url_raw( $input[ 'social_myspace' ] );
	}  
	if( isset( $input[ 'social_rss' ] ) ) {
		$validated_input_values[ 'social_rss' ] = esc_url_raw( $input[ 'social_rss' ] );
	} 
	if( isset( $input[ 'social_dribbble' ] ) ) {
		$validated_input_values[ 'social_dribbble' ] = esc_url_raw( $input[ 'social_dribbble' ] );
	} 
	if( isset( $input[ 'social_wordpress' ] ) ) {
		$validated_input_values[ 'social_wordpress' ] = esc_url_raw( $input[ 'social_wordpress' ] );
	} 
	if( isset( $input[ 'social_github' ] ) ) {
		$validated_input_values[ 'social_github' ] = esc_url_raw( $input[ 'social_github' ] );
	} 
	if( isset( $input[ 'social_instagram' ] ) ) {
		$validated_input_values[ 'social_instagram' ] = esc_url_raw( $input[ 'social_instagram' ] );
	} 
	if( isset( $input[ 'social_codepen' ] ) ) {
		$validated_input_values[ 'social_codepen' ] = esc_url_raw( $input[ 'social_codepen' ] );
	} 
	if( isset( $input[ 'social_polldaddy' ] ) ) {
		$validated_input_values[ 'social_polldaddy' ] = esc_url_raw( $input[ 'social_polldaddy' ] );
	} 
	if( isset( $input[ 'social_path' ] ) ) {
		$validated_input_values[ 'social_path' ] = esc_url_raw( $input[ 'social_path' ] );
	} 
	if( isset( $input[ 'social_skype' ] ) ) {
		$validated_input_values[ 'social_skype' ] = esc_url_raw( $input[ 'social_skype' ] );
	} 
	if( isset( $input[ 'social_digg' ] ) ) {
		$validated_input_values[ 'social_digg' ] = esc_url_raw( $input[ 'social_digg' ] );
	} 
	if( isset( $input[ 'social_reddit' ] ) ) {
		$validated_input_values[ 'social_reddit' ] = esc_url_raw( $input[ 'social_reddit' ] );
	} 
	if( isset( $input[ 'social_stumbleupon' ] ) ) {
		$validated_input_values[ 'social_stumbleupon' ] = esc_url_raw( $input[ 'social_stumbleupon' ] );
	} 
	if( isset( $input[ 'social_pocket' ] ) ) {
		$validated_input_values[ 'social_pocket' ] = esc_url_raw( $input[ 'social_pocket' ] );
	} 
	if( isset( $input[ 'social_dropbox' ] ) ) {
		$validated_input_values[ 'social_dropbox' ] = esc_url_raw( $input[ 'social_dropbox' ] );
	}   

	//Custom CSS Style Validation
	if ( isset( $input['custom_css'] ) ) {
		$validated_input_values['custom_css'] = wp_filter_nohtml_kses($input['custom_css']);
	}

	if( isset( $input[ 'site_design' ] ) ) {
		$validated_input_values[ 'site_design' ] = $input[ 'site_design' ];
	}   
	
	if( isset( $input[ 'slider_content' ] ) ) {
		$validated_input_values[ 'slider_content' ] = $input[ 'slider_content' ];
	} 
	
	if ( isset( $input[ 'excerpt_length' ] ) ) {
		$validated_input_values[ 'excerpt_length' ] = absint( $input[ 'excerpt_length' ] ) ? $input [ 'excerpt_length' ] : 30;
		
	}

	if( isset( $input[ 'post_excerpt_more_text' ] ) ) {
		$validated_input_values[ 'post_excerpt_more_text' ] = sanitize_text_field( $input[ 'post_excerpt_more_text' ] );
	}
	
	if( isset( $input[ 'reset_foooterinfo' ] ) ) {
		$validated_input_values[ 'reset_foooterinfo' ] = $input[ 'reset_foooterinfo' ];
	}

	if( 0 == $validated_input_values[ 'reset_foooterinfo' ] ) {
		if( isset( $input[ 'footer_code' ] ) ) {
			$validated_input_values['footer_code'] =  stripslashes( wp_filter_post_kses( addslashes ( $input['footer_code'] ) ) );
		}
	}
	else {
		$validated_input_values['footer_code'] = $interface_default[ 'footer_code' ];
	}
    
	// Layout settings verification
	if( isset( $input[ 'reset_layout' ] ) ) {
		$validated_input_values[ 'reset_layout' ] = $input[ 'reset_layout' ];
	}
	if( 0 == $validated_input_values[ 'reset_layout' ] ) {
		if( isset( $input[ 'default_layout' ] ) ) {
			$validated_input_values[ 'default_layout' ] = $input[ 'default_layout' ];
		}
	}
	else {
		$validated_input_values['default_layout'] = $interface_default[ 'default_layout' ];
	}

	
    
	
    
   return $validated_input_values;
}
function interface_themeoption_invalidate_caches(){
	
	delete_transient( 'interface_socialnetworks' ); 
	
}

/*	 _e() -> to echo the text
*	 __() -> to get the value
*	 printf () -> to echo the value eg:- my name is $name
*	 eg:- printf( __( 'Your city is %1$s, and your zip code is %2$s.', 'my-text-domain' ), $city, $zipcode );
*	 sprintf() - > to get the value 
* 	 eg:- $url = 'http://example.com';
*	 $link = sprintf( __( 'Check out this link to my <a href="%s">website</a> made with WordPress.', 'my-text-domain' ), esc_url( $url ) );
*	 echo $link;
*/

?>
