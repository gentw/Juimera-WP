<?php
function register_my_menu() {
    register_nav_menu('top-header-menu',__( 'Top Header Menu' ));
  }
  add_action( 'init', 'register_my_menu' );
// footer widgets
register_sidebar(
        array(
            'id'            => 'footer-widget-4',
            'name'          => esc_html__( 'Footer Widget 4', 'sparkling' ),
            'description'   => esc_html__( 'Used for footer widget area', 'sparkling' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>',
        )
);
register_sidebar(
        array(
            'id'            => 'footer-widget-5',
            'name'          => esc_html__( 'Footer Widget 5', 'sparkling' ),
            'description'   => esc_html__( 'Used for footer widget area', 'sparkling' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>',
        )
);

 // Remove WP Version From Styles   
 add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
 // Remove WP Version From Scripts
 add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
 
 // Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
// allowing span
function override_mce_options($initArray) 
{
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
 }
 add_filter('tiny_mce_before_init', 'override_mce_options'); 
 


// add scripts
function add_scripts() {
    
   


    wp_enqueue_script( 'tab-collapse', get_stylesheet_directory_uri() . '/js/tab-collapse.js' );
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri().'/js/slick.js');
    wp_enqueue_script( 'main-script', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0' );

   

    wp_enqueue_style( 'slick', get_stylesheet_directory_uri().'/css/slick.css' );
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri().'/css/slick-theme.css' );

    wp_localize_script( 'main-script', 'ajax_object',
                array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );





}
add_action( 'wp_enqueue_scripts', 'add_scripts' );

/**
 * Proper way to enqueue scripts and styles
 */
function enqueue_scripts() {
    wp_enqueue_style( 'style-child', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts', PHP_INT_MAX );
 
/*------------------------------------------------- Custom Post type start -------------------------------------------------*/
function jumeira_custom_posttype(){
    //Slider Custom Post type
    $labels = array(
        'name'               => _x( 'Home Slider', 'jumeira-university' ),
        'singular_name'      => _x( 'Home Slider', 'jumeira-university' ),
        'menu_name'          => _x( 'Home Slider', 'jumeira-university' ),
        'name_admin_bar'     => _x( 'Home Slider', 'jumeira-university' ),
        'add_new'            => _x( 'Add New', 'Slide', 'jumeira-university' ),
        'add_new_item'       => __( 'Add New Slide', 'jumeira-university' ),
        'new_item'           => __( 'New Slide', 'jumeira-university' ),
        'edit_item'          => __( 'Edit Slide', 'jumeira-university' ),
        'view_item'          => __( 'View Slide', 'jumeira-university' ),
        'all_items'          => __( 'All Slides', 'jumeira-university' ),
        'search_items'       => __( 'Search Slide', 'jumeira-university' ),
        'parent_item_colon'  => __( 'Parent Slide:', 'jumeira-university' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'jumeira-university' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-images-alt2',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail')
    );
    register_post_type('slider',$args);

    //Colleges & Programs Custom Post type
    $labels = array(
        'name'               => _x( 'Colleges & Programs', 'jumeira-university' ),
        'singular_name'      => _x( 'Colleges & Programs', 'jumeira-university' ),
        'menu_name'          => _x( 'Colleges & Programs', 'jumeira-university' ),
        'name_admin_bar'     => _x( 'Colleges & Programs', 'jumeira-university' ),
        'add_new'            => _x( 'Add New', 'College & Program', 'jumeira-university' ),
        'add_new_item'       => __( 'Add New College & Program', 'jumeira-university' ),
        'new_item'           => __( 'New College & Program', 'jumeira-university' ),
        'edit_item'          => __( 'Edit College & Program', 'jumeira-university' ),
        'view_item'          => __( 'View College & Program', 'jumeira-university' ),
        'all_items'          => __( 'All Colleges & Programs', 'jumeira-university' ),
        'search_items'       => __( 'Search College & Program', 'jumeira-university' ),
        'parent_item_colon'  => __( 'Parent College & Program:', 'jumeira-university' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'jumeira-university' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'college-programs/%college_cat%', 'with_front' => false ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail')
    );
    register_post_type('college-programs',$args);
    
    //Add Taxonomy for Colleges & Programs posttype
    $labels = array(
        'name'                       => _x( 'College Categories', 'jumeira-university' ),
        'singular_name'              => _x( 'College Category', 'jumeira-university' ),
        'search_items'               => __( 'Search Category', 'jumeira-university' ),
        'popular_items'              => __( 'Popular Category', 'jumeira-university' ),
        'all_items'                  => __( 'All Categories', 'jumeira-university' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Category', 'jumeira-university' ),
        'update_item'                => __( 'Update Category', 'jumeira-university' ),
        'add_new_item'               => __( 'Add New Category', 'jumeira-university' ),
        'new_item_name'              => __( 'New Category Name', 'jumeira-university' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas', 'jumeira-university' ),
        'add_or_remove_items'        => __( 'Add or remove Categories', 'jumeira-university' ),
        'choose_from_most_used'      => __( 'Choose from the most used Categories', 'jumeira-university' ),
        'not_found'                  => __( 'No Categories found.', 'jumeira-university' ),
        'menu_name'                  => __( 'Categories', 'jumeira-university' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'college-and-programs', 'with_front' => false ),
    );

    register_taxonomy( 'college_cat', 'college-programs', $args );

    //Testimonial Custom Post type
    $labels = array(
        'name'               => _x( 'Testimonials', 'jumeira-university' ),
        'singular_name'      => _x( 'Testimonial', 'jumeira-university' ),
        'menu_name'          => _x( 'Testimonials', 'jumeira-university' ),
        'name_admin_bar'     => _x( 'Testimonial', 'jumeira-university' ),
        'add_new'            => _x( 'Add New', 'Testimonial', 'jumeira-university' ),
        'add_new_item'       => __( 'Add New Testimonial', 'jumeira-university' ),
        'new_item'           => __( 'New Testimonial', 'jumeira-university' ),
        'edit_item'          => __( 'Edit Testimonial', 'jumeira-university' ),
        'view_item'          => __( 'View Testimonial', 'jumeira-university' ),
        'all_items'          => __( 'All Testimonials', 'jumeira-university' ),
        'search_items'       => __( 'Search Testimonial', 'jumeira-university' ),
        'parent_item_colon'  => __( 'Parent Testimonial:', 'jumeira-university' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'jumeira-university' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-format-chat',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail')
    );
    register_post_type('testimonial',$args);

    //Add Taxonomy for Testimonial posttype
    $labels = array(
        'name'                       => _x( 'Testimonial Categories', 'jumeira-university' ),
        'singular_name'              => _x( 'Testimonial Category', 'jumeira-university' ),
        'search_items'               => __( 'Search Testimonial Category', 'jumeira-university' ),
        'popular_items'              => __( 'Popular Testimonial Category', 'jumeira-university' ),
        'all_items'                  => __( 'All Testimonial Categories', 'jumeira-university' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Testimonial Category', 'jumeira-university' ),
        'update_item'                => __( 'Update Testimonial Category', 'jumeira-university' ),
        'add_new_item'               => __( 'Add New Testimonial Category', 'jumeira-university' ),
        'new_item_name'              => __( 'New Testimonial Category Name', 'jumeira-university' ),
        'separate_items_with_commas' => __( 'Separate Testimonial Categories with commas', 'jumeira-university' ),
        'add_or_remove_items'        => __( 'Add or remove Testimonial Categories', 'jumeira-university' ),
        'choose_from_most_used'      => __( 'Choose from the most used Testimonial Categories', 'jumeira-university' ),
        'not_found'                  => __( 'No Testimonial Categories found.', 'jumeira-university' ),
        'menu_name'                  => __( 'Testimonial Categories', 'jumeira-university' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'testimonial_category' ),
    );

    register_taxonomy( 'testimonial_category', 'testimonial', $args );

    //Banner Navigation Posts Custom Post type
    $labels = array(
        'name'               => _x( 'Banner Posts', 'jumeira-university' ),
        'singular_name'      => _x( 'Banner Post', 'jumeira-university' ),
        'menu_name'          => _x( 'Banner Posts', 'jumeira-university' ),
        'name_admin_bar'     => _x( 'Banner Posts', 'jumeira-university' ),
        'add_new'            => _x( 'Add New', 'Banner Post', 'jumeira-university' ),
        'add_new_item'       => __( 'Add New Banner Post', 'jumeira-university' ),
        'new_item'           => __( 'New Banner Post', 'jumeira-university' ),
        'edit_item'          => __( 'Edit Banner Post', 'jumeira-university' ),
        'view_item'          => __( 'View Banner Post', 'jumeira-university' ),
        'all_items'          => __( 'All Banner Posts', 'jumeira-university' ),
        'search_items'       => __( 'Search Banner Post', 'jumeira-university' ),
        'parent_item_colon'  => __( 'Parent Banner Post:', 'jumeira-university' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'jumeira-university' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-format-aside',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'banner-post' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail')
    );
    register_post_type('banner-post',$args);

    //Add Taxonomy for Banner Posts posttype
    $labels = array(
        'name'                       => _x( 'Banner Post Categories', 'jumeira-university' ),
        'singular_name'              => _x( 'Banner Post Category', 'jumeira-university' ),
        'search_items'               => __( 'Search Banner Post Category', 'jumeira-university' ),
        'popular_items'              => __( 'Popular Banner Post Category', 'jumeira-university' ),
        'all_items'                  => __( 'All Banner Post Categories', 'jumeira-university' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Banner Post Category', 'jumeira-university' ),
        'update_item'                => __( 'Update Banner Post Category', 'jumeira-university' ),
        'add_new_item'               => __( 'Add New Banner Post Category', 'jumeira-university' ),
        'new_item_name'              => __( 'New Banner Post Category Name', 'jumeira-university' ),
        'separate_items_with_commas' => __( 'Separate Banner Post Categories with commas', 'jumeira-university' ),
        'add_or_remove_items'        => __( 'Add or remove Banner Post Categories', 'jumeira-university' ),
        'choose_from_most_used'      => __( 'Choose from the most used Banner Post Categories', 'jumeira-university' ),
        'not_found'                  => __( 'No Banner Post Categories found.', 'jumeira-university' ),
        'menu_name'                  => __( 'Banner Post Categories', 'jumeira-university' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'banner_post_category' ),
    );
    register_taxonomy( 'banner_post_category', 'banner-post', $args );

    //Common Navigation Posts Custom Post type
    $labels = array(
        'name'               => _x( 'Faculty', 'jumeira-university' ),
        'singular_name'      => _x( 'Faculty', 'jumeira-university' ),
        'menu_name'          => _x( 'Faculty', 'jumeira-university' ),
        'name_admin_bar'     => _x( 'Faculty', 'jumeira-university' ),
        'add_new'            => _x( 'Add New', 'Faculty', 'jumeira-university' ),
        'add_new_item'       => __( 'Add New Faculty', 'jumeira-university' ),
        'new_item'           => __( 'New Faculty', 'jumeira-university' ),
        'edit_item'          => __( 'Edit Faculty', 'jumeira-university' ),
        'view_item'          => __( 'View Faculty', 'jumeira-university' ),
        'all_items'          => __( 'All Facultys', 'jumeira-university' ),
        'search_items'       => __( 'Search Faculty', 'jumeira-university' ),
        'parent_item_colon'  => __( 'Parent Faculty:', 'jumeira-university' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'jumeira-university' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-groups',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faculty' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail')
    );
    register_post_type('faculty',$args);

    //Add Taxonomy for Faculty posttype
    $labels = array(
        'name'                       => _x( 'Faculty Category', 'jumeira-university' ),
        'singular_name'              => _x( 'Faculty Category', 'jumeira-university' ),
        'search_items'               => __( 'Search Faculty Category', 'jumeira-university' ),
        'popular_items'              => __( 'Popular Faculty Category', 'jumeira-university' ),
        'all_items'                  => __( 'All Faculty Categories', 'jumeira-university' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Faculty Category', 'jumeira-university' ),
        'update_item'                => __( 'Update Faculty Category', 'jumeira-university' ),
        'add_new_item'               => __( 'Add New Faculty Category', 'jumeira-university' ),
        'new_item_name'              => __( 'New Faculty Category Name', 'jumeira-university' ),
        'separate_items_with_commas' => __( 'Separate Faculty Category with commas', 'jumeira-university' ),
        'add_or_remove_items'        => __( 'Add or remove Faculty Category', 'jumeira-university' ),
        'choose_from_most_used'      => __( 'Choose from the most used Faculty Category', 'jumeira-university' ),
        'not_found'                  => __( 'No Faculty Category found.', 'jumeira-university' ),
        'menu_name'                  => __( 'Faculty Categories', 'jumeira-university' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'faculty_category' ),
    );
    register_taxonomy( 'faculty_category', 'faculty', $args );

    //Gallery Custom Post type
    $labels = array(
        'name'               => _x( 'Galleries', 'jumeira-university' ),
        'singular_name'      => _x( 'Gallery', 'jumeira-university' ),
        'menu_name'          => _x( 'Galleries', 'jumeira-university' ),
        'name_admin_bar'     => _x( 'Galleries', 'jumeira-university' ),
        'add_new'            => _x( 'Add New', 'Gallery', 'jumeira-university' ),
        'add_new_item'       => __( 'Add New Gallery', 'jumeira-university' ),
        'new_item'           => __( 'New Gallery', 'jumeira-university' ),
        'edit_item'          => __( 'Edit Gallery', 'jumeira-university' ),
        'view_item'          => __( 'View Gallery', 'jumeira-university' ),
        'all_items'          => __( 'All Galleries', 'jumeira-university' ),
        'search_items'       => __( 'Search Gallery', 'jumeira-university' ),
        'parent_item_colon'  => __( 'Parent Gallery:', 'jumeira-university' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'jumeira-university' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-format-gallery',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gallery' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'featured')
    );
    register_post_type('gallery',$args);
}
add_action( 'init', 'jumeira_custom_posttype' );
/*------------------------------------------------- Custom post type end ---------------------------------------------------*/
/*--------------------------------------------------- Home Page Start ------------------------------------------------------*/
//Home Slider
function jumeira_home_slider(){
    ob_start();
    $args = array(
        'post_type' => 'slider',
        'posts_per_page' => -1
    );
    $loop = new WP_Query($args);
    if( $loop->have_posts() ):
        ?>
        <div class="banner-slider">
            <?php
            while( $loop->have_posts() ): $loop->the_post();
                $id = get_the_ID();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
                ?>
                <div class="banner-item" style="background-image: url(<?php echo $image[0]; ?>);">
                    <div class="banner-item_inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-10 col-lg-7">
                                    <h1 class="color-white"><?php echo get_the_title(); ?></h1>
                                    <p><?php echo get_the_content(); ?></p>
                                    <?php if(get_field('slider_button_link')){ ?>
                                        <a class="apply" href="<?php echo get_field('slider_button_link'); ?>"><?php echo get_field('slider_button_text'); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <?php
    endif;
    $home_slider = ob_get_clean();
    return $home_slider;
}
add_shortcode( 'jumeira_home_slider', 'jumeira_home_slider' );

//Home News & Events
function jumeira_home_news_events(){
    ob_start();
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1
    );
    $loop = new WP_Query($args);
    if( $loop->have_posts() ):
        ?>
        <div class="news-events">
            <h5><?php _e('News and events', 'jumeira'); ?></h5>
            <div class="news-slider">
                <?php
                while( $loop->have_posts() ): $loop->the_post();
                    $id = get_the_ID();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
                    ?>
                    <div class="item">
                        <div class="content">
                            <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                            <p><?php echo get_the_excerpt(); ?></p>
                            <a href="<?php echo get_the_permalink(); ?>" class="read-more"><?php _e('Read More', 'jumeira'); ?></a>
                        </div>
                        <div class="article-bg" style="background-image: url(<?php echo $image[0]; ?>);"></div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    else:
        ?>
        <h4><?php _e('No News - Events Found', 'jumeira-university'); ?></h4>
        <?php
    endif;
    $home_news_events = ob_get_clean();
    return $home_news_events;
}
add_shortcode( 'jumeira_home_news_events', 'jumeira_home_news_events' );

//Home Colleges & Programs
function jumeira_home_college_program(){
    ob_start();
    $terms = get_terms(array( 
        'taxonomy' => 'college_cat',
        'hide_empty' => false
    ));
    ?>
    <div class="cp-list">
        <?php
        foreach ($terms as $key => $value) {
            $id = $value->taxonomy.'_'.$value->term_id;
            ?>
            <div class="cp-list-item">
                <div class="plus">&#43;</div>
                <a href="<?php echo get_term_link($value->term_id); ?>"><div class="featured-img" style="background-image: url(<?php echo get_field('category_image', $id); ?>);"></div></a>
                <h6><a href="<?php echo get_term_link($value->term_id); ?>"><?php echo $value->name; ?></a></h6>
                <?php
                $args = array(
                    'post_type' => 'college-programs',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'college_cat',
                            'field' => 'slug',
                            'terms' => $value->slug
                        )
                    )
                );
                $loop = new WP_Query($args);
                if( $loop->have_posts() ){
                    ?>
                    <ul>
                        <?php while( $loop->have_posts() ): $loop->the_post(); ?>
                            <li><?php echo get_field('custom_title'); ?></li>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </ul>
                    <?php 
                } ?>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    $home_college_program = ob_get_clean();
    return $home_college_program;
}
add_shortcode( 'jumeira_home_college_program', 'jumeira_home_college_program' );

//Home Testimonials
function jumeira_home_testimonials($atts){
    ob_start();
    $atts = shortcode_atts(array(
        'category' => ''
    ), $atts, 'testimonial');
    
    $terms = get_terms('testimonial_category');
    if($atts['category'] != '') {
        $category = $atts['category'];
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'testimonial_category',
                    'field'    => 'slug',
                    'terms'    => $category,
                ),
            )
        );
    }
    $loop = new WP_Query($args);
    if( $loop->have_posts() ):
        ?>
        <div class="testimonial-slider">
            <?php
            while( $loop->have_posts() ): $loop->the_post();
                $id = get_the_ID();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
                ?>
                    <div>
                        <div class="profile">
                            <div class="profile-img" style="background-image: url(<?php echo $image[0]; ?>);"></div>
                            <div class="profile-desc">
                                <h5><?php echo get_the_title(); ?></h5>
                                <?php if(get_field('designation')){ ?>
                                    <p><?php echo get_field('designation'); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <?php the_content(); ?>
                    </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <?php
    endif;

    $home_testimonials = ob_get_clean();
    return $home_testimonials;
}
add_shortcode( 'jumeira_home_testimonials', 'jumeira_home_testimonials' );





function jumeira_home_testimonialss($atts){
    ob_start();
    $atts = shortcode_atts(array(
        'category' => ''
    ), $atts, 'testimonial');
    
    $terms = get_terms('testimonial_category');
 
        $category = $atts['category'];
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => -1,
            
        );
  
    $loop = new WP_Query($args);
    if( $loop->have_posts() ):
        ?>

        <div class="news-events">
            <h2 class="">Testimonials</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <?php
           
            while( $loop->have_posts() ): $loop->the_post();
                $tempId = 0;
                $maxId = 0;
                $id = get_the_ID();
                if($temp_id == 0 || $maxId < $id) {
                    $tempId = $id;
                    $maxId = $tempId;


                }
            endwhile;

            ?>
            <ol class="carousel-indicators">
              <?php
           $i = 0;
            while( $loop->have_posts() ): $loop->the_post();
                 $id = get_the_ID();
                 $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' )[0];
                ?>
              <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i++ ?>" style="background-image: url(<?php echo $image ?>)" class="<?php if($maxId == $id){echo "active";}?>"></li>
             
          <?php endwhile; ?>
            </ol>
            <div class="carousel-inner">

            <?php
           
            while( $loop->have_posts() ): $loop->the_post();

                $id = get_the_ID();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );

                
                ?>
                <div class="carousel-item <?php if($maxId == $id){echo "active";}?>">
                      <h6 class="news-heading"><?php echo get_the_title(); ?></h6>
                      <p class="news-ceo"><?php if(get_field('designation')){ ?>
                                    <p><?php echo get_field('designation'); ?></p>
                                <?php } ?></p>
                      <p class="news-para">
                       <?php the_content(); ?>
                      </p>
                    
                  </div>


                <?php
            endwhile;
            wp_reset_postdata();
            ?>
            </div><!-- ./carousel-iner -->
        </div>
    </div>
        <?php
    endif;

    $home_testimonials = ob_get_clean();
    return $home_testimonials;
}
add_shortcode( 'jumeira_home_testimonialss', 'jumeira_home_testimonialss' );





/*---------------------------------------------------- Home Page End --------------------------------------------------------*/
/*------------------------------------------------ All Page Posts Start -----------------------------------------------------*/
//All Page Banner Posts
function jumeira_all_page_banner_posts($atts){
    ob_start();

    $atts = shortcode_atts(array(
        'page' => ''
    ), $atts, 'all_page_posts');

    $args = array(
        'post_type' => 'banner-post',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'banner_post_category',
                'field'    => 'slug',
                'terms'    => $atts['page'],
            ),
        ),
    );
    $loop = new WP_Query($args);
    $page_id = get_the_ID();
    if($loop->have_posts()):
        ?>
        <div class="banner-content">
            <h1><?php echo get_the_title(wp_get_post_parent_id( $page_id )); ?></h1>
            <ul class="list-inline banner-tabs">
                <?php
                while($loop->have_posts()) : $loop->the_post();
                    $id = get_the_ID();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
                    $active_class = '';
                    if(get_the_permalink($page_id) == get_field('view_more_button_link')){
                        $active_class = 'active ';
                    }
                    if($image){
                        $has_image_class = 'has-image';
                    }
                    ?>
                    <li class="<?php echo $active_class; ?><?php echo $has_image_class;?>">    
                        <div class="tab">
                            <div class="tab-info">
                                <?php if($image[0]){ ?>
                                    <img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>">
                                <?php } ?>
                                <h5><a href="<?php echo get_field('view_more_button_link'); ?>"><?php echo get_the_title(); ?></a></h5>
                                <?php if(get_field('view_more_button_link')){ ?>
                                    <a href="<?php echo get_field('view_more_button_link'); ?>" class="view-more"><?php echo get_field('view_more_button_text'); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
        <?php
    endif;
    $banner_posts = ob_get_clean();
    return $banner_posts;
}
add_shortcode( 'banner_navigation', 'jumeira_all_page_banner_posts' );
/*------------------------------------------------ All Page Posts End -------------------------------------------------------*/
/*-------------------------------------------------- Faculty Start ----------------------------------------------------------*/
//List of Faculty
function jumeira_faculty_display(){
    ob_start();
    $terms = get_terms(array( 'taxonomy' => 'faculty_category', 'hide_empty' => false)); 
    if( $terms ):
        ?>
        <div class="faculty-tab-content">
            <div class="faculty-tab-cat">
                <?php
                $j = 1;
                $k = 1;
                $l = 1;
                foreach($terms as $term){
                    $args = array(
                        'post_type' => 'faculty',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'faculty_category',
                                'field'    => 'slug',
                                'terms'    => $term->slug,
                            ),
                        ),
                    );
                    $loop = new WP_Query($args);
                    if( $loop->have_posts() ):
                        ?>
                        <h4><?php echo $term->name; ?></h4>
                        <div class="faculty-tab-list">
                            <?php
                            $i = 1;
                            while( $loop->have_posts() ): $loop->the_post();
                                $id = get_the_ID();
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
                                ?>
                                <div class="item get-faculty" id="<?php echo get_the_ID(); ?>" data-id="<?php echo $j; ?>" data-pid="<?php echo $k; ?>" data-mid="<?php echo $l; ?>">
                                    <h6><?php echo get_the_title(); ?></h6>
                                    <span><?php echo get_field('designation'); ?></span>
                                </div>
                                <?php 
                                if($i % 3 == 0 || $loop->post_count == $i){ 
                                    ?>
                                    <div class="lap item-content content-<?php echo $j; ?>" style="display: none !important;">
                                    </div>
                                <?php
                                $j++;
                                }
                                if($i % 2 == 0 || $loop->post_count == $i){ 
                                    ?>
                                    <div class="pad item-content content-<?php echo $k; ?>" style="display: none !important;">
                                    </div>
                                <?php
                                $k++;
                                }
                                if($i % 1 == 0 || $loop->post_count == $i){ 
                                    ?>
                                    <div class="mob item-content content-<?php echo $l; ?>" style="display: none !important;">
                                    </div>
                                <?php
                                $l++;
                                }
                                $i++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php
                    endif;
                }
                ?>
            </div>
        </div>
        <?php
    endif;
    $faculty_display = ob_get_clean();
    return $faculty_display;
}
add_shortcode( 'faculty_display', 'jumeira_faculty_display' );

//Load Faculty profile
function load_faculty_profile(){
    ob_start();
    $faculty_id = $_POST['post_id'];
    $content_post = get_post($faculty_id);
    $content = $content_post->post_content;
    $page_data = get_page($faculty_id);
    WPBMap::addAllMappedShortcodes();
    $post_content = apply_filters('the_content', $page_data->post_content);
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $faculty_id ), 'full' );
    ?>
    <div class="item-content-inner">
        <a href="javascript:void(0);" class="close-desc"><i class="fa fa-times"></i></a>
        <div class="left-block">
            <div class="profile-img" style="background-image: url(<?php echo $image[0]; ?>);"></div>
            <h4><?php echo $content_post->post_title; ?></h4>
            <span class="institute-name"><?php echo get_field('institute', $faculty_id); ?></span>
            <?php if(have_rows('studied', $faculty_id)): ?>
                <ul class="degree">
                    <?php
                    while( have_rows('studied', $faculty_id) ): the_row();
                        ?>
                            <li><?php echo get_sub_field('course_name', $faculty_id); ?></li>
                        <?php 
                    endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="right-block">
            <?php echo $post_content; ?>
        </div>
    </div>   
    <?php
    echo $faculty_profile = ob_get_clean();
    exit();
}
add_action( 'wp_ajax_faculty_data', 'load_faculty_profile' );
add_action( 'wp_ajax_nopriv_faculty_data', 'load_faculty_profile' );
/*-------------------------------------------------- Faculty End ------------------------------------------------------------*/

