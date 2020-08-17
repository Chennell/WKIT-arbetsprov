<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="content">

			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a post to show, start a loop that will display it
				?>

					<article class="post">
						<div class="the_book">
							<div class="single-book-img">
								<?php get_the_post_thumbnail();
									echo the_post_thumbnail('hero_thumbnail');?>
							</div>
							<div class="single-book-info">
								<div class="single-book-title-box">
									<h1 class="title"><?php the_title(); ?></h1>
									<?php $forfattare = get_field('forfattare');?>
									<p> &#8212 <?php echo $forfattare?></p>
								</div>
								
								<div class="single-content">
									<?php the_content(); 
									// This call the main content of the post, the stuff in the main text box while composing.
									// This will wrap everything in p tags
									?>

									<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
								</div><!-- the-content -->
								<div class="book-info">
									<?php 
										$forfattare = get_field('forfattare');
										$utgivet_ar = get_field('utgivet_ar');
										$antal_sidor = get_field('antal_sidor');
										$isbn = get_field('isbn');
										$bokens_sprak = get_field('bokens_sprak');
									?>
									<p><strong>Författare:</strong> <?php echo $forfattare?></p>
									<p><strong>Utgivet år: </strong><?php echo $utgivet_ar?></p>
									<p><strong>Sidor: </strong><?php echo $antal_sidor?></p>
									<p><strong>ISBN: </strong><?php echo $isbn?></p>
									<p><strong>Språk: </strong><?php echo $bokens_sprak?></p>
								</div>
							</div>
						</div>
						
						<div class="meta clearfix">
							<div class="category"><?php //echo get_the_category_list(); // Display the categories this post belongs to, as links ?></div>
							<div class="tags"><?php //echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?></div>
						</div><!-- Meta -->
						
						
						
						
						
						<!-- Visar de tre senast  upplaggda böckerna -->
						<div class="book-section">
							
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

				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
