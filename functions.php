<?php
/**
 * syntelect functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package syntelect
 */

if ( ! function_exists( 'syntelect_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function syntelect_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on syntelect, use a find and replace
		 * to change 'syntelect' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'syntelect', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'syntelect' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'syntelect_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'syntelect_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function syntelect_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'syntelect_content_width', 640 );
}
add_action( 'after_setup_theme', 'syntelect_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function syntelect_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'syntelect' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'syntelect' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'syntelect_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function syntelect_scripts() {
	wp_enqueue_style( 'syntelect-style', get_stylesheet_uri() );

	wp_enqueue_script( 'syntelect-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'syntelect-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'syntelect_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add css style syntelect
function syntelect_css() {
 	wp_enqueue_style( 'syntelect_css', get_stylesheet_directory_uri() . '/css/main.min.css' );
}
add_action( 'wp_enqueue_scripts', 'syntelect_css', 99 );

// Add js syntelect
add_action( 'wp_enqueue_scripts', 'syntelect_js' );
function syntelect_js() {
	wp_enqueue_script( 'syntelect_js', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'));
}

// Add google js map
add_action( 'wp_enqueue_scripts', 'map' );
function map() {
	wp_enqueue_script( 'map', get_template_directory_uri() . '/js/map.js');
}

// // Add script send form
// add_action( 'wp_enqueue_scripts', 'send_contact_form' );
// function send_contact_form() {
// 	wp_enqueue_script( 'send_contact_form', get_template_directory_uri() . '/js/send_form.js', array('jquery'));
// }



function get_img_path() {
	$img_path = [];

	if (!$sliders = get_field('slider_repeater'))
		return false;

	foreach ($sliders as $slide) 
		$img_path[] = ($slide['slider_group']['image'] ?? '');

	if (!$img_path)
		return false;

	return $img_path;	
}

// enable download svg

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




// Ajax send contact form

add_action( 'wp_ajax_send_form', 'say_send_form' );
add_action( 'wp_ajax_nopriv_send_form', 'say_send_form' );

function say_send_form() {
	
	// var_dump($_FILES);
	// die();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_FILES['file'])) {
			$file = $_FILES['file'];
			$msg = '';

			$white_list = ['jpg', 'jpeg', 'gif', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'pdf', 'png'];
			$tmp = explode('.', $file['name']);
			$ext = strtolower($tmp[count($tmp) - 1]);

			if ($file['size'] > 10 * 2 * 1024 * 1024) {
				 // 'Файл превышает 20 МБ';
				header('Content-type: application/json');
				echo json_encode(['type' => 'bad_size']);
				wp_die();				
			}
			elseif (!in_array(strtolower($ext), $white_list)){
				header('Content-type: application/json');
				echo json_encode(['type' => 'bad_ext']);
				wp_die();
			} 
			// else {
			// 	идем дальше
			// }
		}

		if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
			// file_put_contents("text.txt", "не пустые");
			header('Content-type: application/json');						
			echo json_encode(['type' => 'empty_fields']);			
			wp_die();
		} else {
			global $phpmailer;
			if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) { // проверяем, существует ли объект $phpmailer и принадлежит ли он классу PHPMailer
				// если нет, то подключаем необходимые файлы с классами и создаём новый объект
				require_once ABSPATH . WPINC . '/class-phpmailer.php';
				require_once ABSPATH . WPINC . '/class-smtp.php';
				$phpmailer = new PHPMailer( true );
			}

			$name = substr(htmlspecialchars(trim($_POST['name'])), 0, 1000);
			$email = substr(htmlspecialchars(trim($_POST['email'])), 0, 1000);
			$subject = substr(htmlspecialchars(trim($_POST['subject'])), 0, 1000);
			$message = substr(htmlspecialchars(trim($_POST['message'])), 0, 1000000);

			$phpmailer->ClearAttachments(); // если в объекте уже содержатся вложения, очищаем их
			$phpmailer->ClearCustomHeaders(); // то же самое касается заголовков письма
			$phpmailer->ClearReplyTos();

			$phpmailer->From = 'info@syntelect.com.tw'; // от кого, Email
			$phpmailer->FromName = $name; // от кого, Имя
			$phpmailer->Subject = $subject; // тема
			$phpmailer->SingleTo = true;
			$phpmailer->ContentType = 'text/html'; // тип содержимого письма
			$phpmailer->IsHTML(true);
			$phpmailer->CharSet = 'utf-8'; // кодировка письма
			$phpmailer->ClearAllRecipients(); // очищаем всех получателей
			$phpmailer->AddAddress('andreii.kachanov@gmail.com'); // добавляем новый адрес получателя
			$phpmailer->AddAddress('andrey170749@yandex.ru');
			$phpmailer->Body = "<p>Message from contact form syntelect.com.tw</p>
								<p>Name - $name</p>
								<p>Email - $email</p>
								<p>Message - $message</p>";
			
			if (isset($_FILES['file']))
				$phpmailer->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);


			if ($phpmailer->Send()) {
				header('Content-type: application/json');						
				echo json_encode(['type' => 'good']);
				wp_die();		
			} else {
				header('Content-type: application/json');						
				echo json_encode(['type' => 'bad_send']);
				wp_die();		
			}
		} 	
	}
}

