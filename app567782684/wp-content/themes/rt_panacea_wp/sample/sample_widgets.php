<?php
        function replace_token_url($var){
        $out = $var;
        if (is_string($var)){
            $out = str_replace("@RT_SITE_URL@", get_bloginfo("wpurl"), $var);
        }
        return $out;
    }

    function filter_token_url($value, $oldvalue) {
        if (is_array($value)){
            return multidimensionalArrayMap("replace_token_url", $value);
            return $value;
        }
        else if (is_string($value))
            return replace_token_url($value);
        else
            return $value;
    }

    function multidimensionalArrayMap( $func, $arr )
    {
    $newArr = array();
    foreach( $arr as $key => $value )
        {
        $newArr[ $key ] = ( is_array( $value ) ? multidimensionalArrayMap( $func, $value ) : $func( $value ) );
        }
    return $newArr;
   }

    // unpublish hellow world
     $hello_world = array();
     $hello_world["ID"] = 1;
     $hello_world["post_status"] = "draft";
     wp_update_post( $hello_world );
      
    
        add_filter('pre_update_option_rt_panacea_wp-template-options', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options',array (
  'template_full_name' => 'Panacea',
  'grid_system' => '12',
  'template_prefix' => 'panacea-',
  'cookie_time' => '31536000',
  'copy_lang_files_if_diff' => '1',
  'backgrounds_list_limit' => '20',
  'blog' => 
  array (
    'cat' => '',
    'type' => 'post',
    'content' => 'content',
    'order' => 'date',
    'page-title' => '',
    'title' => '1',
    'link-title' => '0',
    'meta-author' => '1',
    'meta-date' => '1',
    'meta-modified' => '0',
    'meta-comments' => '0',
    'meta-link-comments' => '1',
    'readmore' => 'Read more ...',
    'query' => '',
  ),
  'page' => 
  array (
    'title' => '1',
    'meta-author' => '0',
    'meta-date' => '0',
    'meta-modified' => '0',
    'meta-comments' => '0',
    'comments-form' => '1',
    'background' => '#EEEEEE',
  ),
  'post' => 
  array (
    'title' => '1',
    'meta-author' => '1',
    'meta-date' => '1',
    'meta-modified' => '1',
    'meta-comments' => '1',
    'tags' => '1',
    'footer' => '1',
    'comments-form' => '1',
  ),
  'category' => 
  array (
    'count' => '5',
    'content' => 'content',
    'custom-page-title' => '',
    'page-title' => '1',
    'title' => '1',
    'link-title' => '0',
    'meta-author' => '1',
    'meta-date' => '1',
    'meta-modified' => '0',
    'meta-comments' => '1',
    'meta-link-comments' => '1',
    'readmore' => 'Read more ...',
  ),
  'archive' => 
  array (
    'count' => '5',
    'content' => 'content',
    'custom-page-title' => '',
    'page-title' => '1',
    'title' => '1',
    'link-title' => '0',
    'meta-author' => '1',
    'meta-date' => '1',
    'meta-modified' => '0',
    'meta-comments' => '1',
    'meta-link-comments' => '1',
    'readmore' => 'Read more ...',
  ),
  'tags' => 
  array (
    'count' => '5',
    'content' => 'content',
    'custom-page-title' => '',
    'page-title' => '1',
    'title' => '1',
    'link-title' => '0',
    'meta-author' => '1',
    'meta-date' => '1',
    'meta-modified' => '0',
    'meta-comments' => '1',
    'meta-link-comments' => '1',
    'readmore' => 'Read more ...',
  ),
  'search' => 
  array (
    'count' => '5',
    'content' => 'content',
    'page-title' => '1',
    'title' => '1',
    'link-title' => '0',
    'meta-author' => '1',
    'meta-date' => '1',
    'meta-modified' => '0',
    'meta-comments' => '1',
    'meta-link-comments' => '1',
    'readmore' => 'Read more ...',
  ),
  'thumbnails-enabled' => '1',
  'static' => 
  array (
    'enabled' => '0',
    'check' => '1',
  ),
  'header' => 
  array (
    'background' => '#FFFFFF',
    'text' => '#666666',
    'overlay' => 'light',
    'link' => '#A70000',
    'layout' => 'a:1:{i:12;a:2:{i:2;a:2:{i:0;i:4;i:1;i:8;}i:6;a:6:{i:0;i:2;i:1;i:2;i:2;i:2;i:3;i:2;i:4;i:2;i:5;i:2;}}}',
    'showall' => '0',
    'showmax' => '6',
  ),
  'body' => 
  array (
    'background' => '#FFFFFF',
    'text' => '#555555',
    'overlay' => 'light',
    'link' => '#A70000',
  ),
  'footer' => 
  array (
    'background' => '#333333',
    'text' => '#999999',
    'overlay' => 'dark',
    'link' => '#ffffff',
  ),
  'module1' => 
  array (
    'background' => '#F1F1F1',
    'border' => '#E3E3E3',
    'text' => '#555555',
    'link' => '#A70000',
  ),
  'module2' => 
  array (
    'background' => '#999999',
    'border' => '#7C7C7C',
    'text' => '#DDDDDD',
    'link' => '#FFFFFF',
  ),
  'module3' => 
  array (
    'background' => '#666666',
    'border' => '#555555',
    'text' => '#DDDDDD',
    'link' => '#FFFFFF',
  ),
  'readonstyle' => 'button',
  'articlestyle' => 'title3',
  'articleoverlay' => 'light',
  'articledetails' => 'layout3',
  'rotator' => 
  array (
    'enabled' => '0',
    'controls' => '1',
    'autoplay' => '0',
    'delay' => '20',
    'interval' => '500',
    'backgrounds' => 'red-oils.jpg,japanase-gate-bw.jpg,japanese-garden-bw.jpg',
  ),
  'headerwidth' => 'full',
  'footerwidth' => 'full',
  'thumb' => 
  array (
    'width' => '101',
    'height' => '69',
    'position' => 'img-right',
  ),
  'webfonts' => 
  array (
    'enabled' => '0',
    'source' => 'google',
  ),
  'font' => 
  array (
    'family' => 'default',
    'size' => 'default',
    'size-is' => 'default',
  ),
  'wordpress-comments' => '1',
  'comments-style' => 'standard',
  'belatedpng-priority' => '8',
  'ie6-priority' => '5',
  'iphonegradients-priority' => '4',
  'iphoneimages-priority' => '6',
  'jstools-priority' => '10',
  'rtl-priority' => '7',
  'childcss-priority' => '100',
  'thumbnails-priority' => '1',
  'webfonts-priority' => '5',
  'pagesuffix' => 
  array (
    'enabled' => '0',
    'class' => '',
    'priority' => '2',
  ),
  'feedlinks' => 
  array (
    'enabled' => '1',
    'priority' => '1',
  ),
  'ie6warn' => 
  array (
    'enabled' => '1',
    'delay' => '2000',
    'priority' => '9',
  ),
  'smartload' => 
  array (
    'enabled' => '0',
    'text' => '50',
    'exclusion' => '',
    'priority' => '11',
  ),
  'title' => 
  array (
    'format' => '',
    'priority' => '5',
  ),
  'typographyshortcodes' => 
  array (
    'enabled' => '1',
    'priority' => '2',
  ),
  'widgetshortcodes' => 
  array (
    'enabled' => '1',
    'priority' => '2',
  ),
  'rokstyle' => 
  array (
    'enabled' => '1',
    'priority' => '5',
  ),
  'analytics' => 
  array (
    'enabled' => '0',
    'code' => '',
    'priority' => '3',
  ),
  'top' => 
  array (
    'layout' => '5,7',
    'showall' => '0',
    'showmax' => '6',
  ),
  'showcase' => 
  array (
    'layout' => '3,3,3,3',
    'showall' => '0',
    'showmax' => '6',
  ),
  'feature' => 
  array (
    'layout' => '3,3,3,3',
    'showall' => '0',
    'showmax' => '6',
  ),
  'utility' => 
  array (
    'layout' => '3,3,3,3',
    'showall' => '0',
    'showmax' => '6',
  ),
  'maintop' => 
  array (
    'layout' => '3,3,3,3',
    'showall' => '0',
    'showmax' => '6',
  ),
  'mainbodyPosition' => 'a:1:{i:12;a:2:{i:1;a:1:{s:2:"mb";i:12;}i:2;a:2:{s:2:"mb";i:8;s:2:"sa";i:4;}}}',
  'mainbottom' => 
  array (
    'layout' => '3,3,3,3',
    'showall' => '0',
    'showmax' => '6',
  ),
  'bottom' => 
  array (
    'layout' => '3,3,3,3',
    'showall' => '0',
    'showmax' => '6',
  ),
  'footer-position' => 
  array (
    'layout' => 'a:1:{i:12;a:2:{i:3;a:3:{i:0;i:3;i:1;i:3;i:2;i:6;}i:6;a:6:{i:0;i:2;i:1;i:2;i:2;i:2;i:3;i:2;i:4;i:2;i:5;i:2;}}}',
    'showall' => '0',
    'showmax' => '6',
  ),
  'iphone-enabled' => '1',
  'iphone-scalable' => '0',
  'iphoneimages' => 
  array (
    'enabled' => '1',
    'minWidth' => '80',
    'percentage' => '25',
  ),
  'mobile' => 
  array (
    'drawer' => 'drawer',
    'top' => 'top-a',
    'header' => 'header-a',
    'navigation' => 'mobile-navigation',
    'showcase' => 'mobile-showcase',
    'footer-position' => 'footer-a',
    'copyright' => 'copyright',
  ),
  'cache' => 
  array (
    'enabled' => '0',
    'time' => '900',
  ),
  'gzipper' => 
  array (
    'enabled' => '0',
    'time' => '600',
    'expirestime' => '1440',
    'stripwhitespace' => '1',
  ),
  'inputstyling' => 
  array (
    'enabled' => '1',
    'exclusions' => '\'.content_vote,#rt-popup\'',
  ),
  'demostyles-enabled' => '1',
  'component-enabled' => '1',
  'rtl-enabled' => '1',
  'buildspans-enabled' => '1',
  'autoparagraphs' => 
  array (
    'enabled' => '1',
    'type' => 'both',
    'priority' => '5',
  ),
  'texturize-enabled' => '0',
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-4', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-4',array (
  'texturize-enabled' => '1',
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-4', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-6', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-6',array (
  'rotator' => 
  array (
    'enabled' => '1',
    'controls' => '1',
    'autoplay' => '1',
    'delay' => '20',
    'interval' => '500',
    'backgrounds' => 'red-oils.jpg,japanase-gate-bw.jpg,japanese-garden-bw.jpg',
  ),
  'mainbodyPosition' => 'a:1:{i:12;a:1:{i:2;a:2:{s:2:"mb";i:7;s:2:"sa";i:5;}}}',
  'mainbottom' => 
  array (
    'layout' => 'a:1:{i:12;a:3:{i:4;a:4:{i:0;i:3;i:1;i:3;i:2;i:3;i:3;i:3;}i:6;a:6:{i:0;i:2;i:1;i:2;i:2;i:2;i:3;i:2;i:4;i:2;i:5;i:2;}i:2;a:2:{i:0;i:7;i:1;i:5;}}}',
    'showall' => '0',
    'showmax' => '6',
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-6', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-2', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-assignments-2',array (
  'templatepage' => 
  array (
    'page' => true,
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-2', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-3', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-assignments-3',array (
  'post_type' => 
  array (
    'page' => 
    array (
      0 => 218,
    ),
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-3', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-4', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-assignments-4',array (
  'post_type' => 
  array (
    'page' => 
    array (
      0 => 326,
      1 => 328,
      2 => 362,
    ),
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-4', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-5', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-assignments-5',array (
  'post_type' => 
  array (
    'page' => 
    array (
      0 => 257,
    ),
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-5', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-6', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-assignments-6',array (
  'templatepage' => 
  array (
    'home' => true,
    'front_page' => true,
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-assignments-6', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-sidebar-2', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-sidebar-2',array (
  'breadcrumb' => 
  array (
    0 => 'gantry_breakcrumbs-20002',
  ),
  'wp_inactive_widgets' => 
  array (
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-sidebar-2', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-sidebar-3', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-sidebar-3',array (
  'showcase' => 
  array (
    0 => 'widget-rokstories-30002',
  ),
  'sidebar' => 
  array (
    0 => 'gantry_menu-30502',
    1 => 'gantry_loginform-30502',
  ),
  'wp_inactive_widgets' => 
  array (
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-sidebar-3', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-sidebar-5', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-sidebar-5',array (
  'top' => 
  array (
    0 => 'text-50068',
    1 => 'gantrydivider-50534',
    2 => 'text-50069',
    3 => 'gantrydivider-50538',
    4 => 'text-50070',
    5 => 'gantrydivider-50536',
    6 => 'text-50071',
    7 => 'gantrydivider-50537',
    8 => 'text-50072',
    9 => 'gantrydivider-50535',
    10 => 'text-50073',
  ),
  'header' => 
  array (
    0 => 'gantry_logo-50502',
    1 => 'text-50074',
    2 => 'gantrydivider-50502',
    3 => 'gantry_menu-50503',
    4 => 'text-50075',
  ),
  'rotator' => 
  array (
    0 => 'gantry_rotator-50003',
  ),
  'showcase' => 
  array (
    0 => 'text-50076',
    1 => 'gantrydivider-50508',
    2 => 'text-50077',
    3 => 'gantrydivider-50509',
    4 => 'text-50078',
  ),
  'utility' => 
  array (
    0 => 'text-50083',
    1 => 'gantrydivider-50514',
    2 => 'text-50084',
    3 => 'gantrydivider-50517',
    4 => 'text-50085',
    5 => 'gantrydivider-50513',
    6 => 'text-50086',
    7 => 'gantrydivider-50515',
    8 => 'text-50087',
    9 => 'gantrydivider-50516',
    10 => 'text-50088',
  ),
  'feature' => 
  array (
    0 => 'text-50079',
    1 => 'gantrydivider-50510',
    2 => 'text-50080',
    3 => 'gantrydivider-50511',
    4 => 'text-50081',
    5 => 'gantrydivider-50512',
    6 => 'text-50082',
  ),
  'maintop' => 
  array (
    0 => 'text-50089',
    1 => 'gantrydivider-50518',
    2 => 'text-50090',
    3 => 'gantrydivider-50520',
    4 => 'text-50091',
    5 => 'gantrydivider-50519',
    6 => 'text-50092',
  ),
  'sidebar' => 
  array (
    0 => 'text-50114',
    1 => 'text-50115',
    2 => 'text-50116',
    3 => 'text-50117',
    4 => 'gantrydivider-50539',
    5 => 'text-50110',
    6 => 'text-50111',
    7 => 'text-50112',
    8 => 'text-50113',
  ),
  'content-top' => 
  array (
    0 => 'text-50093',
    1 => 'gantrydivider-50521',
    2 => 'text-50094',
  ),
  'content-bottom' => 
  array (
    0 => 'text-50095',
    1 => 'gantrydivider-50522',
    2 => 'text-50096',
  ),
  'mainbottom' => 
  array (
    0 => 'text-50097',
    1 => 'gantrydivider-50523',
    2 => 'text-50098',
    3 => 'gantrydivider-50525',
    4 => 'text-50099',
    5 => 'gantrydivider-50524',
    6 => 'text-50100',
  ),
  'bottom' => 
  array (
    0 => 'text-50101',
    1 => 'gantrydivider-50526',
    2 => 'text-50102',
    3 => 'gantrydivider-50527',
    4 => 'text-50103',
    5 => 'gantrydivider-50528',
    6 => 'text-50104',
  ),
  'footer-position' => 
  array (
    0 => 'text-50105',
    1 => 'gantrydivider-50529',
    2 => 'text-50106',
    3 => 'gantrydivider-50530',
    4 => 'text-50107',
    5 => 'gantrydivider-50531',
    6 => 'text-50108',
  ),
  'copyright' => 
  array (
    0 => 'gantry_viewswitcher-50502',
    1 => 'gantry_branding-50502',
    2 => 'text-50109',
  ),
  'wp_inactive_widgets' => 
  array (
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-sidebar-5', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-sidebar-6', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-sidebar-6',array (
  'rotator' => 
  array (
    0 => 'gantry_rotator-60003',
  ),
  'feature' => 
  array (
    0 => 'text-110068',
    1 => 'gantrydivider-60006',
    2 => 'text-110069',
    3 => 'gantrydivider-60005',
    4 => 'text-110070',
  ),
  'sidebar' => 
  array (
    0 => 'gantry_loginform-60003',
    1 => 'text-110071',
  ),
  'mainbottom' => 
  array (
    0 => 'widget-roktabs-60002',
    1 => 'gantrydivider-60007',
    2 => 'text-110072',
  ),
  'wp_inactive_widgets' => 
  array (
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-sidebar-6', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-widgets-2', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-widgets-2',array (
  'widget_pages' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_calendar' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_archives' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_links' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_meta' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_search' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_text' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_categories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_recent-posts' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_recent-comments' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_rss' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_tag_cloud' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_nav_menu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_rokajaxsearch' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_roknewspager' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_widget-rokstories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_widget-roktabs' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_branding' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_breakcrumbs' => 
  array (
    2 => 
    array (
    ),
    20002 => 
    array (
      'widgetstyle' => '',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_copyright' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_links' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_loginbutton' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_loginform' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_resetsettings' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_totop' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_viewswitcher' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_archives' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_categories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_date' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantrydivider' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_fontsizer' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_meta' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_overrides_map' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_pages' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_recentcomments' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_recentposts' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_logo' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_iphonemenu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_menu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-widgets-2', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-widgets-3', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-widgets-3',array (
  'widget_pages' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_calendar' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_archives' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_links' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_meta' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_search' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_text' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_categories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_recent-posts' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_recent-comments' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_rss' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_tag_cloud' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_nav_menu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_rokajaxsearch' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_roknewspager' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_widget-rokstories' => 
  array (
    2 => 
    array (
    ),
    30002 => 
    array (
      'title' => 'RokStories Sample',
      'layout_type' => 'layout1',
      'category' => 'plugins',
      'article_type' => 'post',
      'article_content' => 'content',
      'article_count' => '3',
      'itemsOrdering' => 'date',
      'strip_tags' => 'a,i,br',
      'content_position' => 'right',
      'show_article_title' => '1',
      'show_created_date' => '1',
      'show_author' => '0',
      'show_article' => '1',
      'show_article_link' => '1',
      'legacy_readmore' => '0',
      'readmore_label' => 'Read the Full Story',
      'catch_first_image' => '0',
      'img_width' => '300',
      'img_height' => '200',
      'thumb_width' => '90',
      'thumb_height' => '60',
      'thumb_generator' => 'default',
      'start_width' => 'auto',
      'start_element' => '0',
      'thumbs_opacity' => '0.3',
      'fixed_height' => '0',
      'mouse_type' => 'click',
      'autoplay' => '0',
      'autoplay_delay' => '5000',
      'show_label_article_title' => '1',
      'show_arrows' => '1',
      'show_circles' => '1',
      'arrows_placement' => 'inside',
      'show_thumbs' => '0',
      'fixed_thumb' => '1',
      'link_titles' => '0',
      'link_labels' => '0',
      'link_images' => '0',
      'show_mask' => '1',
      'mask_desc_dir' => 'topdown',
      'mask_imgs_dir' => 'bottomup',
      'scrollerDuration' => '1000',
      'scrollerTransition' => 'Expo.easeInOut',
      'show_controls' => '1',
      'left_offset_x' => '-40',
      'left_offset_y' => '-100',
      'right_offset_x' => '-30',
      'right_offset_y' => '-100',
      'left_f_offset_x' => '-40',
      'left_f_offset_y' => '-100',
      'right_f_offset_x' => '-30',
      'right_f_offset_y' => '-100',
      'widgetstyle' => '',
      'variation' => 'title3',
    ),
    '_multiwidget' => 1,
  ),
  'widget_widget-roktabs' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_branding' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_breakcrumbs' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_copyright' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_links' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_loginbutton' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_loginform' => 
  array (
    2 => 
    array (
    ),
    30502 => 
    array (
      'title' => 'Login',
      'user_greeting' => 'Hi,',
      'widgetstyle' => '',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_resetsettings' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_totop' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_viewswitcher' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_archives' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_categories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_date' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantrydivider' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_fontsizer' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_meta' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_overrides_map' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_pages' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_recentcomments' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_recentposts' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_logo' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_rotator' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_iphonemenu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_menu' => 
  array (
    2 => 
    array (
    ),
    30502 => 
    array (
      'title' => 'Main Menu',
      'nav_menu' => 'main-menu',
      'theme' => 'panacea_splitmenu',
      'limit_levels' => '1',
      'startLevel' => '0',
      'endLevel' => '1',
      'showAllChildren' => '0',
      'show_empty_menu' => '0',
      'maxdepth' => '10',
      'fusion_load_css' => '0',
      'fusion_enable_js' => '1',
      'fusion_opacity' => '1',
      'fusion_effect' => 'slidefade',
      'fusion_hidedelay' => '500',
      'fusion_menu_animation' => 'Sine.easeOut',
      'fusion_menu_duration' => '200',
      'fusion_pill' => '0',
      'fusion_pill_animation' => 'Back.easeOut',
      'fusion_pill_duration' => '400',
      'fusion_centeredOffset' => '0',
      'fusion_tweakInitial_x' => '0',
      'fusion_tweakInitial_y' => '0',
      'fusion_tweakSubsequent_x' => '2',
      'fusion_tweakSubsequent_y' => '-12',
      'fusion_enable_current_id' => '0',
      'menu_suffix' => '',
      'widgetstyle' => '',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-widgets-3', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-widgets-5', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-widgets-5',array (
  'widget_pages' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_calendar' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_archives' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_links' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_meta' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_search' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_text' => 
  array (
    2 => 
    array (
    ),
    50068 => 
    array (
      'title' => 'Top',
      'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50069 => 
    array (
      'title' => 'Top',
      'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50070 => 
    array (
      'title' => 'Top',
      'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50071 => 
    array (
      'title' => 'Top',
      'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50072 => 
    array (
      'title' => 'Top',
      'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50073 => 
    array (
      'title' => 'Top',
      'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50074 => 
    array (
      'title' => 'Header',
      'text' => '<p>The <a href="javascript:void(0);">Header</a> position, <em>using</em> its <strong>default</strong> widget styling; where the logo is assigned by default.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p><div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50075 => 
    array (
      'title' => 'Header',
      'text' => '<p>The <a href="javascript:void(0);">Header</a> position, <em>using</em> its <strong>default</strong> widget styling. The main horizontal menu, whether fusion or splitmenu, is assigned to this position by default in the Gantry administrator.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p><div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50076 => 
    array (
      'title' => 'Showcase',
      'text' => '<p>The <a href="javascript:void(0);">Showcase</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50077 => 
    array (
      'title' => 'Showcase',
      'text' => '<p>The <a href="javascript:void(0);">Showcase</a> position, <em>using</em> <strong>title1</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title1',
    ),
    50078 => 
    array (
      'title' => 'Showcase',
      'text' => '<p>The <a href="javascript:void(0);">Showcase</a> position, <em>using</em> <strong>title2</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title2',
    ),
    50079 => 
    array (
      'title' => 'Feature',
      'text' => '<p>The <a href="javascript:void(0);">Feature</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50080 => 
    array (
      'title' => 'Feature',
      'text' => '<p>The <a href="javascript:void(0);">Feature</a> position, <em>using</em> <strong>title3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title3',
    ),
    50081 => 
    array (
      'title' => 'Feature',
      'text' => '<p>The <a href="javascript:void(0);">Feature</a> position, <em>using</em> <strong>title4</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title4',
    ),
    50082 => 
    array (
      'title' => 'Feature',
      'text' => '<p>The <a href="javascript:void(0);">Feature</a> position, <em>using</em> <strong>title5</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title5',
    ),
    50083 => 
    array (
      'title' => 'Utility',
      'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50084 => 
    array (
      'title' => 'Utility',
      'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50085 => 
    array (
      'title' => 'Utility',
      'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50086 => 
    array (
      'title' => 'Utility',
      'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50087 => 
    array (
      'title' => 'Utility',
      'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50088 => 
    array (
      'title' => 'Utility',
      'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50089 => 
    array (
      'title' => 'MainTop',
      'text' => '<p>The <a href="javascript:void(0);">MainTop</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50090 => 
    array (
      'title' => 'MainTop',
      'text' => '<p>The <a href="javascript:void(0);">MainTop</a> position, <em>using</em> <strong>box1</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box1',
    ),
    50091 => 
    array (
      'title' => 'MainTop',
      'text' => '<p>The <a href="javascript:void(0);">MainTop</a> position, <em>using</em> <strong>box2</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box2',
    ),
    50092 => 
    array (
      'title' => 'MainTop',
      'text' => '<p>The <a href="javascript:void(0);">MainTop</a> position, <em>using</em> <strong>box3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box3',
    ),
    50093 => 
    array (
      'title' => 'ContentTop',
      'text' => '<p>The <a href="javascript:void(0);">ContentTop</a> position, <em>using</em> <strong>title3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title3',
    ),
    50094 => 
    array (
      'title' => 'ContentTop',
      'text' => '<p>The <a href="javascript:void(0);">ContentTop</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50095 => 
    array (
      'title' => 'ContentBottom',
      'text' => '<p>The <a href="javascript:void(0);">ContentBottom</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50096 => 
    array (
      'title' => 'ContentBottom',
      'text' => '<p>The <a href="javascript:void(0);">ContentBottom</a> position, <em>using</em> <strong>title4</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title4',
    ),
    50097 => 
    array (
      'title' => 'MainBottom',
      'text' => '<p>The <a href="javascript:void(0);">MainBottom</a> position, <em>using</em> <strong>box3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box3',
    ),
    50098 => 
    array (
      'title' => 'MainBottom',
      'text' => '<p>The <a href="javascript:void(0);">MainBottom</a> position, <em>using</em> <strong>box1</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box1',
    ),
    50099 => 
    array (
      'title' => 'MainBottom',
      'text' => '<p>The <a href="javascript:void(0);">MainBottom</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50100 => 
    array (
      'title' => 'MainBottom',
      'text' => '<p>The <a href="javascript:void(0);">MainBottom</a> position, <em>using</em> <strong>box2</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box2',
    ),
    50101 => 
    array (
      'title' => 'Bottom',
      'text' => '<p>The <a href="javascript:void(0);">Bottom</a> position, <em>using</em> <strong>title1</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title1',
    ),
    50102 => 
    array (
      'title' => 'Bottom',
      'text' => '<p>The <a href="javascript:void(0);">Bottom</a> position, <em>using</em> <strong>title2</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title2',
    ),
    50103 => 
    array (
      'title' => 'Bottom',
      'text' => '<p>The <a href="javascript:void(0);">Bottom</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50104 => 
    array (
      'title' => 'Bottom',
      'text' => '<p>The <a href="javascript:void(0);">Bottom</a> position, <em>using</em> <strong>title3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title3',
    ),
    50105 => 
    array (
      'title' => 'Footer',
      'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50106 => 
    array (
      'title' => 'Footer',
      'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50107 => 
    array (
      'title' => 'Footer',
      'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50108 => 
    array (
      'title' => 'Footer',
      'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50109 => 
    array (
      'title' => 'Copyright Widget Position - Default Styling',
      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at sem ut ipsum vestibulum euismod. Mauris et massa porta leo facilisis feugiat. Suspendisse id neque a sem facilisis blandit. Aliquam sem leo, commodo ut, rutrum auctor, iaculis nec, eros. Aenean massa. Mauris tincidunt. Vivamus consectetur, tortor sit amet dictum sagittis, urna lectus dapibus metus, ut congue ligula odio sed nunc. Suspendisse potenti.</p>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50110 => 
    array (
      'title' => 'Sidebar',
      'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestibulum at <a href="javascript:void(0);">sem ut ipsum</a> vestibulum euismod.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50111 => 
    array (
      'title' => 'Sidebar',
      'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> <strong>box1</strong> widget styling.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestibulum at <a href="javascript:void(0);">sem ut ipsum</a> vestibulum euismod.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box1',
    ),
    50112 => 
    array (
      'title' => 'Sidebar',
      'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> <strong>box2</strong> widget styling.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestibulum at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box2',
    ),
    50113 => 
    array (
      'title' => 'Sidebar',
      'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestibulum at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50114 => 
    array (
      'title' => 'Sidebar',
      'text' => '<p>All <strong>Sidebar</strong> positions can be alternated, such as <strong>Side <em>Main</em> Side Side</strong>.</p>
<p>This is done via a widget manager in the WordPress admin dashboard.</p>

<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => '',
    ),
    50115 => 
    array (
      'title' => 'Sidebar',
      'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> the <strong>title5</strong> widget suffix.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestib at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title5',
    ),
    50116 => 
    array (
      'title' => 'Sidebar',
      'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> the <strong>box2</strong> widget suffix.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestib at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box2',
    ),
    50117 => 
    array (
      'title' => 'Sidebar',
      'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> the <strong>title3</strong> widget suffix.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestib at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'title3',
    ),
    '_multiwidget' => 1,
  ),
  'widget_categories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_recent-posts' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_recent-comments' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_rss' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_tag_cloud' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_nav_menu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_rokajaxsearch' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_roknewspager' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_widget-rokstories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_widget-roktabs' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_branding' => 
  array (
    2 => 
    array (
    ),
    50502 => 
    array (
      'widgetstyle' => '',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_breakcrumbs' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_copyright' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_links' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_loginbutton' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_loginform' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_resetsettings' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_totop' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_viewswitcher' => 
  array (
    2 => 
    array (
    ),
    50502 => 
    array (
      'widgetstyle' => '',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_archives' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_categories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_date' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantrydivider' => 
  array (
    2 => 
    array (
    ),
    50502 => 
    array (
    ),
    50508 => 
    array (
    ),
    50509 => 
    array (
    ),
    50510 => 
    array (
    ),
    50511 => 
    array (
    ),
    50512 => 
    array (
    ),
    50513 => 
    array (
    ),
    50514 => 
    array (
    ),
    50515 => 
    array (
    ),
    50516 => 
    array (
    ),
    50517 => 
    array (
    ),
    50518 => 
    array (
    ),
    50519 => 
    array (
    ),
    50520 => 
    array (
    ),
    50521 => 
    array (
    ),
    50522 => 
    array (
    ),
    50523 => 
    array (
    ),
    50524 => 
    array (
    ),
    50525 => 
    array (
    ),
    50526 => 
    array (
    ),
    50527 => 
    array (
    ),
    50528 => 
    array (
    ),
    50529 => 
    array (
    ),
    50530 => 
    array (
    ),
    50531 => 
    array (
    ),
    50534 => 
    array (
    ),
    50535 => 
    array (
    ),
    50536 => 
    array (
    ),
    50537 => 
    array (
    ),
    50538 => 
    array (
    ),
    50539 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_fontsizer' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_meta' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_overrides_map' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_pages' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_recentcomments' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_recentposts' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_logo' => 
  array (
    2 => 
    array (
    ),
    50502 => 
    array (
      'perstyle' => '1',
      'css' => 'body #rt-logo',
      'widgetstyle' => '',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_rotator' => 
  array (
    2 => 
    array (
    ),
    50003 => 
    array (
      'category' => 'rotator',
      'orderby' => 'date',
      'widgetstyle' => '',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_iphonemenu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_menu' => 
  array (
    2 => 
    array (
    ),
    50503 => 
    array (
      'title' => '',
      'nav_menu' => 'main-menu',
      'theme' => 'panacea_fusion',
      'limit_levels' => '0',
      'startLevel' => '0',
      'endLevel' => '0',
      'showAllChildren' => '1',
      'show_empty_menu' => '0',
      'maxdepth' => '10',
      'fusion_load_css' => '0',
      'fusion_enable_js' => '1',
      'fusion_opacity' => '1',
      'fusion_effect' => 'slidefade',
      'fusion_hidedelay' => '500',
      'fusion_menu_animation' => 'Sine.easeOut',
      'fusion_menu_duration' => '200',
      'fusion_pill' => '0',
      'fusion_pill_animation' => 'Back.easeOut',
      'fusion_pill_duration' => '400',
      'fusion_centeredOffset' => '0',
      'fusion_tweakInitial_x' => '0',
      'fusion_tweakInitial_y' => '0',
      'fusion_tweakSubsequent_x' => '2',
      'fusion_tweakSubsequent_y' => '-12',
      'fusion_enable_current_id' => '0',
      'menu_suffix' => '',
      'widgetstyle' => 'flush',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-widgets-5', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-override-widgets-6', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-override-widgets-6',array (
  'widget_pages' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_calendar' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_archives' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_links' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_meta' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_search' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_text' => 
  array (
    2 => 
    array (
    ),
    110068 => 
    array (
      'title' => 'Background Rotator',
      'text' => '<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/feature1.jpg" alt="image" class="feature-img" height="69" width="101"/>
<p>A Gantry controlled backgorund image and content rotator, for the sub-header area.</p>
<a class="readon" href="#"><span>Learn More</span></a>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box1',
    ),
    110069 => 
    array (
      'title' => 'RokAjaxSearch Widget',
      'text' => '<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/feature2.jpg" alt="image" class="feature-img" height="69" width="101"/>
<p>Ajax powered widget, allowing for interactive search of WordPress pages.</p>
<a class="readon" href="#"><span>Learn More</span></a><div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box1',
    ),
    110070 => 
    array (
      'title' => 'Color Chooser',
      'text' => '<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/feature3.jpg" alt="image" class="feature-img" height="69" width="101"/>
<p>Control all colors, backgrounds and borders with the Gantry based Color Chooser.</p>
<a class="readon" href="#"><span>Learn More</span></a><div class="clear"></div>
',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box1',
    ),
    110071 => 
    array (
      'title' => '',
      'text' => '<div class="content-block">
<div class="number-image">
<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/number-image1.jpg" alt="image" height="63" width="91"/>
<span class="number-image-text">One</span>
</div>
<span class="heading1">Amazingly Adaptable</span>
<p>Featuring the most flexible and configurable layout we\'ve ever created, it has the ability to adapt to scores of layout.</p>
</div>

<div class="content-block">
<div class="number-image">
<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/number-image2.jpg" alt="image" height="63" width="91"/>
<span class="number-image-text">Two</span>
</div>
<span class="heading1">Lean and Clean</span>
<p>A clean and professional design coupled with less overhead, as well as optimized code and images.</p>
</div>

<div class="content-block">
<div class="number-image">
<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/number-image3.jpg" alt="image" height="63" width="91"/>
<span class="number-image-text">Three</span>
</div>
<span class="heading1">Easier Customization</span>
<p>CSS based colors and organized CSS code blocks, along with less images allowing for quicker color.</p>
</div>							<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box1',
    ),
    110072 => 
    array (
      'title' => 'Theme Optimization',
      'text' => '<p>Theme <strong>performance</strong> is a key part of the development process, to ensure that the theme is as <strong>optimized</strong> as possible.</p>

<div class="rt-grid-2">
	<ul class="bullet-check">
		<li>Valid XHTML</li>
		<li>Valid CSS 3</li>
		<li>Low Image Count</li>
	</ul>
</div>
<div class="rt-grid-2">
	<ul class="bullet-check">
		<li>Compressed CSS</li>
		<li>Optimized Images</li>
		<li>Inbuilt Caching</li>
	</ul>
</div>
<div class="clear"></div>

<a class="readon" href="#"><span>Learn More</span></a>
<div class="clear"></div>',
      'filter' => false,
      'widgetstyle' => '',
      'variation' => 'box1',
    ),
    '_multiwidget' => 1,
  ),
  'widget_categories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_recent-posts' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_recent-comments' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_rss' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_tag_cloud' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_nav_menu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_rokajaxsearch' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_roknewspager' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_widget-rokstories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_widget-roktabs' => 
  array (
    2 => 
    array (
    ),
    60002 => 
    array (
      'title' => '',
      'roktabs_width' => '540',
      'roktabs_tabs_count' => '4',
      'roktabs_cat' => 'roktabs',
      'roktabs_content' => 'content',
      'roktabs_order' => 'date',
      'roktabs_pos' => 'top',
      'roktabs_duration' => '600',
      'roktabs_transition_type' => 'scrolling',
      'roktabs_link_margin' => '1',
      'roktabs_autoplay' => '0',
      'roktabs_autoplay_delay' => '2000',
      'roktabs_effect' => 'Quad.easeInOut',
      'roktabs_mouse' => 'click',
      'roktabs_show_icon' => '0',
      'roktabs_icon_side' => 'left',
      'widgetstyle' => 'flush',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_branding' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_breakcrumbs' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_copyright' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_links' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_loginbutton' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_loginform' => 
  array (
    2 => 
    array (
    ),
    60003 => 
    array (
      'title' => 'Login',
      'user_greeting' => 'Hi,',
      'widgetstyle' => '',
      'variation' => 'box2',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_resetsettings' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_totop' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_viewswitcher' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_archives' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_categories' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_date' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantrydivider' => 
  array (
    2 => 
    array (
    ),
    60005 => 
    array (
    ),
    60006 => 
    array (
    ),
    60007 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_fontsizer' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_meta' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_overrides_map' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_pages' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_recentcomments' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_recentposts' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_logo' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_rotator' => 
  array (
    2 => 
    array (
    ),
    60003 => 
    array (
      'category' => 'rotator',
      'orderby' => 'date',
      'widgetstyle' => '',
      'variation' => '',
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_iphonemenu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
  'widget_gantry_menu' => 
  array (
    2 => 
    array (
    ),
    '_multiwidget' => 1,
  ),
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-override-widgets-6', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rt_panacea_wp-template-options-overrides', 'filter_token_url', 10, 2);

        update_option('rt_panacea_wp-template-options-overrides',array (
  2 => 'Breadcrumbs',
  3 => 'Plugins',
  4 => 'Disable Texturize',
  5 => 'Widget Variations',
  6 => 'Front Page',
));

        remove_filter('pre_update_option_rt_panacea_wp-template-options-overrides', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rokajaxsearch_options', 'filter_token_url', 10, 2);

        update_option('rokajaxsearch_options',array (
  'theme' => 'light',
  'load_custom_css' => '1',
  'google_api' => '',
  'show_description' => '1',
  'show_readmore' => '1',
  'read_more' => 'Read More ...',
  'hide_divs' => '',
  'display_content' => 'excerpt',
  'order' => 'date',
  'per_page' => '3',
  'limit' => '10',
  'google_web' => '1',
  'google_blog' => '1',
  'google_images' => '1',
  'google_video' => '1',
  'image_size' => 'MEDIUM',
  'safesearch' => 'MODERATE',
  'pagination' => '1',
  'show_category' => '1',
  'show_estimated' => '1',
  'include_link' => '1',
));

        remove_filter('pre_update_option_rokajaxsearch_options', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rokbox_options', 'filter_token_url', 10, 2);

        update_option('rokbox_options',array (
  'thumb_system' => 'default',
  'theme' => 'light',
  'custom_theme' => 'sample',
  'custom_settings' => '0',
  'width' => '640',
  'height' => '460',
  'transition' => 'Quad.easeOut',
  'duration' => '200',
  'chase' => '40',
  'effect' => 'quicksilver',
  'frame-border' => '20',
  'content-padding' => '0',
  'arrows-height' => '35',
  'captions' => '1',
  'captionsDelay' => '800',
  'scrolling' => '0',
  'keyEvents' => '1',
  'overlay_background' => '#000000',
  'overlay_opacity' => '0.85',
  'overlay_duration' => '200',
  'overlay_transition' => 'Quad.easeInOut',
  'autoplay' => 'true',
  'ytautoplay' => '0',
  'ythighquality' => '0',
  'controller' => 'true',
  'bgcolor' => '#f3f3f3',
  'vimeoColor' => '00adef',
  'vimeoPortrait' => '0',
  'vimeoTitle' => '0',
  'vimeoFullScreen' => '1',
  'vimeoByline' => '0',
));

        remove_filter('pre_update_option_rokbox_options', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_rokmenu_menu_items', 'filter_token_url', 10, 2);

        update_option('rokmenu_menu_items',array (
  0 => 
  array (
    152 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    153 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    154 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    155 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    156 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    157 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    158 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    159 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    160 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    161 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    162 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    163 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    164 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    165 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    166 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    167 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    168 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    169 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    170 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    171 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    172 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    173 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    174 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    175 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    176 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    177 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    178 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    179 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    180 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    181 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    182 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    183 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    184 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    185 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    186 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    187 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    188 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    189 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
    190 => 
    array (
      'gantrymenu_subtext' => NULL,
      'gantrymenu_icon' => NULL,
    ),
  ),
  22 => 
  array (
    174 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    175 => 
    array (
      'gantrymenu_subtext' => 'Subtext Test',
      'gantrymenu_icon' => '/rt/reaction/wp-content/themes/wp_reaction/images/icons/icon-check.png',
    ),
    176 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    177 => 
    array (
      'gantrymenu_subtext' => 'Blah',
      'gantrymenu_icon' => '/rt/reaction/wp-content/themes/wp_reaction/images/icons/icon-crank.png',
    ),
    178 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    179 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    180 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    181 => 
    array (
      'gantrymenu_subtext' => 'Something',
      'gantrymenu_icon' => '/rt/reaction/wp-content/themes/wp_reaction/images/icons/icon-key2.png',
    ),
    182 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    183 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    184 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    185 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    186 => 
    array (
      'gantrymenu_subtext' => 'Oh really?',
      'gantrymenu_icon' => '/rt/reaction/wp-content/themes/wp_reaction/images/icons/icon-docs.png',
    ),
    187 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    189 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    188 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
    190 => 
    array (
      'gantrymenu_subtext' => '',
      'gantrymenu_icon' => '',
    ),
  ),
));

        remove_filter('pre_update_option_rokmenu_menu_items', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_roknewspager_options', 'filter_token_url', 10, 2);

        update_option('roknewspager_options',array (
  'theme' => 'light',
  'thumb_generator' => 'default',
  'load_custom_css' => '0',
));

        remove_filter('pre_update_option_roknewspager_options', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_roktabs_options', 'filter_token_url', 10, 2);

        update_option('roktabs_options',array (
  'theme' => 'custom',
  'icons_path' => '__plugin__/icons',
));

        remove_filter('pre_update_option_roktabs_options', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_rokajaxsearch', 'filter_token_url', 10, 2);

        update_option('widget_rokajaxsearch',array (
  2 => 
  array (
    'title' => '',
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  '_multiwidget' => 1,
));

        remove_filter('pre_update_option_widget_rokajaxsearch', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_roknewspager', 'filter_token_url', 10, 2);

        update_option('widget_roknewspager',array (
  2 => 
  array (
  ),
  '_multiwidget' => 1,
));

        remove_filter('pre_update_option_widget_roknewspager', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_rokstories_globals', 'filter_token_url', 10, 2);

        update_option('widget_rokstories_globals',array (
  'load_css' => '1',
));

        remove_filter('pre_update_option_widget_rokstories_globals', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_sidebars_widgets', 'filter_token_url', 10, 2);

        update_option('sidebars_widgets',array (
  'wp_inactive_widgets' => 
  array (
  ),
  'drawer' => 
  array (
  ),
  'top' => 
  array (
  ),
  'header' => 
  array (
    0 => 'gantry_logo-2',
    1 => 'gantrydivider-2',
    2 => 'gantry_menu-3',
  ),
  'rotator' => 
  array (
  ),
  'navigation' => 
  array (
  ),
  'showcase' => 
  array (
  ),
  'utility' => 
  array (
    0 => 'rokajaxsearch-2',
  ),
  'feature' => 
  array (
  ),
  'maintop' => 
  array (
  ),
  'breadcrumb' => 
  array (
  ),
  'sidebar' => 
  array (
    0 => 'gantry_menu-2',
    1 => 'gantry_loginform-2',
    2 => 'gantry_categories-2',
    3 => 'tag_cloud-2',
  ),
  'content-top' => 
  array (
  ),
  'content-bottom' => 
  array (
  ),
  'mainbottom' => 
  array (
  ),
  'bottom' => 
  array (
  ),
  'footer-position' => 
  array (
    0 => 'text-50065',
    1 => 'gantrydivider-4',
    2 => 'text-50067',
    3 => 'gantrydivider-3',
    4 => 'text-50066',
  ),
  'copyright' => 
  array (
    0 => 'gantry_viewswitcher-2',
    1 => 'gantry_branding-2',
  ),
  'mobile-drawer' => 
  array (
  ),
  'mobile-top' => 
  array (
  ),
  'mobile-header' => 
  array (
  ),
  'mobile-navigation' => 
  array (
    0 => 'gantry_iphonemenu-3',
  ),
  'mobile-showcase' => 
  array (
  ),
  'mobile-footer' => 
  array (
  ),
  'mobile-copyright' => 
  array (
  ),
  'analytics' => 
  array (
  ),
  'debug' => 
  array (
  ),
  'popup' => 
  array (
  ),
  'array_version' => 3,
));

        remove_filter('pre_update_option_sidebars_widgets', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_posts_per_page', 'filter_token_url', 10, 2);

        update_option('posts_per_page','2');

        remove_filter('pre_update_option_posts_per_page', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_active_plugins', 'filter_token_url', 10, 2);

        update_option('active_plugins',array (
  0 => 'gantry/gantry.php',
  1 => 'wp_rokajaxsearch/rokajaxsearch.php',
  2 => 'wp_rokbox/rokbox.php',
  3 => 'wp_roknewspager/roknewspager.php',
  4 => 'wp_rokstories/rokstories.php',
  5 => 'wp_roktabs/roktabs.php',
));

        remove_filter('pre_update_option_active_plugins', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_gantry_logo', 'filter_token_url', 10, 2);

        update_option('widget_gantry_logo',array (
  2 => 
  array (
    'perstyle' => '1',
    'css' => 'body #rt-logo',
    'widgetstyle' => '',
    'variation' => '',
  ),
  '_multiwidget' => 1,
  50502 => 
  array (
    'perstyle' => '1',
    'css' => 'body #rt-logo',
    'widgetstyle' => '',
    'variation' => '',
  ),
));

        remove_filter('pre_update_option_widget_gantry_logo', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_gantrydivider', 'filter_token_url', 10, 2);

        update_option('widget_gantrydivider',array (
  2 => 
  array (
  ),
  3 => 
  array (
  ),
  4 => 
  array (
  ),
  '_multiwidget' => 1,
  50502 => 
  array (
  ),
  50508 => 
  array (
  ),
  50509 => 
  array (
  ),
  50510 => 
  array (
  ),
  50511 => 
  array (
  ),
  50512 => 
  array (
  ),
  50513 => 
  array (
  ),
  50514 => 
  array (
  ),
  50515 => 
  array (
  ),
  50516 => 
  array (
  ),
  50517 => 
  array (
  ),
  50518 => 
  array (
  ),
  50519 => 
  array (
  ),
  50520 => 
  array (
  ),
  50521 => 
  array (
  ),
  50522 => 
  array (
  ),
  50523 => 
  array (
  ),
  50524 => 
  array (
  ),
  50525 => 
  array (
  ),
  50526 => 
  array (
  ),
  50527 => 
  array (
  ),
  50528 => 
  array (
  ),
  50529 => 
  array (
  ),
  50530 => 
  array (
  ),
  50531 => 
  array (
  ),
  50534 => 
  array (
  ),
  50535 => 
  array (
  ),
  50536 => 
  array (
  ),
  50537 => 
  array (
  ),
  50538 => 
  array (
  ),
  50539 => 
  array (
  ),
  60005 => 
  array (
  ),
  60006 => 
  array (
  ),
  60007 => 
  array (
  ),
));

        remove_filter('pre_update_option_widget_gantrydivider', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_gantry_menu', 'filter_token_url', 10, 2);

        update_option('widget_gantry_menu',array (
  2 => 
  array (
    'title' => 'Main Menu',
    'nav_menu' => 'main-menu',
    'theme' => 'panacea_splitmenu',
    'limit_levels' => '1',
    'startLevel' => '0',
    'endLevel' => '1',
    'showAllChildren' => '0',
    'show_empty_menu' => '0',
    'maxdepth' => '10',
    'fusion_load_css' => '0',
    'fusion_enable_js' => '1',
    'fusion_opacity' => '1',
    'fusion_effect' => 'slidefade',
    'fusion_hidedelay' => '500',
    'fusion_menu_animation' => 'Sine.easeOut',
    'fusion_menu_duration' => '200',
    'fusion_pill' => '0',
    'fusion_pill_animation' => 'Back.easeOut',
    'fusion_pill_duration' => '400',
    'fusion_centeredOffset' => '0',
    'fusion_tweakInitial_x' => '0',
    'fusion_tweakInitial_y' => '0',
    'fusion_tweakSubsequent_x' => '2',
    'fusion_tweakSubsequent_y' => '-12',
    'fusion_enable_current_id' => '0',
    'menu_suffix' => '',
    'widgetstyle' => '',
    'variation' => '',
  ),
  3 => 
  array (
    'title' => '',
    'nav_menu' => 'main-menu',
    'theme' => 'panacea_fusion',
    'limit_levels' => '0',
    'startLevel' => '0',
    'endLevel' => '0',
    'showAllChildren' => '1',
    'show_empty_menu' => '0',
    'maxdepth' => '10',
    'fusion_load_css' => '0',
    'fusion_enable_js' => '1',
    'fusion_opacity' => '1',
    'fusion_effect' => 'slidefade',
    'fusion_hidedelay' => '500',
    'fusion_menu_animation' => 'Sine.easeOut',
    'fusion_menu_duration' => '200',
    'fusion_pill' => '0',
    'fusion_pill_animation' => 'Back.easeOut',
    'fusion_pill_duration' => '400',
    'fusion_centeredOffset' => '0',
    'fusion_tweakInitial_x' => '0',
    'fusion_tweakInitial_y' => '0',
    'fusion_tweakSubsequent_x' => '2',
    'fusion_tweakSubsequent_y' => '-12',
    'fusion_enable_current_id' => '0',
    'menu_suffix' => '',
    'widgetstyle' => 'flush',
    'variation' => '',
  ),
  '_multiwidget' => 1,
  30502 => 
  array (
    'title' => 'Main Menu',
    'nav_menu' => 'main-menu',
    'theme' => 'panacea_splitmenu',
    'limit_levels' => '1',
    'startLevel' => '0',
    'endLevel' => '1',
    'showAllChildren' => '0',
    'show_empty_menu' => '0',
    'maxdepth' => '10',
    'fusion_load_css' => '0',
    'fusion_enable_js' => '1',
    'fusion_opacity' => '1',
    'fusion_effect' => 'slidefade',
    'fusion_hidedelay' => '500',
    'fusion_menu_animation' => 'Sine.easeOut',
    'fusion_menu_duration' => '200',
    'fusion_pill' => '0',
    'fusion_pill_animation' => 'Back.easeOut',
    'fusion_pill_duration' => '400',
    'fusion_centeredOffset' => '0',
    'fusion_tweakInitial_x' => '0',
    'fusion_tweakInitial_y' => '0',
    'fusion_tweakSubsequent_x' => '2',
    'fusion_tweakSubsequent_y' => '-12',
    'fusion_enable_current_id' => '0',
    'menu_suffix' => '',
    'widgetstyle' => '',
    'variation' => '',
  ),
  50503 => 
  array (
    'title' => '',
    'nav_menu' => 'main-menu',
    'theme' => 'panacea_fusion',
    'limit_levels' => '0',
    'startLevel' => '0',
    'endLevel' => '0',
    'showAllChildren' => '1',
    'show_empty_menu' => '0',
    'maxdepth' => '10',
    'fusion_load_css' => '0',
    'fusion_enable_js' => '1',
    'fusion_opacity' => '1',
    'fusion_effect' => 'slidefade',
    'fusion_hidedelay' => '500',
    'fusion_menu_animation' => 'Sine.easeOut',
    'fusion_menu_duration' => '200',
    'fusion_pill' => '0',
    'fusion_pill_animation' => 'Back.easeOut',
    'fusion_pill_duration' => '400',
    'fusion_centeredOffset' => '0',
    'fusion_tweakInitial_x' => '0',
    'fusion_tweakInitial_y' => '0',
    'fusion_tweakSubsequent_x' => '2',
    'fusion_tweakSubsequent_y' => '-12',
    'fusion_enable_current_id' => '0',
    'menu_suffix' => '',
    'widgetstyle' => 'flush',
    'variation' => '',
  ),
));

        remove_filter('pre_update_option_widget_gantry_menu', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_rokajaxsearch', 'filter_token_url', 10, 2);

        update_option('widget_rokajaxsearch',array (
  2 => 
  array (
    'title' => '',
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  '_multiwidget' => 1,
));

        remove_filter('pre_update_option_widget_rokajaxsearch', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_gantry_loginform', 'filter_token_url', 10, 2);

        update_option('widget_gantry_loginform',array (
  2 => 
  array (
    'title' => 'Login',
    'user_greeting' => 'Hi,',
    'widgetstyle' => '',
    'variation' => '',
  ),
  '_multiwidget' => 1,
  30502 => 
  array (
    'title' => 'Login',
    'user_greeting' => 'Hi,',
    'widgetstyle' => '',
    'variation' => '',
  ),
  60003 => 
  array (
    'title' => 'Login',
    'user_greeting' => 'Hi,',
    'widgetstyle' => '',
    'variation' => 'box2',
  ),
));

        remove_filter('pre_update_option_widget_gantry_loginform', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_gantry_categories', 'filter_token_url', 10, 2);

        update_option('widget_gantry_categories',array (
  2 => 
  array (
    'title' => 'Categories',
    'dropdown' => '0',
    'orderby' => 'name',
    'menu_class' => 'menu',
    'show_count' => '0',
    'hierarchical' => '1',
    'hide_empty' => '1',
    'exclude' => '',
    'depth' => '0',
    'widgetstyle' => '',
    'variation' => '',
  ),
  '_multiwidget' => 1,
));

        remove_filter('pre_update_option_widget_gantry_categories', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_tag_cloud', 'filter_token_url', 10, 2);

        update_option('widget_tag_cloud',array (
  2 => 
  array (
    'title' => 'Tags',
    'taxonomy' => 'post_tag',
    'widgetstyle' => '',
    'variation' => '',
  ),
  '_multiwidget' => 1,
));

        remove_filter('pre_update_option_widget_tag_cloud', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_text', 'filter_token_url', 10, 2);

        update_option('widget_text',array (
  50061 => 
  array (
    'title' => 'Footer',
    'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50064 => 
  array (
    'title' => 'Footer',
    'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  2 => 
  array (
  ),
  50065 => 
  array (
    'title' => 'Help Center',
    'text' => '<ul class="bullet-2">
<li><a href="#">Frequently Asked Questions</a></li>
<li><a href="#">Written Documentation</a></li>
<li><a href="#">Video Guides &amp; Aids</a></li>
<li><a href="#">Member Support Forum</a></li>
</ul>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'borderright',
  ),
  50066 => 
  array (
    'title' => 'Demo Information',
    'text' => '<p>All demo content is for demostrative <strong>purposes</strong> only, intended to show a representative example of a <strong>live site</strong>. All images and materials are the copyright of their respective owners. Additionally, this demo, in a modified form, is available for download in the <strong>RocketLauncher</strong> format.</p>							<div class="clear"></div>
						',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50067 => 
  array (
    'title' => 'Contact Info',
    'text' => '		                	<p>
Panacea Template LLC
<br/>
173 Cyrian Drive,
<br/>
Houston, TX, 34900, USA
<br/>
<strong>Tel: (555) 555-55555</strong>
</p>							<div class="clear"></div>
						',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'borderright',
  ),
  '_multiwidget' => 1,
  50068 => 
  array (
    'title' => 'Top',
    'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50069 => 
  array (
    'title' => 'Top',
    'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50070 => 
  array (
    'title' => 'Top',
    'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50071 => 
  array (
    'title' => 'Top',
    'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50072 => 
  array (
    'title' => 'Top',
    'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50073 => 
  array (
    'title' => 'Top',
    'text' => '<p>The <a href="javascript:void(0);">Top</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50074 => 
  array (
    'title' => 'Header',
    'text' => '<p>The <a href="javascript:void(0);">Header</a> position, <em>using</em> its <strong>default</strong> widget styling; where the logo is assigned by default.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p><div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50075 => 
  array (
    'title' => 'Header',
    'text' => '<p>The <a href="javascript:void(0);">Header</a> position, <em>using</em> its <strong>default</strong> widget styling. The main horizontal menu, whether fusion or splitmenu, is assigned to this position by default in the Gantry administrator.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p><div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50076 => 
  array (
    'title' => 'Showcase',
    'text' => '<p>The <a href="javascript:void(0);">Showcase</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50077 => 
  array (
    'title' => 'Showcase',
    'text' => '<p>The <a href="javascript:void(0);">Showcase</a> position, <em>using</em> <strong>title1</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title1',
  ),
  50078 => 
  array (
    'title' => 'Showcase',
    'text' => '<p>The <a href="javascript:void(0);">Showcase</a> position, <em>using</em> <strong>title2</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title2',
  ),
  50079 => 
  array (
    'title' => 'Feature',
    'text' => '<p>The <a href="javascript:void(0);">Feature</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50080 => 
  array (
    'title' => 'Feature',
    'text' => '<p>The <a href="javascript:void(0);">Feature</a> position, <em>using</em> <strong>title3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title3',
  ),
  50081 => 
  array (
    'title' => 'Feature',
    'text' => '<p>The <a href="javascript:void(0);">Feature</a> position, <em>using</em> <strong>title4</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title4',
  ),
  50082 => 
  array (
    'title' => 'Feature',
    'text' => '<p>The <a href="javascript:void(0);">Feature</a> position, <em>using</em> <strong>title5</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title5',
  ),
  50083 => 
  array (
    'title' => 'Utility',
    'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50084 => 
  array (
    'title' => 'Utility',
    'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50085 => 
  array (
    'title' => 'Utility',
    'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50086 => 
  array (
    'title' => 'Utility',
    'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50087 => 
  array (
    'title' => 'Utility',
    'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50088 => 
  array (
    'title' => 'Utility',
    'text' => '<p>The <a href="javascript:void(0);">Utility</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50089 => 
  array (
    'title' => 'MainTop',
    'text' => '<p>The <a href="javascript:void(0);">MainTop</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50090 => 
  array (
    'title' => 'MainTop',
    'text' => '<p>The <a href="javascript:void(0);">MainTop</a> position, <em>using</em> <strong>box1</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  50091 => 
  array (
    'title' => 'MainTop',
    'text' => '<p>The <a href="javascript:void(0);">MainTop</a> position, <em>using</em> <strong>box2</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box2',
  ),
  50092 => 
  array (
    'title' => 'MainTop',
    'text' => '<p>The <a href="javascript:void(0);">MainTop</a> position, <em>using</em> <strong>box3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box3',
  ),
  50093 => 
  array (
    'title' => 'ContentTop',
    'text' => '<p>The <a href="javascript:void(0);">ContentTop</a> position, <em>using</em> <strong>title3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title3',
  ),
  50094 => 
  array (
    'title' => 'ContentTop',
    'text' => '<p>The <a href="javascript:void(0);">ContentTop</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50095 => 
  array (
    'title' => 'ContentBottom',
    'text' => '<p>The <a href="javascript:void(0);">ContentBottom</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50096 => 
  array (
    'title' => 'ContentBottom',
    'text' => '<p>The <a href="javascript:void(0);">ContentBottom</a> position, <em>using</em> <strong>title4</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title4',
  ),
  50097 => 
  array (
    'title' => 'MainBottom',
    'text' => '<p>The <a href="javascript:void(0);">MainBottom</a> position, <em>using</em> <strong>box3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box3',
  ),
  50098 => 
  array (
    'title' => 'MainBottom',
    'text' => '<p>The <a href="javascript:void(0);">MainBottom</a> position, <em>using</em> <strong>box1</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  50099 => 
  array (
    'title' => 'MainBottom',
    'text' => '<p>The <a href="javascript:void(0);">MainBottom</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50100 => 
  array (
    'title' => 'MainBottom',
    'text' => '<p>The <a href="javascript:void(0);">MainBottom</a> position, <em>using</em> <strong>box2</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box2',
  ),
  50101 => 
  array (
    'title' => 'Bottom',
    'text' => '<p>The <a href="javascript:void(0);">Bottom</a> position, <em>using</em> <strong>title1</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title1',
  ),
  50102 => 
  array (
    'title' => 'Bottom',
    'text' => '<p>The <a href="javascript:void(0);">Bottom</a> position, <em>using</em> <strong>title2</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title2',
  ),
  50103 => 
  array (
    'title' => 'Bottom',
    'text' => '<p>The <a href="javascript:void(0);">Bottom</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50104 => 
  array (
    'title' => 'Bottom',
    'text' => '<p>The <a href="javascript:void(0);">Bottom</a> position, <em>using</em> <strong>title3</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title3',
  ),
  50105 => 
  array (
    'title' => 'Footer',
    'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50106 => 
  array (
    'title' => 'Footer',
    'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50107 => 
  array (
    'title' => 'Footer',
    'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50108 => 
  array (
    'title' => 'Footer',
    'text' => '<p>The <a href="javascript:void(0);">Footer</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p><a class="readon" href="javascript:void(0);"><span>More</span></a></p>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50109 => 
  array (
    'title' => 'Copyright Widget Position - Default Styling',
    'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at sem ut ipsum vestibulum euismod. Mauris et massa porta leo facilisis feugiat. Suspendisse id neque a sem facilisis blandit. Aliquam sem leo, commodo ut, rutrum auctor, iaculis nec, eros. Aenean massa. Mauris tincidunt. Vivamus consectetur, tortor sit amet dictum sagittis, urna lectus dapibus metus, ut congue ligula odio sed nunc. Suspendisse potenti.</p>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50110 => 
  array (
    'title' => 'Sidebar',
    'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestibulum at <a href="javascript:void(0);">sem ut ipsum</a> vestibulum euismod.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50111 => 
  array (
    'title' => 'Sidebar',
    'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> <strong>box1</strong> widget styling.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestibulum at <a href="javascript:void(0);">sem ut ipsum</a> vestibulum euismod.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  50112 => 
  array (
    'title' => 'Sidebar',
    'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> <strong>box2</strong> widget styling.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestibulum at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box2',
  ),
  50113 => 
  array (
    'title' => 'Sidebar',
    'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> its <strong>default</strong> widget styling.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestibulum at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50114 => 
  array (
    'title' => 'Sidebar',
    'text' => '<p>All <strong>Sidebar</strong> positions can be alternated, such as <strong>Side <em>Main</em> Side Side</strong>.</p>
<p>This is done via a widget manager in the WordPress admin dashboard.</p>

<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => '',
  ),
  50115 => 
  array (
    'title' => 'Sidebar',
    'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> the <strong>title5</strong> widget suffix.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestib at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title5',
  ),
  50116 => 
  array (
    'title' => 'Sidebar',
    'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> the <strong>box2</strong> widget suffix.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestib at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box2',
  ),
  50117 => 
  array (
    'title' => 'Sidebar',
    'text' => '<p>The <a href="javascript:void(0);">Sidebar</a> position, <em>using</em> the <strong>title3</strong> widget suffix.</p>
<p>Lorem ipsum <strong>dolor sit amet</strong>, consectetur <em>adipiscing elit</em>. Vestib at <a href="javascript:void(0);">sem ut ipsum</a>.</p>
<p><a class="readon" href="javascript:void(0);"><span>Read More</span></a></p>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'title3',
  ),
  110068 => 
  array (
    'title' => 'Background Rotator',
    'text' => '<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/feature1.jpg" alt="image" class="feature-img" height="69" width="101"/>
<p>A Gantry controlled backgorund image and content rotator, for the sub-header area.</p>
<a class="readon" href="#"><span>Learn More</span></a>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  110069 => 
  array (
    'title' => 'RokAjaxSearch Widget',
    'text' => '<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/feature2.jpg" alt="image" class="feature-img" height="69" width="101"/>
<p>Ajax powered widget, allowing for interactive search of WordPress pages.</p>
<a class="readon" href="#"><span>Learn More</span></a><div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  110070 => 
  array (
    'title' => 'Color Chooser',
    'text' => '<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/feature3.jpg" alt="image" class="feature-img" height="69" width="101"/>
<p>Control all colors, backgrounds and borders with the Gantry based Color Chooser.</p>
<a class="readon" href="#"><span>Learn More</span></a><div class="clear"></div>
',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  110071 => 
  array (
    'title' => '',
    'text' => '<div class="content-block">
<div class="number-image">
<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/number-image1.jpg" alt="image" height="63" width="91"/>
<span class="number-image-text">One</span>
</div>
<span class="heading1">Amazingly Adaptable</span>
<p>Featuring the most flexible and configurable layout we\'ve ever created, it has the ability to adapt to scores of layout.</p>
</div>

<div class="content-block">
<div class="number-image">
<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/number-image2.jpg" alt="image" height="63" width="91"/>
<span class="number-image-text">Two</span>
</div>
<span class="heading1">Lean and Clean</span>
<p>A clean and professional design coupled with less overhead, as well as optimized code and images.</p>
</div>

<div class="content-block">
<div class="number-image">
<img src="@RT_SITE_URL@/wp-content/rockettheme/rt_panacea_wp/frontpage/number-image3.jpg" alt="image" height="63" width="91"/>
<span class="number-image-text">Three</span>
</div>
<span class="heading1">Easier Customization</span>
<p>CSS based colors and organized CSS code blocks, along with less images allowing for quicker color.</p>
</div>							<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
  110072 => 
  array (
    'title' => 'Theme Optimization',
    'text' => '<p>Theme <strong>performance</strong> is a key part of the development process, to ensure that the theme is as <strong>optimized</strong> as possible.</p>

<div class="rt-grid-2">
	<ul class="bullet-check">
		<li>Valid XHTML</li>
		<li>Valid CSS 3</li>
		<li>Low Image Count</li>
	</ul>
</div>
<div class="rt-grid-2">
	<ul class="bullet-check">
		<li>Compressed CSS</li>
		<li>Optimized Images</li>
		<li>Inbuilt Caching</li>
	</ul>
</div>
<div class="clear"></div>

<a class="readon" href="#"><span>Learn More</span></a>
<div class="clear"></div>',
    'filter' => false,
    'widgetstyle' => '',
    'variation' => 'box1',
  ),
));

        remove_filter('pre_update_option_widget_text', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_gantry_viewswitcher', 'filter_token_url', 10, 2);

        update_option('widget_gantry_viewswitcher',array (
  2 => 
  array (
    'widgetstyle' => '',
    'variation' => '',
  ),
  '_multiwidget' => 1,
  50502 => 
  array (
    'widgetstyle' => '',
    'variation' => '',
  ),
));

        remove_filter('pre_update_option_widget_gantry_viewswitcher', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_gantry_branding', 'filter_token_url', 10, 2);

        update_option('widget_gantry_branding',array (
  2 => 
  array (
    'widgetstyle' => '',
    'variation' => '',
  ),
  '_multiwidget' => 1,
  50502 => 
  array (
    'widgetstyle' => '',
    'variation' => '',
  ),
));

        remove_filter('pre_update_option_widget_gantry_branding', 'filter_token_url', 10, 2);

        add_filter('pre_update_option_widget_gantry_iphonemenu', 'filter_token_url', 10, 2);

        update_option('widget_gantry_iphonemenu',array (
  3 => 
  array (
    'nav_menu' => 'main-menu',
    'theme' => 'panacea_touch',
    'limit_levels' => '0',
    'startLevel' => '0',
    'endLevel' => '0',
    'showAllChildren' => '1',
    'maxdepth' => '10',
    'touchmenu-animation' => 'cube',
    'widgetstyle' => '',
    'variation' => '',
  ),
  '_multiwidget' => 1,
  2 => 
  array (
  ),
));

        remove_filter('pre_update_option_widget_gantry_iphonemenu', 'filter_token_url', 10, 2);

$gantry_menu_items = array();
function rokimport_get_post_from_guid($guid) {
    global $wpdb;
    $guid = replace_token_url($guid);
    $posts = $wpdb->get_results("SELECT ID FROM " . $wpdb->posts . " WHERE guid = '" . $guid . "'");
    return (count($posts) > 0) ? $posts[0]->ID : 0;
}
function rokimport_get_taxonomy($name, $taxonomy) {
    $taxfield = get_term_by( "slug", $name, $taxonomy);
    return $taxfield->term_id;
}
global $wp_version;
if (version_compare($wp_version,"3.0",">=")){
$importing_menu = wp_get_nav_menu_object("main-menu");
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '2',
);

Access the Background Rotator from Admin Dashboard → Panacea Theme → Style. Select the images from the Background Rotator Manager, and configure the widget from the Background Rotator controls. After doing that just place the Gantry Rotator widget in the Rotator widget position and choose your category.

Background Rotator Manager

The Background Rotator Manager is the administrator based control which determines which background images appear in the rotator. Simply go to Admin Dashboard → Panacea Theme → Style → Rotator and select the Manage button to load the Background Rotator Manager. The manager operates as follows:


  Backgrounds Available: This is a list of all background files that are available, they are loaded from the wp-content/themes/rt_panacea_wp/images/showcase-bgs directory.
  Backgrounds Set: This is a list of all the background files that are currently in use, and will appear in the background rotator on the frontend. You set backgrounds by dragging and dropping the file names from the Backgrounds Available list.
  Drop Preview: This is the dashed box above the lists, simply drag and drop a file name into this Drop Here box and the image will be shown in the preview area.
  Save/Cancel: Once you have decided which backgrounds you want, simply click the Save button.




  




  


  


Background Rotator Controls

Other than determining what images to display, you can control various other aspects of the feature, all from the Gantry administrator: Admin Dashboard → Panacea Theme → Style → Rotator


  Enable: Enable or Disable the Rotator feature.
  Controls: Set whether the controls – arrows and placement identifiers – appear at the top of the mainbody or are invisible.
  Autoplay: Choose whether the feature rotates automatically or via manual input.
  Delay: If Autoplay is enabled, set the Delay in seconds.
  Manager: Set which background images load.


',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);

Access the Color Chooser from Admin Dashboard → Panacea Theme → Style. There is no frontend interface for the color chooser options other than the Preset Style URL switches as outlined at the Preset Styles page.

Gantry Settings → Color Chooser

Below are the elements which are directly controlled by the Color Chooser, which allows you to change the colors, whether background, text, border or overlay were applicable, on every section of the site, such as the header, main body and footer.


  


  





  
    Main Background:
    
      Background
    
  



  
    Header:
    
      Background
      Overlay – Light or Dark
      Text Color
      Link Color
    
  
  
    Body:
    
      Background
      Overlay – Light or Dark
      Text Color
      Link Color
    
  
  
    Footer:
    
      Background
      Overlay – Light or Dark
      Text Color
      Link Color
    
  


  
    Widget Box 1 (Widget Variation):
    
      Background
      Border
      Text Color
      Link Color
    
  
  
    Widget Box 2 (Widget Variation):
    
      Background
      Border
      Text Color
      Link Color
    
  
  
    Widget Box 3 (Widget Variation):
    
      Background
      Border
      Text Color
      Link Color
    
  




Gantry Settings → General Style Controls

Theses settings are not directly affiliated with the Color Chooser portion, but affect the theme styling nevertheless.


  Read More Style: Button or Link
  Article Style: Default, Title1-5 and Box1-3
  Article Details Style: Layout1-3
  Backgrounds Rotator: Manage – Control what background images display in the background rotator feature
  Web Fonts: On – Off; Google Font Directory
  Font Settings:
    
      Font Family: Geneva, Optima, Helvetica, Trebuchet, Lucida, Georgia, Palatino, or Various Google Fonts (dropdown)
      Font Size: Default, Extra Large, Large, Small, Extra Small (dropdown)
    
  
',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '2',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-add.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-arrow.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-briefcase.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-calendar.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-check.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-crank.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-delete.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-docs.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-email.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-home.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-key.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-key1.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-minus.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-monitor.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-notes.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-post.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-printer.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-rss.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-key2.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-warning.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'icon-write.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => 'Multi-Column Example',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '2',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => 'Single Column Example',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => 'Single Column Example',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);



The widget allows you to display a large number of news items and links in a small compact area via its paging functionality and includes a multitude of configuration options and parameters to customize how your news is displayed.

Features

Javascript Transitions: using the power of mootools, the module fades between lists of your content posts
Category Control: choose from which category posts should appear
Auto Update: select whether the module auto-updates using AJAX


Configuration
Once activated, the RokNewsPager configuration panel can be found under the link RokNewsPager Settings in the Plugins SubPanel, rest of the settings are configured directly from the widget settings.
This is a breakdown of all the configuration options of RokNewsPager Settings Page:
Preset Themes:  You can select between Light or Dark theme for the widget.
Load Custom CSS:  Determinates if the RokNewsPager should load it’s default css styles.
This is a breakdown of all the configuration options of RokNewsPager Widget Controls:
Posts Category:  You can choose from which category posts should be displayed.
Order:  Sets the order in which posts should be displayed.
Number of Posts Per Page:  Sets the maximum number of posts displayed on current page.
Show Content: Displays or hides the post content (both content and excerpt).
Type of Content:  You can choose which part of post content should be displayed – content or excerpt.
Display Post Title:  Displays post title.
Display Date:  Displays post creation date.
Display Author:  Displays the post author name.
Display Comments:  Displays the number of comments in a post.
Display Thumbnails:  Displays the post thumbnail if ones specified in it’s settings.
Thumbnail Dimensions:  Here you can change the maximum size of each thumbnail image.
Link Thumbnails:  Determinates if thumbnails should link to the post view.
Show ‘More’ Button:  Lets you disable the ‘Read More’ button.
‘More’ Button Label:  Text that will appear as an ‘Read More’ button.
Pagination:  Enables RokNewsPager to paginate the posts.
Preset Themes:  Displays the bottom bar with page numbers.
Max Number of Pages:  Sets maximum number of pages to display in pagination.
Accordion:  Enables the accordion mode in RokNewsPager.
Auto Update:  Enables automatic page changing.
Update Delay:  Sets the amount of time between page change/update.',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);



Configuration
This is a breakdown of all the configuration options of RokStories Widget Options:
Layout:  You can select between couple of RokStories layouts that were used in different themes.
Type of Query:  You can choose whether RokStories should display posts or pages.
Posts Category:  You can choose from which category posts should be displayed.
Max Number of Articles:  Sets maximum number of posts/pages to display in widget.
Order:  Sets the order in which posts should be displayed.
Image Position:  You can choose on which side of the post content image should appear.
Display Article Title:  Displays/hides the post/page title.
Display Article Date:  Displays/hides the post/page creation date.
Display Article Content:  Displays/hides the post/page content.
Type of Content:  You can choose which part of post content should be displayed – content or excerpt.
Display ‘Read More’ Button:  You can choose if articles should display ‘Read More’ links.
Image Dimensions:  Here you can specify dimensions of the main image.
Thumbnail Dimensions:  Here you can specify dimensions of the thumbnails.
RokStories Fixed Height:  Sets the fixed height of the RokStories.
Thumbnail Container Size:  Sets the width of the thumbnails container.
First Article:  You can choose with what article number RokStories should begin.
Thumbs Opacity:  Here you can specify the thumbnail opacity ie. 0.4 or 0.8
Interaction:  Sets the mouse interaction with RokStories – click or mouse over.
Autoplay:  Enables automatic slide changing.
Autoplay Delay:  Sets the amount of time between slide change.
Show Label Title:  Displays/hides the post/page title label.
Show Previews on Arrows:  Displays/hides the thumbnails over next/previous arrows.
Linked Labels:  Here you can choose if the label should link to your article content.
Linked Images:  Here you can choose if the image should link to your article content.
Image Arrows:  Displays/hides the next/previous arrows.
Show Mask:  Displays/hides image mask.
Description Animation:  Sets the description animation for masked content.

[div class=\"attention\" class2=\"typo-icon\"]Some of the options are working only with certain layouts.[/div]',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '2',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);

With Gantry you are able to specify different preset styles(called overrides), of which you can assign to menu items, tags, categories, and taxonomies.

How to create an override:

In the Reaction Gantry settings panel, click on the Add button to create the new override, and then the Edit button to change the name. Please remember to press Enter button in order to finish editing new name.



Now you are able to set new options for your new override, like for example the preset style that you would like to use:



You will also notice in the gantry tab, a 1 has appeared. This is to show you how many overrides have been invoked on that tab.

Now that a gantry setting has been overridden, lets assign it to one of the many different types of Assignments that Gantry has to offer, a Menu Item.

Click on the Assignments tab, and you will see various types of assignments that you can use. Now check the Menu Item Features, and click the button below to Add to Assigned, and you will see it in the Assigned Overrides list.



Click Save Changes, and then navigate to the frontend of the site, and click Features on the main menu, and you will see that the style has changed, to the style number that you specified in the override.

You can also assign widgets to different positions as well using Gantry, which allows you to have unprecedented control over how your Wordpress blog’s design and functionality.

You can also assign widgets to different positions as well using Gantry, which allows you to have unprecedented control over how your Wordpress blog’s design and functionality.

To use this functionality, make sure that your new override is set in the override drop box, and click the widget button at the top of the gantry theme settings panel.



You will then be taken to the widget settings page, where you will notice a change in the widget positions names.



You can override a widget position by checking the tick box next to the widget position, and then either remove the widget(s) or add a widget to the override position.',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
Thanks to the Layouts slider and Gantry Divider Widget you can create stunning theme content without modifying any code.

How to setup layouts ?



If you go to your theme settings → Layout Tab you’ll see a slider that lets you to select the desired column distribution (width) used for that particular widget position. Clicking on numbers above slider (from 1 – 6) gives you a possibility to set different column distribution depending on how many widget columns (1 – 6) you’ll use in that position. After you’ll click Save Button, Gantry will save layout for all possible layouts at the same time. Please don’t be scared by the fact that after saving changes layouts will switch to the 6 widget variant – this is a normal thing, and your settings are still saved.

What is Gantry Divider Widget ?



Gantry Divider is a widget that allows you to set where the widget position should break into another column ie. placing 4 dividers between your other widgets will load the layout that you’ve set in theme settings for that widget position with 4 columns set.



Can I place more than 1 widget between dividers ?

Of course you can! Placing more than one widget before any divider will result in displaying these widgets in rows (one above another).

Do you got a place where I can see the different widgets setup ?

Yes we do. You can go to the demo of the theme, Features → Widget Variations page. If you’d like to see how they’re setup and you got RocketLauncher installed you can go to the Widgets page and switch the override (using dropdown list) to the Widget Variations. This will load widget setup used for that page.',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);


  Fusion Menu – Fusion Menu, an advanced dropdown based CSS menu. It supports both mootools powered transition and animation enhancements for its dropdown.
  SplitMenu – A static menu system that displays submenu items outside of the main horizontal menu, 2nd level beneath the main menu bar (in the navigation position) and the 3rd in the side column.
  Suckerfish – A static menu system that is loaded for the Internet Explorer 6.


Fusion Menu

Fusion is javascript-based dropdown menu system, with extensively functionality. The menu itself is built on the rewritten core of the latest revision of RokNavMenu, the core application behind all RocketTheme menus.

Fusion offers a series of new abilities ranging from Menu Icons, Subtext support and much greater controls over the Multiple Column ability for dropdowns.



Menu Configuration

You can configure Fusion Menu at Widgets and you will find all parameters under the Gantry Menu widget.



Menu Icons

Fusion has support for individual menu icons for its dropdown menu items. These images are loaded from the /wp-content/themes/theme-name/images/icons/ directory where you will find 31 images by default.

To setup a Menu Icon, go to Appearance → Menus → Parameters of Menu Item. Locate the Icon field in Parameters and select an image from the dropdown.

Subtext

Subtext is the term used to describe the secondary text placed underneath the menu title.

To add your own Subtext, go to Appearance → Menus → Parameters of Menu Item. Locate the Subtext field in Parameters and insert your desired text.

Multiple Dropdown Columns

Fusion has the facility for dynamic column control for its dropdown. You can choose between single (1) or double (2) column modes for children of every single menu item via configuration.

To control the number of columns of each menu item, go to Appearance → Menus → Parameters of Menu Item. Locate the Number of Columns in Submenu field in Parameters and choose either 1 or 2.

Dynamic Child Direction

Typically, a dropdown menu column will extend beyond the width of the browser window if you have enough child levels. However, with Fusion, the menu detects the width of the browser and will change the direction of menu pullouts so all menu items are visible without the need to scroll.

SplitMenu

We have implemented the much requested Split Menu System with the Gantry Menu to give you more options on the type of menu display that you would like to use with your RocketTheme Gantry Wordpress theme.
To utilise the Split Menu System, you first need to drag the Gantry Menu widget to the the Header widget position, and set the Start Level, and the End Level values to “1″, and set the Limit Levels to “yes”. Then you will need to set the menu suffix for this menu to top.
Then you need to drag a second instance of the Gantry Menu widget to Second Level Menu widget position and set the Start Level, and change the layout from Fusion to the SplitMenu, and also change the End Level values to “1″, and set the Limit Levels to “yes”.',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);



The widget allows you to display a large number of news items and links in a small compact area via its paging functionality and includes a multitude of configuration options and parameters to customize how your news is displayed.

Adding images to the posts shown in RokNewsPager
To add image to the RokNewsPager post, please go to the post edit mode and in the RokNewsPager Image metabox please type your image url ie. http://your-site.com/wp-content/uploads/2009/09/image.jpg

Features

Javascript Transitions: using the power of mootools, the module fades between lists of your content posts
Category Control: choose from which category posts should appear
Auto Update: select whether the module auto-updates using AJAX


All useful options can be found in the RokNewsPager widget settings.

Configuration
Once activated, the RokNewsPager configuration panel can be found under the link RokNewsPager Settings in the Plugins SubPanel, rest of the settings are configured directly from the widget settings.
This is a breakdown of all the configuration options of RokNewsPager Settings Page:
Preset Themes:  You can select between Light or Dark theme for the widget.
Load Custom CSS:  Determinates if the RokNewsPager should load it’s default css styles.
This is a breakdown of all the configuration options of RokNewsPager Widget Controls:
Posts Category:  You can choose from which category posts should be displayed.
Order:  Sets the order in which posts should be displayed.
Number of Posts Per Page:  Sets the maximum number of posts displayed on current page.
Show Content: Displays or hides the post content (both content and excerpt).
Type of Content:  You can choose which part of post content should be displayed – content or excerpt.
Display Post Title:  Displays post title.
Display Date:  Displays post creation date.
Display Author:  Displays the post author name.
Display Comments:  Displays the number of comments in a post.
Display Thumbnails:  Displays the post thumbnail if ones specified in it’s settings.
Thumbnail Dimensions:  Here you can change the maximum size of each thumbnail image.
Link Thumbnails:  Determinates if thumbnails should link to the post view.
Show ‘More’ Button:  Lets you disable the ‘Read More’ button.
‘More’ Button Label:  Text that will appear as an ‘Read More’ button.
Pagination:  Enables RokNewsPager to paginate the posts.
Preset Themes:  Displays the bottom bar with page numbers.
Max Number of Pages:  Sets maximum number of pages to display in pagination.
Accordion:  Enables the accordion mode in RokNewsPager.
Auto Update:  Enables automatic page changing.
Update Delay:  Sets the amount of time between page change/update.',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);



How To Add Articles To RokStories
Every article that is displayed in RokStories has to be assigned to at least one category that will be later choosen in the RokStories settings.

You can set how many posts to display in that section in the widget settings. If you are writing a new post and you would like it to appear in the RokStories, you just need to assign that post to the category that’s assigned to the RokStories widget and add an image (instruction below).

Adding images to the posts shown in RokStories
To add image to the RokStories post, you have to locate the RokStories Image box under the post editor, and place there link to your image ie. http://your-site.com/image.jpg

Configuration
This is a breakdown of all the configuration options of RokStories Widget Options:
Layout:  You can select between couple of RokStories layouts that were used in different themes.
Type of Query:  You can choose whether RokStories should display posts or pages.
Posts Category:  You can choose from which category posts should be displayed.
Max Number of Articles:  Sets maximum number of posts/pages to display in widget.
Order:  Sets the order in which posts should be displayed.
Image Position:  You can choose on which side of the post content image should appear.
Display Article Title:  Displays/hides the post/page title.
Display Article Date:  Displays/hides the post/page creation date.
Display Article Content:  Displays/hides the post/page content.
Type of Content:  You can choose which part of post content should be displayed – content or excerpt.
Display ‘Read More’ Button:  You can choose if articles should display ‘Read More’ links.
Image Dimensions:  Here you can specify dimensions of the main image.
Thumbnail Dimensions:  Here you can specify dimensions of the thumbnails.
RokStories Fixed Height:  Sets the fixed height of the RokStories.
Thumbnail Container Size:  Sets the width of the thumbnails container.
First Article:  You can choose with what article number RokStories should begin.
Thumbs Opacity:  Here you can specify the thumbnail opacity ie. 0.4 or 0.8
Interaction:  Sets the mouse interaction with RokStories – click or mouse over.
Autoplay:  Enables automatic slide changing.
Autoplay Delay:  Sets the amount of time between slide change.
Show Label Title:  Displays/hides the post/page title label.
Show Previews on Arrows:  Displays/hides the thumbnails over next/previous arrows.
Linked Labels:  Here you can choose if the label should link to your article content.
Linked Images:  Here you can choose if the image should link to your article content.
Image Arrows:  Displays/hides the next/previous arrows.
Show Mask:  Displays/hides image mask.
Description Animation:  Sets the description animation for masked content.

Some of the options are working only with certain layouts.',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '1',
);

View all styles live by appending ?presets=preset# or &#038;presets=preset# to the end of your URL such as http://yoursite.com/index.php?presets=preset4.

Below is a preview / screenshot of each style variation, in sequential order, Preset 1 – Preset 10. Please click on on the image to load a live example of each style variation.

High
Medium
Low




  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  
  
  
    
  
  
    
  
  
    
  


',
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => '',
  'gantrymenu_submenu_cols' => '2',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset1.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset2.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset3.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset4.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset5.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset6.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset7.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset8.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset9.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset10.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset11.png',
  'gantrymenu_submenu_cols' => '1',
);
  'gantrymenu_subtext' => '',
  'gantrymenu_icon' => 'preset12.png',
  'gantrymenu_submenu_cols' => '1',
);