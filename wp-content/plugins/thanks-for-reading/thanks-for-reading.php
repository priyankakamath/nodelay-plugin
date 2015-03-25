<?php
/*
*Plugin Name: Thanks for Reading
*/

add_filter( 'the_content', 'tfr_the_content' );
function tfr_the_content( $content) {

	return $content . '<p>Thanks for reading!</p>';
}

?>