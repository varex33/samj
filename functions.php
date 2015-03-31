<?php
function cornerstone_entry_meta() {
		// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'cornerstone' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'cornerstone' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'cornerstone' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'cornerstone' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'cornerstone' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'cornerstone' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

/**
 * Recent_Posts widget w/ category exclude class
 * This allows specific Category IDs to be removed from the Sidebar Recent Posts list
 *
 */
class WP_Widget_Recent_Posts_Exclude extends WP_Widget {
 
        function __construct() {
                $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent posts on your site") );
                parent::__construct('recent-posts', __('Recent Posts with Exclude'), $widget_ops);
                $this->alt_option_name = 'widget_recent_entries';
 
                add_action( 'save_post', array(&$this, 'flush_widget_cache') );
                add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
                add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
        }
 
        function widget($args, $instance) {
                $cache = wp_cache_get('widget_recent_posts', 'widget');
 
                if ( !is_array($cache) )
                        $cache = array();
 
                if ( ! isset( $args['widget_id'] ) )
                        $args['widget_id'] = $this->id;
 
                if ( isset( $cache[ $args['widget_id'] ] ) ) {
                        echo $cache[ $args['widget_id'] ];
                        return;
                }
 
                ob_start();
                extract($args);
 
                $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
                if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
                        $number = 10;
                $exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];
 
                $r = new WP_Query(array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'category__not_in' => explode(',', $exclude) ));
                if ($r->have_posts()) :
?>
                <?php //echo print_r(explode(',', $exclude)); ?>
                <?php echo $before_widget; ?>
                <?php if ( $title ) echo $before_title . $title . $after_title; ?>
                <ul>
                <?php  while ($r->have_posts()) : $r->the_post(); ?>
                <li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></li>
                <?php endwhile; ?>
                </ul>
                <?php echo $after_widget; ?>
<?php
                // Reset the global $the_post as this query will have stomped on it
                wp_reset_postdata();
 
                endif;
 
                $cache[$args['widget_id']] = ob_get_flush();
                wp_cache_set('widget_recent_posts', $cache, 'widget');
        }
 
        function update( $new_instance, $old_instance ) {
                $instance = $old_instance;
                $instance['title'] = strip_tags($new_instance['title']);
                $instance['number'] = (int) $new_instance['number'];
                $instance['exclude'] = strip_tags( $new_instance['exclude'] );
                $this->flush_widget_cache();
 
                $alloptions = wp_cache_get( 'alloptions', 'options' );
                if ( isset($alloptions['widget_recent_entries']) )
                        delete_option('widget_recent_entries');
 
                return $instance;
        }
 
        function flush_widget_cache() {
                wp_cache_delete('widget_recent_posts', 'widget');
        }
 
        function form( $instance ) {
                $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
                $number = isset($instance['number']) ? absint($instance['number']) : 5;
                $exclude = esc_attr( $instance['exclude'] );
?>
                <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
 
                <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
               
                <p>
                        <label for="<?php echo $this->get_field_id('exclude'); ?>"><?php _e( 'Exclude Category(s):' ); ?></label> <input type="text" value="<?php echo $exclude; ?>" name="<?php echo $this->get_field_name('exclude'); ?>" id="<?php echo $this->get_field_id('exclude'); ?>" class="widefat" />
                        <br />
                        <small><?php _e( 'Category IDs, separated by commas.' ); ?></small>
                </p>
<?php
        }
}
 
function WP_Widget_Recent_Posts_Exclude_init() {
    unregister_widget('WP_Widget_Recent_Posts');
    register_widget('WP_Widget_Recent_Posts_Exclude');
} 
add_action('widgets_init', 'WP_Widget_Recent_Posts_Exclude_init');
 

?>
