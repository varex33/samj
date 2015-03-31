<?php
/*
Template Name: Lyrics-Template
*/
get_header(); ?>
<br>
<div class="row">
	<div id="primary" class="site-content small-12 medium-8 columns">
		<div id="content" role="main">
		<div class="wrapper-contact">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<center><h1 class="entry-title"><?php the_title(); ?></h1></center>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'cornerstone' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>

				</article>

				<?php comments_template( '', true ); ?>

			<?php endwhile; ?>
		</div><!-- end Blog-wrapper -->
		</div>
	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>

