<?php

declare( strict_types = 1 );
namespace WaughJ\WPTagLink
{
	use \WaughJ\HTMLLink\HTMLLink;
	use function WaughJ\TestHashItem\TestHashItemExists;
	use function WaughJ\TestHashItem\TestHashItemString;

	class WPTagLink extends HTMLLink
	{
		public function __construct( array $atts )
		{
			$tag = self::GetTagID( $atts );
			if ( $tag !== null )
			{
				$atts[ 'href' ] = get_tag_link( $tag->term_id );
				$atts[ 'value' ] = TestHashItemExists( $atts, 'value', $tag->title );
			}
			else
			{
				$atts[ 'href' ] = TestHashItemExists( $atts, 'href', TestHashItemString( $atts, 'slug', '' ) );
				$atts[ 'value' ] = TestHashItemExists( $atts, 'value', $atts[ 'href' ] );
			}

			$href = $atts[ 'href' ];
			$value = $atts[ 'value' ];
			parent::__construct( $href, $value, $atts );
		}

		private static function GetTagID( array $atts )
		{
			$tag = ( isset( $atts[ 'slug' ] ) ) ? get_term_by( 'slug', $atts[ 'slug' ], 'post_tag' ) : false;
			return ( $tag !== false ) ? $tag : null;
		}
	}
}
