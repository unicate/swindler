<?php

namespace Unicate\Swindler\Plugins\SamplePlugin;

use Unicate\Swindler\Core\Randomizer;
use PHPUnit\Framework\TestCase;

class RandomizerTest extends TestCase {

    private $randomizer;

    protected function setUp() {
        parent::setUp();
        $this->randomizer = new Randomizer(123456);
    }

    protected function tearDown() {
        parent::tearDown();
    }

    public function testGetArrayEntry() {
        $entry = $this->randomizer->getArrayEntry(['a', 'b', 'c', 'd']);
        $this->assertEquals('d', $entry);

        $entry = $this->randomizer->getArrayEntry(['a', 'b', 'c', 'd']);
        $this->assertEquals('c', $entry);
    }

    public function testGetInt() {
        $int = $this->randomizer->getInt(1, 1000);
        $this->assertEquals(868, $int);

        $int = $this->randomizer->getInt(-1000, 0);
        $this->assertEquals(-485, $int);
    }

    public function testGetString() {
        $str = $this->randomizer->getString(10, 10);
        $this->assertEquals(10, strlen($str));

        $str = $this->randomizer->getString(1, 30);
        $this->assertEquals('CrilgTxetuxc', $str);

        $str = $this->randomizer->getString(5, 5, 'ab');
        $this->assertEquals('aabab', $str);

    }

    public function testGetDateTime() {
        $date = $this->randomizer->getDateTime(
            '18.07.2021 13:00',
            '18.07.2021 13:05'
        );
        $this->assertEquals('18.07.2021 13:04', $date);

        $date = $this->randomizer->getDateTime(
            '01.01.2021',
            '31.12.2021',
            'd.m.y'
        );
        $this->assertEquals('07.07.21', $date);

        $date = $this->randomizer->getDateTime(
            '13:00',
            '14:00',
            'H:i'
        );
        $this->assertEquals('13:58', $date);
    }
}
