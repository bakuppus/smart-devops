<?php
/**
	Template Name: Content Only
*/
?>
<html>
<head>
   <title><?php wp_title( '|', true, 'right' ); bloginfo('url'); ?></title>
   <style>
       html,body,div,iframe {height:100vh;overflow:hidden;}
       p {position:relative;overflow:hidden;}
       iframe {border:none;width:100%;max-height:91vh;}
       body {margin:0;padding:0;}
   </style>
   <?php wp_head(); ?>
</head>

<body>
      <?php while (have_posts()) : the_post(); ?>
      <?php the_content(); endwhile; ?> 
      <?php wp_footer(); ?>
</body>
</html>