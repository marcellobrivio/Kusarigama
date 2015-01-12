<?php
// Custom menus registration here...
if ( function_exists('register_nav_menus') )
	register_nav_menus(array(
		'main_nav' => 'Main Menu',
		'footer_nav' => 'Footer Menu',
		'specialWidget' => 'Special Footer Widget',
	));

// Custom fallback function to be call when the Main Menu and the Footer Menu are empty...
function defaultNavigation() {
	echo '<ul>';
	if (is_home()) {$homeLI = '<li class="current_page_item">';}
	else {$homeLI = '<li>';}
	echo $homeLI . '<a href="' . home_url() . '" title="' . get_bloginfo('name') . ' Home Page">Home</a></li>';
	wp_list_pages('title_li=&sort_column=menu_order&depth=1');
	echo '</ul>';
}
	
// Custom fallback function to be call when the Special Footer Widget custom menu is empty...
function specialWidget_fallback() {
	echo '<ul>';
	echo '<li><a href="' . home_url() . '/wp-admin/" title="Login to WordPress admin area" target="_blank">Admin Area</a></li>';
	echo '<li><a href="http://www.wordpress.org" title="WordPress, the best platform for bloging &amp; more" target="_blank">WordPress.org</a></li>';
	echo '<li><a href="http://www.marcellobrivio.com/wordpress/kusarigama/" title="Kusarigama Theme for WordPress" target="_blank">Kusarigama Theme</a></li>';
	echo '<li><a href="http://codex.wordpress.org/" title="WordPress Codex" target="_blank">Documentation</a></li>';
	echo '<li><a href="http://wordpress.org/news/" title="Official WordPress development blog" target="_blank">WordPress Blog</a></li>';
	echo '</ul>';
}

// The main sidebar is of course registered as widgetizable area...
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Sidebar',
		'description'   => 'This is the main sidebar on the right of the layout.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

// And so is the footer...
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Footer',
		'description'   => 'You can add widgets to the footer! It is recommended to have 4 widgets here, no more and no less. Otherways, you can leave it empty and use the default footer.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
	
// Enables post and comment RSS feed links to head
add_theme_support( 'automatic-feed-links');

// Mandatory variable. This is generally used to assign a maximum width
if (!isset($content_width)) $content_width = 620;

// Custom password form for better styling
function the_password_form_with_class($form) {
  $subs = array(
    '#<form(.*?)>#' => '<form$1 class="passwordform">',
	'#Password:#' => '<span>Password:</span>',
	'#<input(.*?)type="password"(.*?) />#' => '<input$1type="password"$2 class="enterpass" />',
    '#<input(.*?)type="submit"(.*?) />#' => '<input$1type="submit"$2 class="submitpass" />'	
  );
  echo preg_replace(array_keys($subs), array_values($subs), $form);
}
add_filter('the_password_form', 'the_password_form_with_class');


// Kusarigama Custom Options Array
$themename = "Kusarigama";
$shortname = "kusarigama";
$options = array (
	array(
		"name" => "Default colour scheme",  
		"desc" => "Select the colour scheme for $themename. This will be the default skin for <i>all</i> users.",
		"id" => $shortname."_color_scheme",  
		"type" => "radio",  
		"options" => array("Angry Ninja", "Bright Angel", "Verderio"),
		"std" => "Angry Ninja"
	),
	array(
		"name" => "User selectable skin",  
		"desc" => "$themename includes a stylesheet selector that gives users the ability to choose their preferred skin, overriding the Colour Scheme setting above. Of course this is a client side feature: each user can choose his <i>personal</i> skin, without affecting others. If turned on, a special panel appears on top of the sidebar.",  
		"id" => $shortname."_selectable_skin",  
		"type" => "checkbox",  
		"optext" => "Turn on user selectable skin panel",
		"std" => "1"
	),
	array(
		"name" => "Default font type",  
		"desc" => "Select the preferred font type for $themename, choosing between serif (Arial, Helvetica) or sans-serif (Georgia).",
		"id" => $shortname."_font_type",  
		"type" => "radio",  
		"options" => array("Sans-Serif", "Serif"),
		"std" => "Sans-Serif"
	),
	array(
		"name" => "Sidebar position",  
		"desc" => "$themename has a dynamic sidebar. Its default position is on the right of the main layout, but you can move it on the left if you wish.",
		"id" => $shortname."_sidebar_position",  
		"type" => "radio",  
		"options" => array("Right", "Left"),
		"std" => "Right"
	),
	array(
		"name" => "ADV",
		"desc" => "Paste here the code to generate a banner at the top of the sidebar.",
		"id" => $shortname."_adv_code",
		"std" => "",
		"type" => "textarea"
	),
	array(
		"name" => "Secondary ADV",
		"desc" => "Paste here the code to generate a banner at the bottom of the sidebar.",
		"id" => $shortname."_2nd_adv_code",
		"std" => "",
		"type" => "textarea"
	),
	array(
		"name" => "Google Analytics",
		"desc" => "Paste here the tracking code to have Google Analytics added in the head section.",
		"id" => $shortname."_google_analytics",
		"std" => "",
		"type" => "textarea"
	)
);

function add_custom_admin() {
    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ]) );
			}
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  );
				} else {
					delete_option( $value['id'] );
				}
			}
			header("Location: themes.php?page=functions.php&saved=true");
			die;
		}
		else if ( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				delete_option( $value['id'] );
			}
			header("Location: themes.php?page=functions.php&reset=true");
			die;
        }
    }
	add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'custom_admin');
}

function custom_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	?>

<div class="wrap">

	<div id="icon-options-general" class="icon32"><br /></div>
	<h2><?php echo $themename; ?> settings</h2>
	
	<form method="post">

	<?php 
	foreach ($options as $value) {
	?>
			
		<?php if ( $value['type'] == "textarea") { ?>
			<h3><?php echo $value['name']; ?></h3>
			<p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></p>
			<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="large-text code" rows="5"><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea>
		<?php } ?>
			
		<?php if ( $value['type'] == "radio") { ?>
			<h3><?php echo $value['name']; ?></h3>
			<p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></p>
			<p>
				<?php foreach ($value['options'] as $option) { ?>
					<label><input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php if ( get_option( $value['id'] ) == $option) { echo 'checked="checked"'; } elseif ($option == $value['std']) { echo 'checked="checked"'; } ?> /> <?php echo $option; ?></label><br />
				<?php } ?>	
			</p>
		<?php } ?>
		
		<?php if ( $value['type'] == "checkbox") { ?>
			<h3><?php echo $value['name']; ?></h3>
			<p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></p>
			<fieldset><label for="<?php echo $value['id']; ?>"><input type="checkbox" value="1" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" <?php if ( get_option( $value['id'] ) ) { echo 'checked="checked"'; } ?>> <?php echo $value['optext']; ?></label></fieldset>
		<?php } ?>
			
	<?php
	}
	?>

	<p class="submit">
		<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"  />
		<input type="hidden" name="action" value="save" />
	</p>
</form>
<form method="post">
	<h3>Reset To Factory Settings</h3>
	<p>You can use the button below to reset all saved options for <?php echo $themename; ?> to their default value.</p>
	<p class="submit">
		<input type="submit" name="reset" id="reset" class="button-primary" value="Reset" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
<?php
}
add_action('admin_menu', 'add_custom_admin');
?>