/*---------------------------------------------- College & Programme Start --------------------------------------------------*/
//List of College & Programms
function jumeira_college_programme(){
    ob_start();
    $terms = get_terms(array( 
        'taxonomy' => 'college_cat',
        'hide_empty' => false
    ));
    ?>
    <div class="cp-cat">
        <div class="row">
            <?php
            foreach ($terms as $key => $value) {
                $id = $value->taxonomy.'_'.$value->term_id;
                ?>
                <div class="col-sm-6 col-md-4">
                    <a href="<?php echo get_term_link($value->term_id); ?>"><div class="cat-img" style="background-image: url(<?php echo get_field('category_image', $id); ?>)"></div></a>
                    <h5><a href="<?php echo get_term_link($value->term_id); ?>"><?php echo $value->name; ?></a></h5>
                    <p><?php echo wp_trim_words($value->description, 60, '...'); ?></p>
                    <?php
                        $args = array(
                            'post_type' => 'college-programs',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'college_cat',
                                    'field' => 'slug',
                                    'terms' => $value->slug
                                )
                            )
                        );
                        $loop = new WP_Query($args);
                        if( $loop->have_posts() ){
                            ?>
                            <ul type="disc">
                                <?php while( $loop->have_posts() ): $loop->the_post(); ?>
                                    <li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </ul>
                            <?php 
                        }
                    ?>
                    <!-- <a href="<?php //echo get_term_link($value->term_id); ?>" class="post-link">Read More</a> -->
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php     
    $coll_prog = ob_get_clean();
    return $coll_prog;
}
add_shortcode( 'college_programme_list', 'jumeira_college_programme' );
/*----------------------------------------------- College & Programme End ---------------------------------------------------*/

