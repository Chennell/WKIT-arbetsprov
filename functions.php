<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Add custom logo to the theme
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'custom-logo' );

function WKIT_custom_logo_setup() {
 $defaults = array(
	 'height'      => 100,
	 'width'       => 400,
	 'flex-height' => true,
	 'flex-width'  => true,
	 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'WKIT_custom_logo_setup' );




function theme_support(){
		
		//add_theme_support( 'post-thumbnails' ); 
		//add_theme_support( 'post-formats' );
		//add_theme_support('title-tag');

		//The images
		add_image_size( 'hero_thumbnail', 480, 480, true);
		
	}

	 add_action( 'after_setup_theme', 'theme_support' );



/*-----------------------------------------------------------------------------------*/
/* Add hero img
/*-----------------------------------------------------------------------------------*/

$header_info = array(
    'width'         => 1400,
    'height'        => 500,
    'default-image' => get_template_directory_uri() . '/img/blue.jpg',
);
add_theme_support( 'custom-header', $header_info );
 
$header_images = array(
    'sunset' => array(
            'url'           => get_template_directory_uri() . '/img/blue.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/img/blue.jpg',
            'description'   => 'Blue',
    ),
    'flower' => array(
            'url'           => get_template_directory_uri() . '/img/books.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/img/books.jpg',
            'description'   => 'books',
    ),  
);
register_default_headers( $header_images );

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'naked' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu, 
		// just change the 'primary' to another name
	)
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
	
	register_sidebar( array(
		'name'          => 'Footer area one',
		'id'            => 'footer_area_one',
		'description'   => 'This is the footer area two the left',
		'before_widget' => '<section class="footer-area footer-area-one">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	  ));

	register_sidebar( array(
		'name'          => 'Footer area two',
		'id'            => 'footer_area_two',
		'description'   => 'This is the footer area two the right',
		'before_widget' => '<section class="footer-area footer-area-two">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	  ));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );



/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	
	// add fitvid
	wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header
