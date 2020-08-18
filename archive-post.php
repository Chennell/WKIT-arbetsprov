<?php 
/**
 * 	Template Name: Alla böcker
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
						
						<!-- Visar alla  upplagda böcker -->
						<div class="book-section all-books">
							
							<h2>
								<?php the_title(); // Display the page title ?>
							</h2>
							
							<div class="book-grid all-books-grid">
								<?php 
								   // the query
								   $the_books = new WP_Query( array(
									  'posts_per_page' => -1,
								   )); 
								?>

								<?php if ( $the_books->have_posts() ) :
								   while ( $the_books->have_posts() ) : $the_books->the_post();?>
									<div class="a-book">
										<a href="<?php the_permalink()?>">

											<?php the_post_thumbnail('hero_thumbnail');?>
											<h3><?php the_title();?></h3>
											<?php $forfattare = get_field('forfattare');?>
											<p> &#8212 <?php echo $forfattare?></p>
										</a>
									</div>

								   <?php endwhile;
								   wp_reset_postdata();

								 else : ?>
								  <p><?php __('No News'); ?></p>
								<?php endif; ?>
							</div>
						</div>
						
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