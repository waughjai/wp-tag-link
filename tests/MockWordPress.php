<?php

	const TERMS =
	[
		[ 'name' => 'Food', 'slug' => 'food', 'url' => 'https://www.food.com' ],
		[ 'name' => 'Clothing', 'slug' => 'clothing', 'url' => 'https://www.clothing.com' ]
	];

	function get_term_by( string $by, string $slug, string $type )
	{
		assert( $by === 'slug' );
		$number_of_terms = count( TERMS );
		for ( $i = 0; $i < $number_of_terms; $i++ )
		{
			if ( TERMS[ $i ][ 'slug' ] === $slug )
			{
				return ( object ) [ 'term_id' => $i, 'title' => TERMS[ $i ][ 'name' ] ];
			}
		}
		return false;
	}

	function get_tag_link( int $id ) : string
	{
		return TERMS[ $id ][ 'url' ];
	}