/*---------------------------------------------------- Campus Start ---------------------------------------------------------*/
//News/Events listing in Campus Page
function jumeira_campus_news_events(){
    ob_start();

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 2
    );
    $loop = new WP_Query($args);
    if( $loop->have_posts() ):
        ?>
        <div class="news-list">
            <div class="row news-content">
                <?php
                while( $loop->have_posts() ) : $loop->the_post();
                    $id = get_the_ID();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
                    ?>
                    <div class="col-lg-6">
                        <div class="news-item">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
                                    <p><?php echo get_the_excerpt(); ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <div class="news-bg" style="background-image: url(<?php echo $image[0]; ?>)"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <?php if($loop->max_num_pages > 1){ ?>
                <form id="load-more-form">
                    <input class="load-more-btn" type="button" name="load-more" value="Load More">
                    <input type="hidden" name="page_no" value="2" class="page-no">
                    <input type="hidden" name="action" value="jumeira_load_more_news" class="action">
                    <input type="hidden" name="total_pages" value="<?php echo $loop->max_num_pages; ?>" class="total-pages">
                </form>
            <?php } ?>
        </div>
        <?php
    endif;

    $news_events = ob_get_clean();
    return $news_events;
}
add_shortcode( 'campus_news_events', 'jumeira_campus_news_events' );

