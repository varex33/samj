<br>
<div id="footer">
	<footer class="row">
	<div id="primary" class="site-content small-12 medium-12 columns">
	  <div class="wrapper-footer">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar')) : ?>
		<?php endif; ?>
		<?php if ( has_nav_menu( 'footer-menu' ) ) {
			echo '<div class="row">';
			wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'inline-list', 'container' => 'nav', 'container_class' => 'small-12 medium-9 columns' ) );
			echo '</div>';
		} ?>
	<center><p class="footer">© Copyright Sam Argote 2013 - 2015</p></center>
	</div><!--end wrapper-blog -->
	</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