// Подключение JS отправки формы
add_action( 'wp_enqueue_scripts', 'my_assets' );
function my_assets() {
	wp_enqueue_script( 'send_contact_form', get_template_directory_uri() . '/js/send_contact_form.js', array('jquery'));
	wp_localize_script( 'send_contact_form', 'myPlugin', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	) );
}
// end sen contact form

// disable text editor
function reset_editor()
{
     global $_wp_post_type_features;

     $post_type="page";
     $feature = "editor";
     if ( !isset($_wp_post_type_features[$post_type]) )
     {

     }
     elseif ( isset($_wp_post_type_features[$post_type][$feature]) )
     unset($_wp_post_type_features[$post_type][$feature]);
}

add_action("init","reset_editor");
// ------------------------

function get_new_coordinate($address) {
	$prepAddr = str_replace( 
							array('#', '!', '@', '$', '%', '^', '*', '=', '`', '~', '&', '?', '+'), 
								   '', (str_replace(' ','+',$address))
						    );
	$user_api_key = 'AIzaSyAZoV8o7zh0ostbnkJekaf72VZs-RF1z6c'; //GOOGLE API KEY
	$geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $prepAddr . '&key=' . $user_api_key);
    $output = json_decode($geocode);

	if ($output->status != 'OK') {
		$latitude = 25.074448;
		$longitude = 121.363037;	
	} else {
	    $latitude = $output->results[0]->geometry->location->lat;
	    $longitude = $output->results[0]->geometry->location->lng;
			
	}
	// file_put_contents("test.txt", $longitude . PHP_EOL, FILE_APPEND);
	return ['latitude' => $latitude, 'longitude' => $longitude];    						    	
}


// функция определят, был ли изменен адрес в админке, и докодирует адрес
// на новые координаты

function get_coordinate() {
	global $wpdb;
	$table_marker = $wpdb->get_blog_prefix() . 'map_marker';

	$res =  $wpdb->get_results("SELECT * FROM {$table_marker} WHERE id='1'", ARRAY_A);
	
	$address_in_db = $res[0]['address'];
	$address_in_field = get_field('contacts_group')['address'];

	if ($address_in_db == $address_in_field) {
		return ['lat' => $res[0]['latitude'], 'lng' => $res[0]['longitude']];	
	} else {
		$new_coordinate = get_new_coordinate($address_in_field);
		$result = $wpdb->update($table_marker,
			['latitude' => $new_coordinate['latitude'], 'longitude' => $new_coordinate['longitude'], 'address' => $address_in_field],
			['id' => 1],
			['%f', '%f', '%s']
		);

		if ($result === false)
			return false;		
		else
			return ['lat' => $new_coordinate['latitude'], 'lng' => $new_coordinate['longitude']];
	}
	    						    	
}


function language_selector_flags(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
            if(!$l['active']) echo '</a>';
        }
    }
}