//Load More News
function jumeira_load_more_news(){
    ob_start();

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'paged' => $_POST['page_no'],
        'post_status' => 'publish',
    );
    $loop = new WP_Query($args);
    if( $loop->have_posts() ):
        while( $loop->have_posts() ): $loop->the_post();
            $id = get_the_ID();
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
            ?>
            <div class="col-lg-6">
                <div class="news-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="news-bg" style="background-image: url(<?php echo $image[0]; ?>)"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;

    echo $load_more_news = ob_get_clean();
    exit();
}
add_action( 'wp_ajax_jumeira_load_more_news', 'jumeira_load_more_news' );
add_action( 'wp_ajax_nopriv_jumeira_load_more_news', 'jumeira_load_more_news' );
/*----------------------------------------------------- Campus End ----------------------------------------------------------*/

/* full class */
if ( ! function_exists( 'sparkling_main_content_bootstrap_classes' ) ) :
    /**
     * Add Bootstrap classes to the main-content-area wrapper.
     */
    function sparkling_main_content_bootstrap_classes() {
        if ( is_archive( 'tax-college_cat' ) || is_page_template( 'page-fullwidth.php' ) || is_page_template( 'entry_requirements_tpl.php' ) || is_page_template( 'tuition_fees_tpl.php' ) || is_page_template( 'scholarships_tpl.php' ) ) {
            return 'col-sm-12 col-md-12';
        }
        return 'col-sm-12 col-md-8';
    }
