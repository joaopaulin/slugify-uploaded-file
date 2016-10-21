<?php

/*
Plugin Name: Slugify Uploaded Files
Description: Rename every uploaded file name into a slug format.
Version:     1.0
Author:      João Paulin
Author URI:  http://joaopaulin.com.br
*/

function slugify_uploaded_files( $filename, $filename_raw ) {

	$info 	= pathinfo( $filename );
	$ext  	= empty( $info['extension'] ) ? '' : '.' . $info['extension'];
	$new 	= sanitize_title( $info['filename'] ) . $ext;

	if ( $new != $filename_raw ) {
		$new = sanitize_file_name( $new );
	}

	return $new;

}

add_action( 'sanitize_file_name', 'slugify_uploaded_files', 10, 2 );