<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<!--     H A I L   T O   Y O U ,    T H E   S O U R C E C O D E   V I E W E R !     -->
	
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="robots" content="all" />
		<meta name="googlebot" content="index, follow, snippet, archive" />
		<meta name="MSSmartTagsPreventParsing" content="true" />
		
		<!-- Skins management happens here -->
		<?php if (get_option("kusarigama_color_scheme") == "Bright Angel") : ?>
		<link rel="stylesheet" type="text/css"  href="<?php echo get_template_directory_uri(); ?>/skins/bright.css" title="bright-angel" media="screen" />
			<?php if (get_option("kusarigama_selectable_skin") == "1") : ?>
			<link rel="alternate stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" title="angry-ninja" media="screen" />
			<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/skins/verderio.css" title="verderio" media="screen" />
			<?php endif; ?>
		<?php elseif (get_option("kusarigama_color_scheme") == "Verderio") : ?>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/skins/verderio.css" title="verderio" media="screen" />
			<?php if (get_option("kusarigama_selectable_skin") == "1") : ?>
			<link rel="alternate stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" title="angry-ninja" media="screen" />
			<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/skins/bright.css" title="bright-angel" media="screen" />
			<?php endif; ?>	
		<?php else : ?>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" title="angry-ninja" media="screen" />
			<?php if (get_option("kusarigama_selectable_skin") == "1") : ?>
				<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/skins/bright.css" title="bright-angel" media="screen" />
				<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/skins/verderio.css" title="verderio" media="screen" />
			<?php endif; ?>
		<?php endif; ?>
		
		
		<!-- Custom options override happens here -->
		<style type="text/css">
		<?php if (get_option("kusarigama_sidebar_position") == "Left") : ?>
		#mainColumn {float: right;}
		#sidebar {float: left;}
		<?php endif; ?>		
		<?php if (get_option("kusarigama_font_type") == "Serif") : ?>
		body, html {font-family: Georgia, serif;}
		<?php endif; ?>
		</style>
		
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollTo.js"></script>
		<?php if (get_option("kusarigama_selectable_skin") == "1") : ?>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.styleswitch.js"></script>
		<?php endif; ?>	
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		
		<?php wp_head() ?>
		
		<?php echo get_option("kusarigama_google_analytics"); ?>
		
	</head>
	
	<body <?php body_class(); ?>>

		<div id="upperStrip">
			<?php wp_nav_menu( array('theme_location' => 'main_nav', 'fallback_cb' => 'defaultNavigation', 'container' => 'menu', 'menu_class' => '')); ?>
		</div>
		
		<div id="mainContainer">
			<div class="gradient">
			
				<div id="mainColumn">
			
					<div id="header">
						<h1><a href="<?php echo home_url() ?>" title="<?php bloginfo('name'); ?> Home Page"><?php bloginfo('name'); ?></a></h1>
						<h2><?php bloginfo('description'); ?></h2>
					</div>