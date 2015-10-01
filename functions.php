//* Enqueue scripts for backstretch
add_action( 'wp_enqueue_scripts', 'whitespace_featured_post_enqueue_scripts' );
function whitespace_featured_post_enqueue_scripts() {
	
	$image = get_option( 'whitespace-home-image', sprintf( '%s/images/welcome.jpg', get_stylesheet_directory_uri() ) );
	
	//* Load scripts only if custom backstretch image is being used
	if ( is_singular( array( 'post', 'page' ) ) && has_post_thumbnail() ) {

		//* Enqueue Backstretch scripts
		wp_enqueue_script( 'whitespace-backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_script( 'whitespace-backstretch-set', get_bloginfo('stylesheet_directory').'/js/backstretch-set.js' , array( 'jquery', 'whitespace-backstretch' ), '1.0.0' );

		$image = array( 'src' => has_post_thumbnail() ? genesis_get_image( array( 'format' => 'url' ) ) : '' );
		wp_localize_script( 'whitespace-backstretch-set', 'BackStretchImg', $image );
	
	}

}

//* Display featured image before single post title
add_action( 'genesis_before_entry', 'featured_post_image', 8 );
function featured_post_image() {
	if ( is_singular( 'post' ) || ( is_singular( 'page' ) && has_post_thumbnail() ) ) {
		
		echo '<div class="welcome"></div>';
	
	}
}
