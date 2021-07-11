<?php

use PHPUnit\Framework\TestCase;
use Unicate\Swindler\Core\Factory;

class SwindlerTest extends TestCase {

    public function testGetSurname_de_CH() {
        $n = 0;
        $swindler = Factory::create();
        while ($n < 100) {
            echo $swindler->getSurname() . " \n";
            $n++;
        }
        $this->assertEquals(1, 1);
    }


    public function testGetSurname_de_DE() {
        $n = 0;
        $swindler = Factory::create('de_DE');
        while ($n < 100) {
            echo $swindler->getSurname() . " \n";
            $n++;
        }
        $this->assertEquals(1, 1);
    }


}
