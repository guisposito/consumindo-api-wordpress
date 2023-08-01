<?php
get_header();

$request = wp_remote_get( 'https://hml-likluc-blog.seodev.ambienteseo.com.br/wp-json/wp/v2/posts' );

if ( ! is_wp_error( $request ) ) {
    
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
 
    
    if ( ! is_wp_error( $data ) ) {
	    ?> <ul> <?php
	    foreach( $data as $rest_post ) {
		    ?> <li> <?php
			    echo '<a href="' . esc_url( $rest_post->link ) . '">' . $rest_post->title->rendered . '</a>';
		    ?> </li> <?php
	    }
	    ?> </ul> <?php
    }
}


get_footer();

?>