<?php 
	get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" classe="span8">
			<article class="post error-box">
				<div class="error-text-box">
					<p class="error-text">404</p>
					<h2>Hoppsan, verkar ha blivit lite fel här.</h2>
					<p> Sidan ni letar efter verkar inte finnas längre istället kanske ni vill besöka vår startsida eller spana in våra böcker</p>
					
					<?php $url = home_url();
					$booksurl = home_url( '/alla-bocker' );?>
					<div class="error-buttons">
						<div class="error-btn"><a href="<?php echo $url; ?>"><p>Startsida</p></a></div>
						<div class="error-btn"><a href="<?php echo $booksurl; ?>"><p>Startsida</p></a></div>
					</div>
				</div>
			</article>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>