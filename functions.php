//* Display featured image before single post title
add_action( 'genesis_before_entry', 'featured_post_image', 8 );
function featured_post_image() {
  if ( ! is_singular( 'post' ) )  return;

	the_post_thumbnail( 'welcome', array(
		'before' => '<div class="welcome">',
		'after'  => '</div>',
	) );
}