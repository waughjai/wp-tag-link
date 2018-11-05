<?php

require_once( 'MockWordPress.php' );

use PHPUnit\Framework\TestCase;
use WaughJ\WPTagLink\WPTagLink;

class WPTagLinkTest extends TestCase
{
	public function testObjectWorks() : void
	{
		$object = new WPTagLink([]);
		$this->assertTrue( is_object( $object ) );
	}

	public function testTagLink() : void
	{
		$term = $this->getRandomTerm();
		$link = new WPTagLink( [ 'slug' => $term[ 'slug' ] ] );
		$this->assertEquals( '<a href="' . $term[ 'url' ] . '">' . $term[ 'name' ] . '</a>', $link->getHTML() );
	}

	public function testTagLinkAltValue() : void
	{
		$term = $this->getRandomTerm();
		$link = new WPTagLink( [ 'slug' => $term[ 'slug' ], 'value' => '345ghsdfh' ] );
		$this->assertEquals( '<a href="' . $term[ 'url' ] . '">345ghsdfh</a>', $link->getHTML() );
	}

	private function getRandomTerm() : array
	{
		$n = rand( 0, count( TERMS ) - 1 );
		return TERMS[ $n ];
	}
}
