<?php 
get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" classe="span8">
			
			<?php
			$args = array('post_type' => 'bok',
				'tax_query' => array(
					array(
						'taxonomy' => 'genre',
						'field' => 'slug',
						'terms' => $term
					),
				),
			 );
			
			
			 $loop = new WP_Query($args);
			 if($loop->have_posts()) {?>
				<article class="post">
					<div class="all-books">
						<h2>
							<!-- För att få genre namn till sidans titel-->
							<?php echo single_term_title(); ?>
						</h2>
						<div class="all-books-grid">
					   <?php while($loop->have_posts()) : $loop->the_post();?>


								<div class="a-book all-single-book">
									<a href="<?php the_permalink()?>">

										<?php the_post_thumbnail('hero_thumbnail');?>
										<h3><?php the_title();?></h3>
										<?php $forfattare = get_field('forfattare');?>
										<p> &#8212 <?php echo $forfattare?></p>
									</a>
								</div>
						<?php endwhile;
					 }
					  ?>
						</div>
					</div>
				</article>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
