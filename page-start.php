<?php 
/**
 * 	Template Name: Startsida
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" classe="span8">
			
			<!-- Getting the hero img--->
			<?php if ( get_header_image() ) : ?>
				<div id="site-header">
						<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<div class="on-hero">
						<div class="on-hero-img">
							<?php get_the_post_thumbnail();
								echo the_post_thumbnail('hero_thumbnail');?>
						</div>
						<div class="on-hero-text">
							<?php $hero_rubrik = get_field('hero_rubrik');
							echo "<h2> $hero_rubrik </h2>";?>
							
							<?php $hero_forfattare = get_field( "hero_forfattare" );
								if( $hero_forfattare ) {
									echo "<p>&#8212 $hero_forfattare</p>";
								} else {
									
								}?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
			<?php if ( have_posts() ) : 
	
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="post">

						<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
							<h1 class='title'>
								<?php the_title(); // Display the page title ?>
							</h1>
						<?php endif; ?>
										
						<div class="the-content">
							<?php the_content(); 
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in paragraph tags
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>