<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

</main><!-- / end page container, begun in the header -->

<footer class="site-footer">
	
	 <?php dynamic_sidebar( 'footer_area_one' ); ?>
	 <?php dynamic_sidebar( 'footer_area_two' ); ?>
</footer><!-- #colophon .site-footer -->

<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

</body>
</html>
