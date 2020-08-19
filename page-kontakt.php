<?php 
/**
 * 	Template Name: Kontakt
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" classe="span8">
			
			<?php if ( have_posts() ) : 
	
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="post">
						
						<h2 class='title  kontakt-title'>
							<?php the_title(); // Display the page title ?>
						</h2>
										
						<div class="the-content">
							<div class="first-section">
								<?php the_content();?>
							</div>
							<div class="second-section">
								<?php $form = get_field('kontakt_formular');
									echo $form?>
							</div>
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