<?php 
/**
 * 	Template Name: Topplistan
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
						<div class="top-list-section">
							
							<h2>
								<?php the_title(); // Display the page title ?>
							</h2>
							
							<div class="top-list-grid">
									<?php
								
										$number = 0;
										query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&post_per_page=10');
										if (have_posts()) : while (have_posts()) : the_post();
											$number ++;
										?>
										<div class="a-book">
											<a href="<?php the_permalink()?>">
												<div class="top-list-innerdiv">
													<div class="top-list-innerdiv-img">
														<?php the_post_thumbnail('book_img');?>
													</div>
													<div class="top-list-innerdiv-text">
														<h3><?php echo $number,'. ', the_title();?></h3>
														<?php $forfattare = get_field('forfattare');?>
														<p> &#8212 <?php echo $forfattare?></p>
														<p><?php the_excerpt();?></p>
													</div>
												</div>
											</a>
										</div>
										<?php
										endwhile;
										wp_reset_query();
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