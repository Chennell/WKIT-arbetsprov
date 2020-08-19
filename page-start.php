<?php 
/**
 * 	Template Name: Startsida
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid overflow">
		<div id="content" role="main" classe="span8">
			
			<!-- Getting the hero img--->
			<?php if ( get_header_image() ) : ?>
				<div id="site-header">
						<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<div class="on-hero">
						<div class="on-hero-img">
							<?php 
								$image = get_field('hero_bild');
								$size = 'book_img'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								}?>
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
							<div class="start-section">
								<?php the_content();
									$start_link = get_field('start_sektion_lank');
									$lank_rubrik = get_field('lank_rubrik');
									echo "<a href=$start_link> &#8212 $lank_rubrik</a>";
								?>
							</div>
							<div class="start-section-img">
								<?php get_the_post_thumbnail();
									echo the_post_thumbnail('ver-img');?>
							</div>
						</div><!-- the-content -->
						
						<!-- Visar de tre senast  upplaggda böckerna -->
						<div class="book-section">
							<div class="book-section-in-div">
								<?php $sektion_2_rubrik = get_field('sektion_2_rubrik');
									echo "<h2> $sektion_2_rubrik </h2>";
								?>
								<div class="book-grid">
									<?php 
									   // the query
									   $the_books = new WP_Query( array(
										  'posts_per_page' => 3,
									   )); 
									?>

									<?php if ( $the_books->have_posts() ) :
									   while ( $the_books->have_posts() ) : $the_books->the_post();?>
										<div class="a-book">
											<a href="<?php the_permalink()?>">

												<?php the_post_thumbnail('book_img');?>
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