<?php
use PHPUnit\Framework\TestCase;
use ND\Cedric\Source;
use ND\Cedric\Propel\InstallationClasseeQuery;

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

	public function testLectureFiche() {
		$source = new Source();
		$ic = InstallationClasseeQuery::create()->findPK("0051.05437");
		$fiche = $source->parseFicheHtml(file_get_contents("tests/fiche.html"));
		$rDocs = $source->saveDocuments($ic, $fiche['docs']);
		$this->assertEquals(0, $rDocs[0]);
		$this->assertEquals(3, $rDocs[1]);
		$rDocs = $source->saveDocuments($ic, $fiche['docs']);
		$this->assertEquals(3, $rDocs[0]);
		$this->assertEquals(0, $rDocs[1]);

		$rCats = $source->saveCategories($ic, $fiche['cats']);
		$this->assertEquals(0, $rCats[0]);
		$this->assertEquals(10, $rCats[1]);
	}
}