endif; // sparkling_main_content_bootstrap_classes

//Add class in body
add_filter( 'body_class', 'jumeira_custom_class' );
function jumeira_custom_class( $classes ) {
    $classes[] = 'loading';
    return $classes;
}

// customize repeater buttons
function customize_add_button_atts( $attributes ) {
    return array_merge( $attributes, array(
      'text' => 'Add New',
    ) );
}
add_filter( 'wpcf7_field_group_add_button_atts', 'customize_add_button_atts' );

function customize_remove_button_atts( $attributes ) {
    return array_merge( $attributes, array(
      'text' => 'Remove',
    ) );
}
add_filter( 'wpcf7_field_group_remove_button_atts', 'customize_remove_button_atts' );

function custom_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'college-programs' ){
        $terms = wp_get_object_terms( $post->ID, 'college_cat' );
        if( $terms ){
            return str_replace( '%college_cat%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'custom_permalinks', 1, 2 );

/*---------------------------------------------- News & Events Page Inner Start -------------------------------------------- */
//Home News & Events
function jumeira_news_inner(){
    ob_start();
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post__not_in' => array(get_the_ID()),
    );
    $loop = new WP_Query($args);
    if( $loop->have_posts() ):
        ?>
        <div class="news-events">
            <h5><?php _e('News and events', 'jumeira'); ?></h5>
            <div class="news-slider">
                <?php
                while( $loop->have_posts() ): $loop->the_post();
                    $id = get_the_ID();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
                    ?>
                    <div class="item">
                        <div class="content">
                            <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                            <p><?php echo get_the_excerpt(); ?></p>
                            <a href="<?php echo get_the_permalink(); ?>" class="read-more"><?php _e('Read More', 'jumeira'); ?></a>
                        </div>
                        <div class="article-bg" style="background-image: url(<?php echo $image[0]; ?>);"></div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    else:
        ?>
        <h4><?php _e('No News - Events Found', 'jumeira-university'); ?></h4>
        <?php
    endif;
    $news_inner = ob_get_clean();
    return $news_inner;
}
add_shortcode( 'news_inner_posts', 'jumeira_news_inner' );
/*---------------------------------------------- News & Events Page Inner End ---------------------------------------------- */

add_filter('nav_menu_css_class' , 'add_active_current_menu' , 10 , 2);
function add_active_current_menu ($classes, $item) {
    if (in_array('current-menu-parent', $classes) || is_singular('college-programs') && $item->title == "Colleges and Programs" ){
        $classes[] = 'active ';
    }
    return $classes;
}

