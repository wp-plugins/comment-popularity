<?php
/**
 * Helper functions for use in themes.
 */

/**
 * Displays the voting arrows and karma.
 */
function hmn_cp_the_comment_upvote_form() {

	if ( class_exists( 'HMN_Comment_Popularity' ) ) {

		$hmn_cp_obj = HMN_Comment_Popularity::get_instance();

		$hmn_cp_obj->render_ui( get_comment_ID() );

	}

}

/**
 * Displays the author karma.
 */
function hmn_cp_the_comment_author_karma() {

	if ( class_exists( 'HMN_Comment_Popularity' ) ) {

		$hmn_cp_obj = HMN_Comment_Popularity::get_instance();

		$author_karma = $hmn_cp_obj->get_comment_author_karma( get_comment_author_email( get_comment_ID() ) );

		if ( isset( $author_karma ) ) {
			echo '<small class="user-karma">(User Karma: ' . esc_html( $author_karma ) . ')</small>';
		}

	}

}

/**
 * Displays the post comments sorted by weight/karma DESC.
 *
 * @param array $args
 * @param null  $comments
 */
function hmn_cp_the_sorted_comments( $args = array() ) {

	global $post;
	if ( ! array_key_exists( 'post_id', $args ) ) {
		$args['post_id'] = $post->ID;
	}

	if ( class_exists( 'HMN_Comment_Popularity' ) ) {

		$hmn_cp_obj = HMN_Comment_Popularity::get_instance();

		echo $hmn_cp_obj->get_comments_sorted_by_weight( true, $args );

	}

}
