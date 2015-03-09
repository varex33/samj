<?php 
/*
Template Name: Contact-Template
*/
get_header();
?>
<br>
<div class="row">
	<div id="primary" class="site-content small-12 medium-8 columns">
		<div id="content" role="main">
			<div class="wrapper-contact">
				<?php if(have_posts()){
					while(have_posts()):the_post();
						the_content();
					endwhile;
					}
				?>	
			</div>
		</div>
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
