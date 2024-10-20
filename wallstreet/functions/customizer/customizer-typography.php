<?php
function wallstreet_typography_customizer( $wp_customize ) {

		$font_family = wallstreet_typo_fonts();

		$wp_customize->add_panel( 'wallstreet_typography_setting', array(
				'priority'    => 750,
				'capability'  => 'edit_theme_options',
				'title'       => esc_html__('Typography Settings','wallstreet')
		) );
		$wp_customize->add_section('local_google_font',
		array(
			'title' => esc_html__('Performance(Google Font)', 'wallstreet'),
			'panel' => 'wallstreet_typography_setting',
			'priority' => 1
		));
		$wp_customize->add_setting('wallstreet_enable_local_google_font',
        array(
            'default' => true,
            'sanitize_callback' => 'wallstreet_sanitize_checkbox',
            )
    	);
	    $wp_customize->add_control(new Wallstreet_Toggle_Control( $wp_customize, 'wallstreet_enable_local_google_font',
	        array(
	            'label'    => esc_html__( 'Load Google Fonts Locally?', 'wallstreet'  ),
	            'section'  => 'local_google_font',
	            'type'     => 'toggle',
	            'priority' => 4,
	        )
	    ));
		// Header typography section
		$wp_customize->add_section( 'wallstreet_header_typography' , array(
				'title'    => esc_html__('Header', 'wallstreet'),
				'panel'    => 'wallstreet_typography_setting',
				'priority' => 1
   		) );
		// Enable/Disable Header typography section
		$wp_customize->add_setting(
    		'enable_header_typography',
		    array(
		        'default'           =>  false,
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'wallstreet_sanitize_checkbox'
	    	)
		);
		$wp_customize->add_control('enable_header_typography', array(
				'label'   => esc_html__('Enable Header Typography','wallstreet'),
		    'section' => 'wallstreet_header_typography',
				'setting' => 'enable_header_typography',
				'type'    =>  'checkbox'
		));
		class WP_Sitetitle_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content. */
		    public function render_content() {
		    ?>
		 				<h3><?php esc_html_e('Site Title','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
    		'site_title',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Sitetitle_Customize_Control( $wp_customize, 'site_title', array(
				'section' => 'wallstreet_header_typography',
				'setting' => 'site_title'
    	)));
		$wp_customize->add_setting(
    		'site_title_fontfamily',
		    array(
				    'default'           =>  'Roboto',
					'capability'        =>  'edit_theme_options',
					'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('site_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    	'section' => 'wallstreet_header_typography',
				'setting' => 'site_title_fontfamily',
				'type'    =>  'select',
				'choices' =>  $font_family
		));
		$wp_customize->add_setting( 'site_title_size',
	        array(
	            'default' => 38,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'site_title_size',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_header_typography',
	            'input_attrs' => array(
	                'min' => 8,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		$wp_customize->add_setting( 'site_title_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'site_title_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_header_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		class WP_Tagline_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content. */
		    public function render_content() {
		    ?>
 				<h3><?php esc_html_e('Tagline','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
    		'tagline_title',
		    array(
		        'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Tagline_Customize_Control( $wp_customize, 'tagline_title', array(
				'section' => 'wallstreet_header_typography',
				'setting' => 'tagline_title'
    	)));
		$wp_customize->add_setting(
    		'site_tagline_fontfamily',
		    array(
				    'default'           =>  'Roboto',
					'capability'        =>  'edit_theme_options',
					'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('site_tagline_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    'section' => 'wallstreet_header_typography',
				'setting' => 'site_tagline_fontfamily',
				'type'    =>  'select',
				'choices' =>  $font_family
		));
		$wp_customize->add_setting( 'site_tagline_size',
        array(
	            'default' => 14,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'site_tagline_size',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_header_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		$wp_customize->add_setting( 'tagline_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'tagline_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_header_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		class WP_Menus_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content. */
		    public function render_content() {
		    ?>
			 			<h3><?php esc_html_e('Menus','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'menus_title',
		    array(
		        'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Menus_Customize_Control( $wp_customize, 'menus_title', array(
				'section' => 'wallstreet_header_typography',
				'setting' => 'menus_title'
		)));
		$wp_customize->add_setting(
		    'menu_title_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('menu_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        'section' => 'wallstreet_header_typography',
				'setting' => 'menu_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
			
	$wp_customize->add_setting( 'menus_size',
        array(
	            'default' => 16,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'menus_size',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_header_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );

    $wp_customize->add_setting( 'menu_line_height',
        array(
            'default' => 20,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'menu_line_height',
        array(
            'label' => esc_html__('Line height (px)', 'wallstreet'),
            'section' => 'wallstreet_header_typography',
            'input_attrs' => array(
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ),
        )
    ) );
		
	class WP_SubMenus_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content. */
		    public function render_content() {
		    ?>
 			<h3><?php esc_html_e('Submenus','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'submenus_title',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_SubMenus_Customize_Control( $wp_customize, 'submenus_title', array(
				'section' => 'wallstreet_header_typography',
				'setting' => 'submenus_title'
		)));
		$wp_customize->add_setting(
		    'submenu_title_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('submenu_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        'section' => 'wallstreet_header_typography',
				'setting' => 'submenu_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));

		 $wp_customize->add_setting( 'submenus_size',
        array(
            'default' => 15,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'submenus_size',
        array(
            'label' => esc_html__('Font Size (px)', 'wallstreet'),
            'section' => 'wallstreet_header_typography',
            'input_attrs' => array(
                'min' => 5,
                'max' => 100,
                'step' => 1,
            ),
        )
    ) );


    $wp_customize->add_setting( 'submenu_line_height',
        array(
            'default' => 20,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'submenu_line_height',
        array(
            'label' => esc_html__('Line height (px)', 'wallstreet'),
            'section' => 'wallstreet_header_typography',
            'input_attrs' => array(
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ),
        )
    ) );


		// Banner typography section
		$wp_customize->add_section( 'wallstreet_banner_typography' , array(
				'title'     => esc_html__('Banner / Breadcrumb', 'wallstreet'),
				'panel' 		=> 'wallstreet_typography_setting',
				'priority'  => 2
   	) );
		$wp_customize->add_setting(
		    'enable_banner_typography',
		    array(
		        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'wallstreet_sanitize_checkbox'
	    	)
		);
		$wp_customize->add_control('enable_banner_typography', array(
				'label' 	=> esc_html__('Enable Banner Typography','wallstreet'),
		    'section' => 'wallstreet_banner_typography',
				'setting' => 'enable_banner_typography',
				'type'    =>  'checkbox'
		));
		class WP_Banner_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
	 			<h3><?php esc_html_e('Page Title','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'banner_title',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Banner_Customize_Control( $wp_customize, 'banner_title', array(
				'section' => 'wallstreet_banner_typography',
				'setting' => 'banner_title'
		)));
		$wp_customize->add_setting(
		    'banner_title_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		 ));
		$wp_customize->add_control('banner_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        'section' => 'wallstreet_banner_typography',
				'setting' => 'banner_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));

		$wp_customize->add_setting( 'banner_title_fontsize',
        array(
            'default' => 50,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'banner_title_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_banner_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'banner_line_height',
	        array(
	            'default' => 65,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'banner_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_banner_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		class WP_Breadcrumb_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
 				<h3><?php esc_html_e('Breadcrumb Title','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'breadcrumb_title',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Breadcrumb_Customize_Control( $wp_customize, 'breadcrumb_title', array(
				'section' => 'wallstreet_banner_typography',
				'setting' => 'breadcrumb_title'
		)));
		$wp_customize->add_setting(
		    'breadcrumb_title_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('breadcrumb_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    	'section' => 'wallstreet_banner_typography',
				'setting' => 'breadcrumb_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting( 'breadcrumb_title_fontsize',
	        array(
	            'default' => 15,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'breadcrumb_title_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_banner_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'breadcrumb_line_height',
	        array(
	            'default' => 20,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'breadcrumb_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_banner_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// Slider typography section
		$wp_customize->add_section( 'wallstreet_slider_typography' , array(
				'title'    => esc_html__('Slider', 'wallstreet'),
				'panel'    => 'wallstreet_typography_setting',
				'priority' => 3
   		) );
		$wp_customize->add_setting(
		    'enable_slider_typography',
		    array(
		        'default'           =>  false,
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'wallstreet_sanitize_checkbox'
   		));
		$wp_customize->add_control('enable_slider_typography', array(
				'label' => esc_html__('Enable Slider Typography','wallstreet'),
		    	'section' => 'wallstreet_slider_typography',
				'setting' => 'enable_slider_typography',
				'type'    =>  'checkbox'
		));

		class WP_Slider_Title_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
 			<h3><?php esc_html_e('Title','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'slider_title',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Slider_Title_Customize_Control( $wp_customize, 'slider_title', array(
				'section' => 'wallstreet_slider_typography',
				'setting' => 'slider_title'
		    ))
		);
		$wp_customize->add_setting(
		    'slider_title_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		));
		$wp_customize->add_control('slider_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    'section' => 'wallstreet_slider_typography',
				'setting' => 'slider_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'slider_title_fontsize',
	        array(
	            'default' => 60,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'slider_title_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_slider_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'slider_line_height',
	        array(
	            'default' => 65,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'slider_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_slider_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );


    	class WP_Slider_SubTitle_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
	 			<h3><?php esc_html_e('Sub Title','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'slider_subtitle',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Slider_SubTitle_Customize_Control( $wp_customize, 'slider_subtitle', array(
				'section' => 'wallstreet_slider_typography',
				'setting' => 'slider_title'
		    ))
		);
		$wp_customize->add_setting(
		    'slider_subtitle_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		));
		$wp_customize->add_control('slider_subtitle_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    'section' => 'wallstreet_slider_typography',
				'setting' => 'slider_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'slider_subtitle_fontsize',
	        array(
	            'default' => 80,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'slider_subtitle_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_slider_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'slider_subtitle_line_height',
	        array(
	            'default' => 80,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'slider_subtitle_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_slider_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// Homepage section typography
		$wp_customize->add_section( 'wallstreet_homepage_typography' , array(
				'title'      => esc_html__('Homepage Section', 'wallstreet'),
				'panel'      => 'wallstreet_typography_setting',
				'priority'   => 4
   		) );
		$wp_customize->add_setting(
		    'enable_homepage_typography',
		    array(
		        'default'           =>  false,
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'wallstreet_sanitize_checkbox'
  		) );
		$wp_customize->add_control('enable_homepage_typography', array(
			'label'   => esc_html__('Enable Homepage Sections Typography','wallstreet'),
	        'section' => 'wallstreet_homepage_typography',
			'setting' => 'enable_homepage_typography',
			'type'    =>  'checkbox'
		));
		class WP_Homepage_Title_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			  	<h3><?php esc_html_e('Section Title','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'homepage_title',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Homepage_Title_Customize_Control( $wp_customize, 'homepage_title', array(
				'section' => 'wallstreet_homepage_typography',
				'setting' => 'homepage_title'
		    ))
		);
		$wp_customize->add_setting(
		    'homepage_title_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		));
		$wp_customize->add_control('homepage_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    'section' => 'wallstreet_homepage_typography',
				'setting' => 'homepage_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		    $wp_customize->add_setting( 'homepage_title_fontsize',
	        array(
	            'default' => 36,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'homepage_title_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_homepage_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'homepage_title_line_height',
	        array(
	            'default' => 42,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'homepage_title_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_homepage_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		class WP_Homepage_Description_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			<h3><?php esc_html_e('Section Description','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'homepage_description',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Homepage_Description_Customize_Control( $wp_customize, 'homepage_description', array(
				'section' => 'wallstreet_homepage_typography',
				'setting' => 'homepage_description'
		    ))
		);
		$wp_customize->add_setting(
		    'homepage_description_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		 ));
		$wp_customize->add_control('homepage_description_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    	'section' => 'wallstreet_homepage_typography',
				'setting' => 'homepage_description_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'homepage_description_fontsize',
	        array(
	            'default' => 20,
	            'sanitize_callback' => 'absint'
        ));
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'homepage_description_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_homepage_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'homepage_description_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'homepage_description_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_homepage_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// Content typography section
		$wp_customize->add_section( 'wallstreet_content_typography' , array(
				'title'     => esc_html__('Content','wallstreet'),
				'panel' 		=> 'wallstreet_typography_setting',
				'priority'  => 5
  	 	) );
		// Enable/Disable Content typography section
		$wp_customize->add_setting(
		    'enable_content_typography',
		    array(
		        'default'           =>  false,
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'wallstreet_sanitize_checkbox'
    	));
		$wp_customize->add_control('enable_content_typography', array(
				'label'   => esc_html__('Enable Content Typography','wallstreet'),
		    'section' => 'wallstreet_content_typography',
				'setting' => 'enable_content_typography',
				'type'    =>  'checkbox'
		));
		// h1 typography settings
		class WP_Content_H1_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_html_e('Heading 1 (H1)','wallstreet'); ?></h3>
	    <?php
	    }
		}
		$wp_customize->add_setting(
		    'content_h1',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H1_Customize_Control( $wp_customize, 'content_h1', array(
				'section' => 'wallstreet_content_typography',
				'setting' => 'content_h1'
		    ))
		);
		$wp_customize->add_setting(
		    'h1_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h1_typography_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    'section' => 'wallstreet_content_typography',
				'setting' => 'h1_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'h1_typography_fontsize',
        array(
            'default' => 36,
            'sanitize_callback' => 'absint'
        )
    	);
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h1_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'h1_line_height',
	        array(
	            'default' => 40,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h1_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// h2 typography settings
		class WP_Content_H2_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content */
		    public function render_content() {
		    ?>
			  		<h3><?php esc_html_e('Heading 2 (H2)','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h2',
		    array(
		        'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H2_Customize_Control( $wp_customize, 'content_h2', array(
				'section' => 'wallstreet_content_typography',
				'setting' => 'content_h2'
		    ))
		);
		$wp_customize->add_setting(
		    'h2_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h2_typography_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    	'section' => 'wallstreet_content_typography',
				'setting' => 'h2_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'h2_typography_fontsize',
        array(
            'default' => 24,
            'sanitize_callback' => 'absint'
        )
   		 );
    	$wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h2_typography_fontsize',
        array(
            'label' => esc_html__('Font Size (px)', 'wallstreet'),
            'section' => 'wallstreet_content_typography',
            'input_attrs' => array(
                'min' => 5,
                'max' => 100,
                'step' => 1,
            ),
        )
    	) );
	    $wp_customize->add_setting( 'h2_line_height',
	        array(
	            'default' => 30,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h2_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// h3 typography settings
		class WP_Content_H3_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content*/
		    public function render_content() {
		    ?>
		  		<h3><?php esc_html_e('Heading 3 (H3)','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h3',
		    array(
		        'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H3_Customize_Control( $wp_customize, 'content_h3', array(
				'section' => 'wallstreet_content_typography',
				'setting' => 'content_h3'
		    ))
		);
		$wp_customize->add_setting(
		    'h3_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h3_typography_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        'section' => 'wallstreet_content_typography',
				'setting' => 'h3_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		    $wp_customize->add_setting( 'h3_typography_fontsize',
        array(
            'default' => 24,
            'sanitize_callback' => 'absint'
        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h3_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'h3_line_height',
	        array(
	            'default' => 30,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h3_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// h4 typography settings
		class WP_Content_H4_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
 				<h3><?php esc_html_e('Heading 4 (H4)','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h4',
		    array(
		        'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H4_Customize_Control( $wp_customize, 'content_h4', array(
				'section' => 'wallstreet_content_typography',
				'setting' => 'content_h4'
		    ))
		);
		$wp_customize->add_setting(
		    'h4_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h4_typography_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    'section' => 'wallstreet_content_typography',
				'setting' => 'h4_typography_fontfamily',
				'type'    =>  'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'h4_typography_fontsize',
        array(
            'default' => 25,
            'sanitize_callback' => 'absint'
        )
    	);
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h4_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'h4_line_height',
	        array(
	            'default' => 20,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h4_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// h5 typography settings
		class WP_Content_H5_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			    <h3><?php esc_html_e('Heading 5 (H5)','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h5',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H5_Customize_Control( $wp_customize, 'content_h5', array(
				'section' => 'wallstreet_content_typography',
				'setting' => 'content_h5'
		    ))
		);
		$wp_customize->add_setting(
		    'h5_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h5_typography_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    'section' => 'wallstreet_content_typography',
				'setting' => 'h5_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'h5_typography_fontsize',
        array(
            'default' => 16,
            'sanitize_callback' => 'absint'
        )
    	);
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h5_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'h5_line_height',
	        array(
	            'default' => 20,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h5_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// h6 typography settings
		class WP_Content_H6_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
		  		<h3><?php esc_html_e('Heading 6 (H6)','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h6',
		    array(
		        'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H6_Customize_Control( $wp_customize, 'content_h6', array(
				'section' => 'wallstreet_content_typography',
				'setting' => 'content_h6'
		    ))
		);
		$wp_customize->add_setting(
		    'h6_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h6_typography_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        'section' => 'wallstreet_content_typography',
				'setting' => 'h6_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		    $wp_customize->add_setting( 'h6_typography_fontsize',
        array(
            'default' => 14,
            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h6_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'h6_line_height',
	        array(
	            'default' => 20,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'h6_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// Paragraph typography settings
		class WP_Content_p_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
 				<h3><?php esc_html_e('Paragraph','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_p',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_p_Customize_Control( $wp_customize, 'content_p', array(
				'section' => 'wallstreet_content_typography',
				'setting' => 'content_p'
		    ))
		);
		$wp_customize->add_setting(
		    'p_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('p_typography_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        'section' => 'wallstreet_content_typography',
				'setting' => 'p_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		    $wp_customize->add_setting( 'p_typography_fontsize',
        array(
            'default' => 15,
            'sanitize_callback' => 'absint'
        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'p_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'p_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'p_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// Button text typography settings
		class WP_Content_button_text_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
 				<h3><?php esc_html_e('Button Text','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_button_text',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_button_text_Customize_Control( $wp_customize, 'content_button_text', array(
				'section' => 'wallstreet_content_typography',
				'setting' => 'content_button_text'
		    ))
		);
		$wp_customize->add_setting(
		    'button_text_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('button_text_typography_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        		'section' => 'wallstreet_content_typography',
				'setting' => 'button_text_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'button_text_typography_fontsize',
	        array(
	            'default' => 16,
	            'sanitize_callback' => 'absint'
	        )
    	);
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'button_text_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'button_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'button_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_content_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// Blog Page/Archive/Single Post typography
		$wp_customize->add_section( 'wallstreet_post_typography' , array(
				'title'      => esc_html__('Blog / Archive / Single Post', 'wallstreet'),
				'panel' 		 => 'wallstreet_typography_setting',
				'priority'   => 6
   		) );
		// Enable/Disable Blog/Archive/Single Post typography
		$wp_customize->add_setting(
		    'enable_post_typography',
		    array(
		        'default'           =>  false,
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'wallstreet_sanitize_checkbox'
    	));
		$wp_customize->add_control('enable_post_typography', array(
				'label'   => esc_html__('Enable Blog / Archive / Single Post Typography','wallstreet'),
        'section' => 'wallstreet_post_typography',
				'setting' => 'enable_post_typography',
				'type'    =>  'checkbox'
		));
		$wp_customize->add_setting(
		    'post_title_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('post_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        'section' => 'wallstreet_post_typography',
				'setting' => 'post_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		    $wp_customize->add_setting( 'post_title_fontsize',
        array(
            'default' => 27,
            'sanitize_callback' => 'absint'
        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'post_title_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_post_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'post_title_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'post_title_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_post_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// Shop Page typography 
		$wp_customize->add_section( 'wallstreet_shop_page_typography' , array(
				'title'      => esc_html__('Shop Page','wallstreet'),
				'panel' => 'wallstreet_typography_setting',
				'priority'       => 7,
		   	) );
		// Enable/Disable Shop Page typography
		$wp_customize->add_setting(
		    'enable_shop_page_typography',
		    array(
		        'default'           =>  false,
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
		    ) );
			
		$wp_customize->add_control('enable_shop_page_typography', array(
				'label' => esc_html__('Enable Shop Page Typography','wallstreet'),
		        'section' => 'wallstreet_shop_page_typography',
				'setting' => 'enable_shop_page_typography',
				'type'    =>  'checkbox'
		));
		// h1 typography settings
		class Wallstreet_Shop_Content_H1_Customize_Control extends WP_Customize_Control {
		    public $type = 'shop_h1';
		    /**
		    * Render the control's content.
		    */
		    public function render_content() {
		    ?>
			 <h3><?php esc_html_e('Heading 1 (H1)','wallstreet'); ?></h3>
			 <p><?php esc_html_e('Only for product detail page','wallstreet'); ?></p>
		    <?php
		    }
		}

		$wp_customize->add_setting(
		    'shop_content_h1',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
		    )	
		);
		$wp_customize->add_control( new Wallstreet_Shop_Content_H1_Customize_Control( $wp_customize, 'shop_content_h1', array(	
				'section' => 'wallstreet_shop_page_typography',
				'setting' => 'shop_content_h1',
		    ))
		);
		$wp_customize->add_setting(
		    'shop_h1_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
		    )	
		);
		$wp_customize->add_control('shop_h1_typography_fontfamily', array(
				'label' => esc_html__('Font family','wallstreet'),
		        'section' => 'wallstreet_shop_page_typography',
				'setting' => 'shop_h1_typography_fontfamily',
				'type'    =>  'select',
				'choices'=>$font_family
		));
	   $wp_customize->add_setting( 'shop_h1_typography_fontsize',
	        array(
	            'default' => 30,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'shop_h1_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_shop_page_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'shop_h1_line_height',
	        array(
	            'default' => 36,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'shop_h1_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_shop_page_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
          ) );

	// h2 typography settings
	class Wallstreet_Shop_Content_H2_Customize_Control extends WP_Customize_Control {
	    public $type = 'shop_h2';
	    /**
	    * Render the control's content.
	    */
	    public function render_content() {
	    ?>
		 <h3><?php esc_html_e('Heading 2 (H2)','wallstreet'); ?></h3>
		 <p><?php esc_html_e('Only for product title in shop page','wallstreet'); ?></p>
	    <?php
	    }
		}

		$wp_customize->add_setting(
		    'shop_content_h2',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
		    )	
		);
		$wp_customize->add_control( new Wallstreet_Shop_Content_H2_Customize_Control( $wp_customize, 'shop_content_h2', array(	
				'section' => 'wallstreet_shop_page_typography',
				'setting' => 'shop_content_h2',
		    ))
		);
		$wp_customize->add_setting(
		    'shop_h2_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
		    )	
		);
		$wp_customize->add_control('shop_h2_typography_fontfamily', array(
			'label' => esc_html__('Font family','wallstreet'),
	        'section' => 'wallstreet_shop_page_typography',
			'setting' => 'shop_h2_typography_fontfamily',
			'type'    =>  'select',
			'choices'=>$font_family
		));
	   	$wp_customize->add_setting( 'shop_h2_typography_fontsize',
	        array(
	            'default' => 18,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'shop_h2_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_shop_page_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'shop_h2_line_height',
	        array(
	            'default' => 30,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'shop_h2_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_shop_page_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// h3 typography settings
		class Wallstreet_Shop_Content_H3_Customize_Control extends WP_Customize_Control {
		    public $type = 'shop_h3';
		    /**
		    * Render the control's content.
		    */
		    public function render_content() {
		    ?>
			 <h3><?php esc_html_e('Heading 3 (H3)','wallstreet'); ?></h3>
			 <p><?php esc_html_e('Only for product checkout page','wallstreet'); ?></p>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'shop_content_h3',
		    array(
		        'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
		    )	
		);
		$wp_customize->add_control( new Wallstreet_Shop_Content_H3_Customize_Control( $wp_customize, 'shop_content_h3', array(	
				'section' => 'wallstreet_shop_page_typography',
				'setting' => 'shop_content_h3',
		    ))
		);
		$wp_customize->add_setting(
		    'shop_h3_typography_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
		    )	
		);
		$wp_customize->add_control('shop_h3_typography_fontfamily', array(
				'label' => esc_html__('Font family','wallstreet'),
		        'section' => 'wallstreet_shop_page_typography',
				'setting' => 'shop_h3_typography_fontfamily',
				'type'    =>  'select',
				'choices'=>$font_family
		));
	   $wp_customize->add_setting( 'shop_h3_typography_fontsize',
	        array(
	            'default' => 34,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'shop_h3_typography_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_shop_page_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'shop_h3_line_height',
	        array(
	            'default' => 42,
	            'sanitize_callback' => 'absint'
	        )
	    );
    	$wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'shop_h3_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_shop_page_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
          ));
		// Sidebar typography section
		$wp_customize->add_section( 'wallstreet_sidebar_typography' , array(
				'title'      => esc_html__('Sidebar Widgets', 'wallstreet'),
				'panel' 		 => 'wallstreet_typography_setting',
				'priority'   => 8
   		) );
		// Enable/Disable Sidebar typography section
		$wp_customize->add_setting(
		    'enable_sidebar_typography',
		    array(
		        'default'           =>  false,
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'wallstreet_sanitize_checkbox'
  		 ));
		$wp_customize->add_control('enable_sidebar_typography', array(
				'label'   => esc_html__('Enable Sidebar Widgets Typography','wallstreet'),
      	'section' => 'wallstreet_sidebar_typography',
				'setting' => 'enable_sidebar_typography',
				'type'    =>  'checkbox'
		));
		class WP_Sidebar_Widget_title_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			  		<h3><?php esc_html_e('Sidebar Widget Title','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'sidebar_widget_title',
		    array(
		        'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Sidebar_Widget_title_Customize_Control( $wp_customize, 'sidebar_widget_title', array(
				'section' => 'wallstreet_sidebar_typography',
				'setting' => 'sidebar_widget_title'
		    ))
		);
		$wp_customize->add_setting(
		    'sidebar_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('sidebar_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        'section' => 'wallstreet_sidebar_typography',
				'setting' => 'sidebar_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		    $wp_customize->add_setting( 'sidebar_fontsize',
        array(
            'default' => 24,
            'sanitize_callback' => 'absint'
        ));
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'sidebar_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_sidebar_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'sidebar_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'sidebar_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_sidebar_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		class WP_Sidebar_Widget_content_Customize_Control extends WP_Customize_Control {
			  public $type = 'new_menu';
			  public function render_content() {
			  ?>
			 		<h3><?php esc_html_e('Sidebar Widget Content','wallstreet'); ?></h3>
			  <?php
			  }
		}
		$wp_customize->add_setting(
		    'sidebar_widget_content',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Sidebar_Widget_content_Customize_Control( $wp_customize, 'sidebar_widget_content', array(
				'section' => 'wallstreet_sidebar_typography',
				'setting' => 'sidebar_widget_content'
		    ))
		);
		$wp_customize->add_setting(
		    'sidebar_widget_content_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('sidebar_widget_content_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        		'section' => 'wallstreet_sidebar_typography',
				'setting' => 'sidebar_widget_content_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting( 'sidebar_widget_content_fontsize',
        array(
            'default' => 15,
            'sanitize_callback' => 'absint'
        ));
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'sidebar_widget_content_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_sidebar_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'sidebar_widget_content_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'sidebar_widget_content_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_sidebar_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		// Footer Widgets typography section
		$wp_customize->add_section( 'wallstreet_widget_typography' , array(
				'title'      => esc_html__('Footer Widgets', 'wallstreet'),
				'panel'      => 'wallstreet_typography_setting',
				'priority'   => 9
   		) );
		// Enable/Disable Footer Widgets typography section
		$wp_customize->add_setting(
		    'enable_footer_widget_typography',
		    		array(
				        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'wallstreet_sanitize_checkbox'
   		 ) );
		$wp_customize->add_control('enable_footer_widget_typography', array(
				'label'   => esc_html__('Enable Footer Widget Typography','wallstreet'),
        'section' => 'wallstreet_widget_typography',
				'setting' => 'enable_footer_widget_typography',
				'type'    =>  'checkbox'
		));
		class WP_Footer_Widget_title_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
		    		<h3><?php esc_html_e('Footer Widget Title','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'footer_widget_title',
		    array(
	        	'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Footer_Widget_title_Customize_Control( $wp_customize, 'footer_widget_title', array(
				'section' => 'wallstreet_widget_typography',
				'setting' => 'footer_widget_title'
		    ))
		);
		$wp_customize->add_setting(
		    'footer_widget_title_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('footer_widget_title_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
        		'section' => 'wallstreet_widget_typography',
				'setting' => 'footer_widget_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'footer_widget_title_fontsize',
	        array(
	            'default' => 24,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'footer_widget_title_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_widget_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'footer_widget_title_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'footer_widget_title_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_widget_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
		class WP_Footer_Widget_content_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
	 			<h3><?php esc_html_e('Footer Widget Content','wallstreet'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'footer_widget_content',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Footer_Widget_content_Customize_Control( $wp_customize, 'footer_widget_content', array(
				'section' => 'wallstreet_widget_typography',
				'setting' => 'footer_widget_content'
		    ))
		);
		$wp_customize->add_setting(
		    'footer_widget_content_fontfamily',
		    array(
		        'default'           =>  'Roboto',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('footer_widget_content_fontfamily', array(
				'label'   => esc_html__('Font family','wallstreet'),
		    'section' => 'wallstreet_widget_typography',
				'setting' => 'footer_widget_content_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
	    $wp_customize->add_setting( 'footer_widget_content_fontsize',
	        array(
	            'default' => 15,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'footer_widget_content_fontsize',
	        array(
	            'label' => esc_html__('Font Size (px)', 'wallstreet'),
	            'section' => 'wallstreet_widget_typography',
	            'input_attrs' => array(
	                'min' => 5,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
	    $wp_customize->add_setting( 'footer_widget_content_line_height',
	        array(
	            'default' => 25,
	            'sanitize_callback' => 'absint'
	        )
	    );
	    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'footer_widget_content_line_height',
	        array(
	            'label' => esc_html__('Line height (px)', 'wallstreet'),
	            'section' => 'wallstreet_widget_typography',
	            'input_attrs' => array(
	                'min' => 1,
	                'max' => 100,
	                'step' => 1,
	            ),
	        )
	    ) );
}
add_action( 'customize_register', 'wallstreet_typography_customizer' );