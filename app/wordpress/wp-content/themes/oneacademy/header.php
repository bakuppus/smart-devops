<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OneAcademy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet"> -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'oneacademy' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar fixed-top navbar-expand-lg ">
			<a class="navbar-brand" href="#">
				<img id="logo" src="<?php bloginfo('template_directory'); ?>/static/images/logo.png"  width="100px;" style="display:none;" />
				<img id="logo-w" src="<?php bloginfo('template_directory'); ?>/static/images/logo-w.png"  width="100px;"  />

			</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" id="myMenu">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Platform
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item dropdown-top" href="#">Learning Managment System</a>
          <a class="dropdown-item dropdown-top" href="#">Virtual Classroom System</a>
          <a class="dropdown-item dropdown-top" href="#">eCommerce Store</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Learning Experience</a>
          <a class="dropdown-item" href="#">Pricing</a>
          <a class="dropdown-item" href="#">ROI Calculator</a>

        </div>
      </li>
      <li class="nav-item" data-menuanchor="welcome">
        <a class="nav-link" href="#welcome">Success Stories <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Partners</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
    <li class="nav-item" id="startTrial">
      <a class="nav-link" href="#" >Start Trial</a>
    </li>
    </ul>

  </div>
</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
