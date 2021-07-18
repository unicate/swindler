<?php


use Unicate\Swindler\Core\Randomizer;
use PHPUnit\Framework\TestCase;

class RandomStringTest extends TestCase {

    public function testMobilePhoneNo() {
        $rand = new Randomizer();
        $n = 0;
        while ($n < 100) {
            echo $rand
                ->set('+41 ')
                ->chooseOne(['76', '78', '79'])
                ->set(' ')
                ->setNumber(100, 999)
                ->set(' ')
                ->setNumber(0, 99, 2)
                ->set(' ')
                ->setNumber(0, 99, 2)
                ->toString();
            echo " \n";
            $n++;
        }
        $this->assertEquals(1, 1);
    }

    public function testMail() {
        $n = 0;
        $rand = new Randomizer();
        while ($n < 100) {
            echo (string)$rand
                ->setStringLC(3, 10)
                ->set('.')
                ->setStringLC(5, 20)
                ->set('@example')
                ->chooseOne(['.com', '.org', '.info']);
            echo " \n";
            $n++;
        }
        $this->assertEquals(1, 1);
    }


    public function testDates() {
        $rand = new Randomizer();
        echo (string)$rand
            ->set('Some Date: ')
            ->setDateTime('01.07.2021', '10.07.2022', 'Y-m-d H:i')
            ->set(' Some Time: ')
            ->setDateTime('08:00', '22:30', 'H:i')
            ->set(' Some other: ')
            ->setDateTime('01.07.2021 08:00', '03.07.2021 22:30');
        echo " \n";

        $this->assertEquals(1, 1);
    }

}
