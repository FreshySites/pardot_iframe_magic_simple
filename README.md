<h2># Include Any Page<h2><br>
<hr>
  <p><strong>Usage:</strong></p>
 Pass the entire output of any URL into the content of any page by adding [inlude_any_page url="example.com"]. Depending on the theme, a custom page template may be needed. 
  
  Use the following as the page template in a new .php file, and add to your theme or child theme root: 
  
 <?php
/**
 * Template Name: New Page Template Name
 */
 ?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
