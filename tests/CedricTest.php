<?php
use PHPUnit\Framework\TestCase;
use ND\Cedric\Source;

class CedricTest extends TestCase {
	public function testInsertEtabs() {
		$source = new Source();
		list($n, $insert) = $source->updateDb("tests/liste.csv");
		$this->assertEquals(32, $n);
		$this->assertEquals(32, $insert);
		list($n, $insert) = $source->updateDb("tests/liste.csv");
		$this->assertEquals(32, $n);
		$this->assertEquals(0, $insert);
	}
}
