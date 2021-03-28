<?php
/**
 * Blocks
 *
 * @package Aquila
 */

namespace CGR_AWPT\Inc;

use CGR_AWPT\Inc\Traits\Singleton;

class Blocks {
	use Singleton;

	protected function __construct() {

		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_filter( 'block_categories', [ $this, 'add_block_categories' ] );
	}

	/**
	 * Add a block category - puts all blocks under specific category
	 *
	 * @param array $categories Block categories.
	 *
	 * @return array
	 */
	public function add_block_categories( $categories ) {

		$category_slugs = wp_list_pluck( $categories, 'slug' );

		return in_array( 'cgr-awpt', $category_slugs, true ) ? $categories : array_merge(
			$categories,
			[
				[
					'slug'  => 'cgr-awpt',
					'title' => __( 'cgr-awpt Blocks', 'cgr-awpt' ),
					'icon'  => 'table-row-after',
				],
			]
		);

	}

}