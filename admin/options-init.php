<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_options";






    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $inc_assets = get_template_directory_uri().'/inc/assests';
    $inc_images = $inc_assets . '/images/';

    $args = array(
        'opt_name' => 'theme_options',
        'footer_credit'  => 'Wpautomate Options panel v1',
        'use_cdn' => false,
        'display_name' => 'Theme Options',
        'display_version' => '1.0.0',
        'page_title' => 'Theme Options Panel',
        'update_notice' => TRUE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Theme Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'default_mark' => '*',
        'customizer' => true,
        // Options need to true for developer
        'dev_mode' => false,
        'show_options_object' => false,
        //
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );


    Redux::setArgs( $opt_name, $args );



    /*
     *
     * ---> START SECTIONS
     *
     */

    /*
    * Global Section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Global', 'wpautomate' ),
        'id'     => 'global',
        'icon'   => 'el el-cog',
    ) );
    /*
    * General section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'global-genaral',
        'subsection' => true,
        'fields' => array(
           array(
               'id' => 'opt-grid-width',
               'type' => 'slider',
               'title' => __('Grid Width', 'wpautomate'),
               "default" => 75,
               "min" => 1024,
               "step" => 50,
               "max" => 1920,
               'display_value' => 'text'
           ),
           array(
               'id'       => 'opt-button-style',
               'type'     => 'image_select',
               'title'    => __('Button style', 'wpautomate'),
               'options'  => Array(
                  '1'      => array(
                      'alt'   => '1 Column',
                      'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                  ),
                  '2'      => array(
                      'alt'   => '2 Column Left',
                      'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                  ),
               ),
               'default'  => 'Image Name 1',
           ),
           array(
               'id'   => 'opt_group_background',
               'type' => 'info',
               'desc' => __('Background settings.', 'wpautomate')
           ),
           array(
               'id'       => 'opt-page-background',
               'type'     => 'background',
               'title'    => __('Body Background', 'wpautomate'),
           ),
           array(
               'id'   => 'opt_group_glob_icon',
               'type' => 'info',
               'desc' => __('Icon.', 'wpautomate')
           ),
           array(
               'id'       => 'opt-glob-favicon',
               'type'     => 'media',
               'url'      => true,
               'title'    => __('Favicon', 'wpautomate'),
               'desc'     => __('favicon.ico 32x32 pixels', 'wpautomate'),
           ),
           array(
               'id'       => 'opt-glob-appletuch-favicon',
               'type'     => 'media',
               'url'      => true,
               'title'    => __('Favicon', 'wpautomate'),
               'desc'     => __('apple-touch-icon.png 180x180 pixels', 'wpautomate'),
           ),
        )
    ) );
    /*
    * Logo Section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Logo', 'wpautomate' ),
        'id'     => 'global-logo',
        'subsection' => true,
        'fields' => array(
          array(
              'id'       => 'opt-glob-logo',
              'type'     => 'media',
              'url'      => true,
              'title'    => __('Logo', 'wpautomate'),
          ),
          array(
              'id'       => 'opt-retina-logo',
              'type'     => 'media',
              'url'      => true,
              'title'    => __('Retina Logo', 'wpautomate'),
          ),
          array(
              'id'       => 'opt-sticky-header-logo',
              'type'     => 'media',
              'url'      => true,
              'title'    => __('Retina Logo', 'wpautomate'),
          ),
          array(
              'id'       => 'opt-text-header-logo',
              'type'     => 'text',
              'title'    => __('Text Logo', 'wpautomate'),
          ),

        )
    ) );

    /*
    * Advanced Section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Advanced', 'wpautomate' ),
        'id'     => 'advanced',
        'subsection' => true,
        'fields' => array(
           array(
                   'id'       => 'opt_glob_posttype',
                   'type'     => 'checkbox',
                   'title'    => __('Disable PostType', 'wpautomate'),
                   //Must provide key => value pairs for multi checkbox options
                   'options'  => array(
                       '1' => 'Opt 1',
                       '2' => 'Opt 2',
                       '3' => 'Opt 3'
                   ),

            ),
           array(
                   'id'       => 'opt_glob_posttype',
                   'type'     => 'checkbox',
                   'title'    => __('Disable Function', 'wpautomate'),
                   //Must provide key => value pairs for multi checkbox options
                   'options'  => array(
                       '1' => 'Demo Data',
                       '2' => 'Mega Menu',
                   ),
            ),
           array(
               'id'       => 'opt-slider-common',
               'type'     => 'text',
               'title'    => __('Slider', 'wpautomate'),
           ),
           array(
               'id'       => 'opt_glob_static_css',
               'type'     => 'switch',
               'title'    => __('Static Css', 'wpautomate'),
               'default'  => true,
           )
        ),
    ) );

    /*
    * Optimization section
     */
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Optimization', 'wpautomate' ),
        'id'         => 'optimization',
        'subsection' => true,
        'fields'     => array(
           array(
             'id'       => 'opt-style-optimize',
             'type'     => 'switch',
             'title'    => __('Optimize Stylesheet', 'wpautomate'),
             'default'  => false,
           ),
           array(
             'id'       => 'opt-js-optimize',
             'type'     => 'switch',
             'title'    => __('Optimize Javascript', 'wpautomate'),
             'default'  => false,
           ),
        )
    ) );

    // Rtl support
    Redux::setSection( $opt_name, array(
        'title'      => __( 'RTL', 'wpautomate' ),
        'id'         => 'opt-rtl',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-rtl-status',
                'type'     => 'checkbox',
                'title'    => __( 'Enable RTL support for Theme', 'wpautomate' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'opt-rtl-editor',
                'type'     => 'checkbox',
                'title'    => __( 'Enable RTL support For editor', 'wpautomate' ),
                'default'  => '0',
            ),
        )
    ) );

    /*
    * Header and subheader section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Header & subheader', 'wpautomate' ),
        'id'     => 'header-subheader',
        'icon'   => 'el el-cog',
    ) );
    /*
    * Header section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Header', 'wpautomate' ),
        'id'     => 'header',
        'subsection' => true,
        'fields' => array(
           array(
               'id'       => 'opt-header-style',
               'type'     => 'image_select',
               'title'    => __('Layout style', 'wpautomate'),
               'options'  => Array(
                  '1'      => array(
                      'alt'   => '1 Column',
                      'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                  ),
                  '2'      => array(
                      'alt'   => '2 Column Left',
                      'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                  ),
               ),
               'default'  => 'Image Name 1',
           ),
           array(
               'id'       => 'opt-header-background',
               'type'     => 'background',
               'title'    => __('Background', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-header-sticky',
             'type'     => 'switch',
             'title'    => __('Sticky', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-header-style',
             'type'     => 'select',
             'title'    => __('Style', 'wpautomate'),
             'options'  => array(
                 'light' => 'light',
                 'dark' => 'dark',
              ),
           ),

        )
    ) );
    /*
    * Subheader section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Subheader', 'wpautomate' ),
        'id'     => 'subheader',
        'subsection' => true,
        'fields' => array(
           array(
             'id'       => 'opt-subheader-style',
             'type'     => 'select',
             'title'    => __('Style', 'wpautomate'),
             'options'  => array(
                 'light' => 'light',
                 'dark' => 'dark',
              ),
           ),
           array(
                   'id'       => 'opt_subheader_partial',
                   'type'     => 'checkbox',
                   'title'    => __('Disable', 'wpautomate'),
                   //Must provide key => value pairs for multi checkbox options
                   'options'  => array(
                       '1' => 'Breadcrumb',
                       '2' => 'Subheader',
                   ),

            ),
            array(
                   'id'       => 'opt_title_tag',
                   'type'     => 'select',
                   'title'    => __('Title tag', 'wpautomate'),
                   //Must provide key => value pairs for multi checkbox options
                   'options'  => array(
                       'h1' => 'h1',
                       'h2' => 'h2',
                       'h3' => 'h3',
                   ),
                   'default' => array (
                    'h1' => 'h1'
                    )

            ),
            array(
                'id'       => 'opt-subheader-background',
                'type'     => 'background',
                'title'    => __('Background', 'wpautomate'),
            ),
        )
    ) );
    /*
    * Menu section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu', 'wpautomate' ),
        'id'     => 'menu',
        'subsection' => true,
        'fields' => array(
          array(
             'id'       => 'opt_menu_style',
             'type'     => 'select',
             'title'    => __('Title tag', 'wpautomate'),
             'options'  => array(
                 'style-v1' => 'style-v1',
                 'style-v2' => 'style-v2',
             ),
             'default' => array (
                'style-v1' => 'style-v1',
              )
          ),
          array(
            'id'       => 'opt_menu_options',
            'type'     => 'checkbox',
            'title'    => __('Options', 'wpautomate'),
            //Must provide key => value pairs for multi checkbox options
            'options'  => array(
                '1' => 'Menu arrow with submenu',
                '2' => 'Hide border between items',
            ),
           ),

        )
    ) );


    /*
    * Sidebar section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Sidebar', 'wpautomate' ),
        'id'     => 'sidebar',
    ) );

    /*
    * Sidebar General section
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'sidebar-general',
        'subsection' => true,
        'fields' => array(
            array(
                'id'   => 'info_sidebars',
                'type' => 'info',
                'desc' => __('Sidebars', 'wpautomate')
            ),
           array(
             'id'=>'sidebar_list',
             'type' => 'multi_text',
             'title' => __('Custom sidebar list', 'wpautomate'),
            ),
           array(
               'id'   => 'info_sidebar_layout',
               'type' => 'info',
               'desc' => __('Layout', 'wpautomate')
           ),
           array(
               'id'        => 'opt-sidebar-width',
               'type'      => 'slider',
               'title'     => __('Sidebar width', 'wpautomate'),
               "min"       => 150,
               "step"      => 50,
               "max"       => 500,
               'display_value' => 'label'
           ),
           array(
               'id'   => 'info_sidebar_pages',
               'type' => 'info',
               'desc' => __('Page sidebar', 'wpautomate')
           ),
           array(
               'id'       => 'opt-page-layout-sidebar',
               'type'     => 'image_select',
               'title'    => __('Layout', 'wpautomate'),
               'options'  => Array(
                  'meta'      => array(
                      'alt'   => 'Use pagemeta',
                      'img'   => $inc_images.'question.png'
                  ),
                  '1'      => array(
                      'alt'   => '1 Column',
                      'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                  ),
                  '2'      => array(
                      'alt'   => '2 Column',
                      'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                  ),
                  '3'      => array(
                      'alt'   => '2 Column',
                      'img'   => ReduxFramework::$_url.'assets/img/2cr.png'
                  ),
               ),
           ),
           array(
               'id'       => 'opt-page-sidebar-force',
               'type'     => 'text',
               'title'    => __('Force sidebar', 'wpautomate'),
               'desc'     => __('Force sidebar for all pages', 'wpautomate'),
           ),
           // Post sidebar
           array(
               'id'   => 'info_sidebar_posts',
               'type' => 'info',
               'desc' => __('Post sidebar', 'wpautomate')
           ),
           array(
               'id'       => 'opt-posts-layout-sidebar',
               'type'     => 'image_select',
               'title'    => __('Layout', 'wpautomate'),
               'options'  => Array(
                  'meta'      => array(
                      'alt'   => 'Use pagemeta',
                      'img'   => $inc_images.'question.png'
                  ),
                  '1'      => array(
                      'alt'   => '1 Column',
                      'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                  ),
                  '2'      => array(
                      'alt'   => '2 Column',
                      'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                  ),
                  '3'      => array(
                      'alt'   => '2 Column',
                      'img'   => ReduxFramework::$_url.'assets/img/2cr.png'
                  ),
               ),
           ),
           array(
               'id'       => 'opt-posts-sidebar-force',
               'type'     => 'text',
               'title'    => __('Force sidebar', 'wpautomate'),
               'desc'     => __('Force sidebar for all pages', 'wpautomate'),
           ),

        )
    ) );

    /*
    * Post type
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Post Type', 'wpautomate' ),
        'id'     => 'post-type',
    ) );
    /*
    * General
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Blog', 'wpautomate' ),
        'id'     => 'blog-section',
        'subsection' => true,
        'fields' => array(
          array(
              'id'   => 'info_post_list',
              'type' => 'info',
              'desc' => __('List page', 'wpautomate')
          ),
           array(
               'id'       => 'opt-blog-layout',
               'type'     => 'image_select',
               'title'    => __('Layout', 'wpautomate'),
               'options'  => Array(
                  '1'      => array(
                      'alt'   => '1 Column',
                      'img'   => $inc_images .'classic.png',
                  ),
                  '2'      => array(
                      'alt'   => '2 Column',
                      'img'   => $inc_images .'masonry.png',
                  ),
                  '3'      => array(
                      'alt'   => '2 Column',
                      'img'   => $inc_images .'photo.png',
                  ),
               ),
           ),
           array(
               'id'       => 'opt-blog-excerpt-length',
               'type'     => 'text',
               'title'    => __('Excerpt length', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-blog-post-meta',
             'type'     => 'checkbox',
             'title'    => __('Options', 'wpautomate'),
             //Must provide key => value pairs for multi checkbox options
             'options'  => array(
                 '1' => 'Date',
                 '2' => 'Categories',
                 '3' => 'Tag',
              ),
            ),
           array(
             'id'   => 'opt-blog-single',
             'type' => 'info',
             'desc' => __('Single Post', 'wpautomate')
           ),
           array(
             'id'       => 'opt-blog-single-title',
             'type'     => 'switch',
             'title'    => __('Title', 'wpautomate'),
             'desc' => __('Show Post title', 'wpautomate'),
             'default'  => true,
           ),
           array(
             'id'       => 'opt-blog-single-author-box',
             'type'     => 'switch',
             'title'    => __('Author box', 'wpautomate'),
             'desc' => __('Show Author box', 'wpautomate'),
             'default'  => true,
           ),
           array(
               'id'       => 'opt-blog-rel-post',
               'type'     => 'text',
               'title'    => __('Related post length', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-blog-relpost-col',
             'type'     => 'select',
             'title'    => __('Style', 'wpautomate'),
             'options'  => array(
                 '2' => '2',
                 '3' => '3',
                 '4' => '4',
              ),
           ),
           array(
             'id'   => 'opt-blog-advanced',
             'type' => 'info',
             'desc' => __('Advanced', 'wpautomate')
           ),
           array(
             'id'       => 'opt-blog-menu',
             'type'     => 'text',
             'title'    => __('Menu', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-blog-sidebar',
             'type'     => 'text',
             'title'    => __('Sidebar', 'wpautomate'),
           ),
        )
    ) );
    /*
    * Blog
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Pages', 'wpautomate' ),
        'id'     => 'pages',
    ) );
    /*
    * General
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'page-general',
        'subsection' => true,
        'fields' => array(
           array(
             'id'       => 'opt-page-comments',
             'type'     => 'switch',
             'title'    => __('Page comments', 'wpautomate'),
             'default'  => true,
           ),


        )
    ) );
    /*
    * Error 404
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Error 404', 'wpautomate' ),
        'id'     => 'page-404',
        'subsection' => true,
        'fields' => array(
           array(
               'id'       => 'page-404-background',
               'type'     => 'media',
               'url'      => true,
               'title'    => __('Page background', 'wpautomate'),
           ),
           array(
               'id'               => 'page-404-text',
               'type'             => 'editor',
               'title'            => __('Error page text', 'wpautomate'),
               'args'   => array(
                   'textarea_rows'    => 10
               )
           ),
        )
    ) );
    /*
    * Error 404
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Under construction', 'wpautomate' ),
        'id'     => 'page-maintainance',
        'subsection' => true,
        'fields' => array(
           array(
             'id'       => 'opt-undercon-status',
             'type'     => 'switch',
             'title'    => __('Under construction', 'wpautomate'),
             'default'  => true,
           ),
           array(
             'id'       => 'opt-undercon-title',
             'type'     => 'text',
             'title'    => __('Title', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-undercon-text',
             'type' => 'textarea',
             'title'    => __('Text', 'wpautomate'),
             'default' => '<br />Some HTML is allowed in here.<br />',
           ),
           array(
             'id'       => 'opt-undercon-date',
             'type'     => 'text',
             'title'    => __('Launch Date', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-undercon-date',
             'type'     => 'text',
             'title'    => __('Contact form Shortcode', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-undercon-custompage',
             'type'     => 'text',
             'title'    => __('Custom Page', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-undercon-date',
             'type'     => 'text',
             'title'    => __('Launch Date', 'wpautomate'),
           ),
        )
    ) );

    /*
    * Footer
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer', 'wpautomate' ),
        'id'     => 'footer',
    ) );
    /*
    * Footer Genetal
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'footer-gen',
        'subsection' => true,
        'fields' => array(
          array(
              'id'   => 'opt-footer-layout',
              'type' => 'info',
              'desc' => __('Footer Layout', 'wpautomate')
          ),
          array(
             'id'       => 'opt-footer-layout',
             'type'     => 'select',
             'title'    => __('Layout', 'wpautomate'),
             'options'  => array(
                 'lt1' => '1/4 1/4 1/4',
                 'lt2' => '1/6 1/6',
              ),
          ),
          array(
             'id'       => 'opt-footer-style',
             'type'     => 'select',
             'title'    => __('Style', 'wpautomate'),
             'options'  => array(
                 'light' => 'light',
                 'dark' => 'dark',
              ),
          ),
          array(
              'id'    => 'opt-footer-back',
              'type'  => 'background',
              'title' => __('Footer Background', 'wpautomate'),
          ),
          array(
              'id'   => 'opt-footer-advanced',
              'type' => 'info',
              'desc' => __('Advanced', 'wpautomate')
          ),
          array(
            'id'    => 'opt-footer-copytight',
            'type'  => 'text',
            'title' => __('Copyright Text', 'wpautomate'),
          ),
          array(
             'id'       => 'opt-footer-bar2',
             'type'     => 'select',
             'title'    => __('Copyright bar style', 'wpautomate'),
             'options'  => array(
                 'light' => 'light',
                 'dark' => 'dark',
              ),
          ),
          array(
              'id'   => 'opt-footer-extra',
              'type' => 'info',
              'desc' => __('Extra', 'wpautomate')
          ),
          array(
             'id'       => 'opt-footer-backtotop',
             'type'     => 'select',
             'title'    => __('Back to top', 'wpautomate'),
             'options'  => array(
                 'st1' => 'Sticky',
                 'st2' => 'Sticky show on footer',
                 'hide' => 'Hide',
              ),
          ),
        )
    ) );

    /*
    * Responsive
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Responsive', 'wpautomate' ),
        'id'     => 'responsive',
    ) );
    /*
    * Footer Genetal
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'resonsive-gen',
        'subsection' => true,
        'fields' => array(
           array(
               'id'    => 'opt-respon-logo',
               'type'  => 'media',
               'title' => __('Mobile Logo', 'wpautomate'),
               'desp'  => __('Optional',  'wpautomate'),
           ),
        )
    ) );
    /*
    * Seo
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Seo', 'wpautomate' ),
        'id'     => 'seo',
    ) );
    /*
    * Seo Genetal
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'seo-gen',
        'subsection' => true,
        'fields' => array(
           array(
               'id'               => 'opt-seo-analytics',
               'type'             => 'textarea',
               'title'            => __('Add Analytics', 'wpautomate'),
               'args'   => array(
                   'textarea_rows'    => 10
               )
           ),
           array(
              'id'       => 'opt-seo-analyticpos',
              'type'     => 'select',
              'title'    => __('Analytics position in page', 'wpautomate'),
              'desc'     => __('Should be before end of body tag for better page speed.', 'wpautomate'),
              'options'  => array(
                  'st1' => 'Head',
                  'st2' => 'Before end of body tag',
               ),
           ),
        )
    ) );
    /*
    * Social
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Social', 'wpautomate' ),
        'id'     => 'social',
    ) );
    /*
    * Social Genetal
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'social-gen',
        'subsection' => true,
        'fields' => array(
          array(
              'id'       => 'opt-slink-opennewtab',
              'type'     => 'switch',
              'title'    => __('Open links in new tab', 'wpautomate'),
              'default'  => false,
          ),
           array(
             'id'    => 'opt-slink-skype',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Skype', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-twitter',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Twitter', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-facebook',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Facebook', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-googleplus',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Google Plus', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-vimeo',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Vimeo', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-youtube',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Youtube', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-flicker',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Flicker', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-linkedin',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Linkedin', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-pinterest',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Pinterest', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-dribble',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Dribble', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-behence',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Behence', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-tumblr',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Tumblr', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-vkontakte',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('VKontakte', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-viadeo',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Viadeo', 'wpautomate'),
           ),
           array(
             'id'    => 'opt-slink-xing',
             'type'  => 'text',
             'validate' => 'url',
             'title' => __('Xing', 'wpautomate'),
           ),
           array(
               'id'       => 'opt-slink-hiderss',
               'type'     => 'switch',
               'title'    => __('Hide RSS', 'wpautomate'),
               'default'  => false,
           ),
        )
    ) );
    /*
    * Addons and Plugins
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Addons & plugins', 'wpautomate' ),
        'id'     => 'addons-plguins',
    ) );
    /*
    * Addons
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Addons', 'wpautomate' ),
        'id'     => 'addons',
        'subsection' => true,
        'fields' => array(
           array(
             'id'   => 'opt_addon-paralax',
             'type' => 'info',
             'desc' => __('Paralax and scroll', 'wpautomate')
           ),
           array(
             'id'       => 'opt-addon-scroll',
             'type'     => 'switch',
             'title'    => __('Nice Scroll', 'wpautomate'),
             'default'  => false,
           ),
           array(
             'id'    => 'opt-addon-scroll-speed',
             'type'  => 'text',
             'title' => __('Scroll speed', 'wpautomate'),
             'desc' => __('Default 40', 'wpautomate'),
           ),
           array(
             'id'       => 'opt-addon-paralax',
             'type'     => 'switch',
             'title'    => __('Enllax', 'wpautomate'),
             'default'  => false,
           ),
           array(
             'id'   => 'opt_addon-prettyphoto',
             'type' => 'info',
             'desc' => __('Light Box', 'wpautomate')
           ),
           array(
             'id'   => 'opt_addons',
             'type' => 'info',
             'desc' => __('Addons', 'wpautomate')
           ),
           array(
             'id'       => 'opt-addon-retinajs',
             'type'     => 'switch',
             'title'    => __('Retina Js', 'wpautomate'),
             'default'  => true,
           ),
        )
    ) );

    /*
    * Colors
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Colors', 'wpautomate' ),
        'id'     => 'colors',
    ) );
    /*
    * Colos Genetal
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'colors-gen',
        'subsection' => true,
        'fields' => array(
           array(
             'id'   => 'opt-color-skins',
             'type' => 'info',
             'title' => 'Skin',
             'subtitle' => __('Choose one of the predefined styles. Important: color option can be used only with custom skin.', 'wpautomate')
           ),
           array(
             'id'       => 'opt-color-skin',
             'type'     => 'select',
             'title'    => __('Theme skin', 'wpautomate'),
             'options'  => array(
                 'light' => 'Light',
                 'dark' => 'Dark',
                 'custom' => 'Custom',
              ),
           ),
           array(
             'id'   => 'opt-color-gen',
             'type' => 'info',
             'title' => 'Background',
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-bodyback',
             'type' => 'color',
             'title' => 'Body background',
             'required' => array('opt-color-skin','equals','custom'),
           ),
        )
    ) );
    /*
    * Colos Header
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Header', 'wpautomate' ),
        'id'     => 'colors-header',
        'subsection' => true,
        'fields' => array(
           array(
             'id'   => 'oc-header',
             'type' => 'color_rgba',
             'title' => 'Header background',
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'oc-back-subheader',
             'type' => 'color_rgba',
             'title' => 'Sub header background',
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'oc-subheader-title',
             'type' => 'color',
             'title' => 'Sub header title color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
        )
    ) );
    /*
    * Colos Menu
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu', 'wpautomate' ),
        'id'     => 'colors-menu',
        'subsection' => true,
        'fields' => array(
           array(
             'id'   => 'opt-color-menu',
             'type' => 'info',
             'title' => 'Menu',
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-menu-link',
             'type' => 'link_color',
             'title' => 'Menu color | link',
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-menu-back',
             'type' => 'color_rgba',
             'title' => 'Menu Background',
             'required' => array('opt-color-skin','equals','custom'),
           ),

            array(
              'id'   => 'opt-color-menu-sub',
              'type' => 'info',
              'title' => 'Sub Menu',
              'required' => array('opt-color-skin','equals','custom'),
            ),
            array(
              'id'   => 'opt-color-menu-sub-link',
              'type' => 'link_color',
              'title' => 'Sub Menu color',
              'required' => array('opt-color-skin','equals','custom'),
            ),
            array(
              'id'   => 'opt-color-menu-sub-back',
              'type' => 'color_rgba',
              'title' => 'Sub menu background',
              'required' => array('opt-color-skin','equals','custom'),
            ),

        )
    ) );
    /*
    * Colos content
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Content', 'wpautomate' ),
        'id'     => 'colors-content',
        'subsection' => true,
        'fields' => array(
           array(
             'id'   => 'opt-color-body',
             'type' => 'color',
             'title' => 'Body text',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-link',
             'type' => 'link_color',
             'title' => 'Link color',
             'active' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-hr',
             'type' => 'color',
             'title' => 'Hr color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'oc-btn-primary',
             'type' => 'link_color',
             'title' => 'Primary button',
             'active' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'oc-btn-primary-back',
             'type' => 'link_color',
             'title' => 'Primary button background',
             'active' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-headings',
             'type' => 'info',
             'title' => 'Headings',
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-h1',
             'type' => 'color',
             'title' => 'H1 color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-h2',
             'type' => 'color',
             'title' => 'H2 color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-h3',
             'type' => 'color',
             'title' => 'H3 color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-h4',
             'type' => 'color',
             'title' => 'H4 color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-h5',
             'type' => 'color',
             'title' => 'H5 color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-color-h6',
             'type' => 'color',
             'title' => 'H6 color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
        ),
    ) );
    /*
    * Colos Footer
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer', 'wpautomate' ),
        'id'     => 'colors-footer',
        'subsection' => true,
        'fields' => array(
           array(
             'id'   => 'opt-foot-back',
             'type' => 'color',
             'title' => 'Footer Text color',
             'transparent' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
           array(
             'id'   => 'opt-foot-link',
             'type' => 'link_color',
             'title' => 'Footer Text color',
             'active' => false,
             'required' => array('opt-color-skin','equals','custom'),
           ),
        )
    ) );

    /*
    * Colos Shortcodes
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Shortcodes', 'wpautomate' ),
        'id'     => 'colors-shortcodes',
        'subsection' => true,
        'fields' => array(

        )
    ) );
    /*
    * Fonts
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Fonts', 'wpautomate' ),
        'id'     => 'fonts',
    ) );
    /*
    * Font Family
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'fonts-general',
        'subsection' => true,
        'fields' => array(
              array(
                'id'   => 'opt-fonts-primary',
                'type' => 'info',
                'title' => 'Primary Fonts',
              ),
              array(
                'id'          => 'opt-typo-body',
                'type'        => 'typography',
                'title'       => __('Body font', 'wpautomate'),
                'google'      => true,
                'font-backup' => true,
                'units'       =>'px',
                'subtitle'    => __('Theme default text for content.', 'wpautomate'),
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
              ),
              array(
                'id'          => 'opt-typo-heading',
                'type'        => 'typography',
                'title'       => __('Headings', 'wpautomate'),
                'google'      => true,
                'font-backup' => true,
                'units'       =>'px',
                'subtitle'    => __('Fonts for heading', 'wpautomate'),
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
                'font-size'       => false,
                'line-height'=> false,
              ),
              array(
                'id'          => 'opt-typo-theme-1',
                'type'        => 'typography',
                'title'       => __('Theme fonts 1', 'wpautomate'),
                'google'      => true,
                'font-backup' => true,
                'units'       =>'px',
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
                'font-size'       => false,
                'line-height'=> false,
              ),
              array(
                'id'          => 'opt-typo-theme-2',
                'type'        => 'typography',
                'title'       => __('Theme fonts 2', 'wpautomate'),
                'google'      => true,
                'font-backup' => true,
                'units'       =>'px',
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
                'font-size'       => false,
                'line-height'=> false,
              ),
              array(
                'id'          => 'opt-typo-theme-3',
                'type'        => 'typography',
                'title'       => __('Theme fonts 3', 'wpautomate'),
                'google'      => true,
                'font-backup' => true,
                'units'       =>'px',
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
                'font-size'       => false,
                'line-height'=> false,
              ),
              array(
                'id'   => 'opt-fonts-size',
                'type' => 'info',
                'title' => 'Heading Fonts size',
              ),
              array(
                'id'          => 'opt-typo-h1-size',
                'type'        => 'typography',
                'title'       => __('Heading 1', 'wpautomate'),
                'font-family' => false,
                'units'       =>'px',
                'subsets'     => false,
                'font-style'  => false,
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
                'compiler'    => array( 'h2.site-description-compiler' ),
              ),
              array(
                'id'          => 'opt-typo-h2-size',
                'type'        => 'typography',
                'title'       => __('Heading 2', 'wpautomate'),
                'font-family' => false,
                'units'       =>'px',
                'subsets'     => false,
                'font-style'  => false,
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
              ),
              array(
                'id'          => 'opt-typo-h3-size',
                'type'        => 'typography',
                'title'       => __('Heading 3', 'wpautomate'),
                'font-family' => false,
                'units'       =>'px',
                'subsets'     => false,
                'font-style'  => false,
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
              ),
              array(
                'id'          => 'opt-typo-h4-size',
                'type'        => 'typography',
                'title'       => __('Heading 4', 'wpautomate'),
                'font-family' => false,
                'units'       =>'px',
                'subsets'     => false,
                'font-style'  => false,
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
              ),
              array(
                'id'          => 'opt-typo-h5-size',
                'type'        => 'typography',
                'title'       => __('Heading 5', 'wpautomate'),
                'font-family' => false,
                'units'       =>'px',
                'subsets'     => false,
                'font-style'  => false,
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
              ),
              array(
                'id'          => 'opt-typo-h6-size',
                'type'        => 'typography',
                'title'       => __('Heading 6', 'wpautomate'),
                'font-family' => false,
                'units'       =>'px',
                'subsets'     => false,
                'font-style'  => false,
                'preview'     => false,
                'text-align'  => false,
                'color'       => false,
              ),
        )
    ) );


    /*
    * Translate
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Translate', 'wpautomate' ),
        'id'     => 'translate',
    ) );
    /*
    * Translate General
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'wpautomate' ),
        'id'     => 'translate-gen',
        'subsection' => true,
        'fields' => array(
           array(
             'id'       => 'opt-lan-switch',
             'type'     => 'switch',
             'title'    => __('Enabel Translate', 'wpautomate'),
             'subtitle' => __('If you want more complex translatation turn it off.', 'wpautomate')
           )
        )
    ) );
    /*
    * Translate Blog
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Blog', 'wpautomate' ),
        'id'     => 'translate-blog',
        'subsection' => true,
        'fields' => array(

        )
    ) );
    /*
    * Translate error and search
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Error & Search', 'wpautomate' ),
        'id'     => 'translate-error-search',
        'subsection' => true,
        'fields' => array(

        )
    ) );

    /*
    * Custom Code
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Custom code', 'wpautomate' ),
        'id'     => 'customcode',
    ) );
    /*
    * Custom Css
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Css', 'wpautomate' ),
        'id'     => 'customcode-css',
        'subsection' => true,
        'fields' => array(
           array(
               'id'       => 'css_editor',
               'type'     => 'ace_editor',
               'title'    => __('Custom CSS Code', 'wpautomate'),
               'subtitle' => __('Paste your CSS code here.', 'wpautomate'),
               'compiler' => true,
               'mode'     => 'css',
               'theme'    => 'monokai',
           ),
        )
    ) );
    /*
    * Custom Css
     */
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Js', 'wpautomate' ),
        'id'     => 'customcode-js',
        'subsection' => true,
        'fields' => array(
           array(
               'id'       => 'js_editor',
               'type'     => 'ace_editor',
               'title'    => __('Custom JS Code', 'wpautomate'),
               'mode'     => 'js',
               'theme'    => 'monokai',
           ),
        )
    ) );


    /*
     * <--- END SECTIONS
     */

  /// Save and update options into separate css file
  add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

  function compiler_action($options, $css, $changed_values) {
      global $wp_filesystem;

      $filename =  get_template_directory() . '/css/theme-options.css';

      if( empty( $wp_filesystem ) ) {
          require_once( ABSPATH .'/wp-admin/includes/file.php' );
          WP_Filesystem();
      }

      if( $wp_filesystem ) {
          $wp_filesystem->put_contents(
              $filename,
              $css,
              FS_CHMOD_FILE // predefined mode settings for WP files
          );
      }
  }
