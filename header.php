<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!--     H A I L   T O   Y O U ,    T H E   S O U R C E C O D E   V I E W E R !     -->
	
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="robots" content="all" />
		<meta name="googlebot" content="index, follow, snippet, archive" />
		<meta name="MSSmartTagsPreventParsing" content="true" />
		<meta name="viewport" content="width=1024">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
		
		<!-- Typography management happens here -->
		<?php if (get_option("kusarigama_font_type") == "Mixed") : ?>
		<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
		<style type="text/css">
		body, html, #header h2 {font-family: 'Libre Baskerville', serif !important;}
		h1, h2, h3, #upperStrip ul {font-family: 'Montserrat', sans-serif !important; font-weight: bold !important;}
		#footer div.widget h4, #footer div.specialWidget h4, div#subMenu, #commentform input#submit, #sidebar .widget #searchform input#searchsubmit, .navigation a, #footer #feedLinks, form.passwordform input.submitpass {font-family: 'Montserrat', sans-serif !important; font-weight: bold !important; text-transform: uppercase !important;}
		</style>
		<?php elseif (get_option("kusarigama_font_type") == "Serif") : ?>
		<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
		<style type="text/css">
		body, html {font-family: 'Libre Baskerville', serif !important;}
		h1, h2, h3, #upperStrip ul {font-family: 'Nixie One', serif !important; font-weight: normal !important;}
		#footer div.widget h4, #footer div.specialWidget h4, div#subMenu, #commentform input#submit, #sidebar .widget #searchform input#searchsubmit, .navigation a, #footer #feedLinks, form.passwordform input.submitpass {font-family: 'Nixie One', serif !important; text-transform: uppercase !important;}
		</style>
		<?php else : ?>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
		<style type="text/css">
		body, html {font-family: 'Open Sans', sans-serif !important;}
		h1, h2, h3, #upperStrip ul {font-family: 'Montserrat', sans-serif !important; font-weight: bold !important;}
		#footer div.widget h4, #footer div.specialWidget h4, div#subMenu, #commentform input#submit, #sidebar .widget #searchform input#searchsubmit, .navigation a, #footer #feedLinks, form.passwordform input.submitpass {font-family: 'Montserrat', sans-serif !important; font-weight: bold !important; text-transform: uppercase !important;}
		</style>
		<?php endif; ?>
		
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
		
		<!-- Column position override happens here -->
		<?php if (get_option("kusarigama_sidebar_position") == "Left") : ?>
		<style type="text/css">
		#mainColumn {float: right;}
		#sidebar {float: left;}
		</style>
		<?php endif; ?>		
		
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<?php if (get_option("kusarigama_selectable_skin") == "1") : ?>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.styleswitch.js"></script>
		<?php endif; ?>	
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		
		<?php wp_head() ?>
			
	</head>
	
	<body <?php body_class(); ?>>

		<nav>
			<div id="upperStrip">
				<?php wp_nav_menu( array('theme_location' => 'main_nav', 'fallback_cb' => 'defaultNavigation', 'container' => 'menu', 'menu_class' => '')); ?>
			</div>
		</nav>
		
		<div id="mainContainer">
			<div class="gradient">
			
				<div id="mainColumn">
			
					<header>
						<div id="header">
							<h1><a href="<?php echo home_url() ?>" title="<?php bloginfo('name'); ?> Home Page"><?php bloginfo('name'); ?></a></h1>
							<h2><?php bloginfo('description'); ?></h2>
						</div>
					</header>