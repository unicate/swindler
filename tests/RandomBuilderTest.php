<?php


use Unicate\Swindler\Core\RandomBuilder;
use Unicate\Swindler\Core\Randomizer;
use PHPUnit\Framework\TestCase;
use Unicate\Swindler\Plugins\SamplePlugin\AddressPlugin;

class RandomBuilderTest extends TestCase {

    private $builder;

    protected function setUp() {
        parent::setUp();
        $randomizer = new Randomizer(123456);
        $this->builder = new RandomBuilder($randomizer);
    }

    protected function tearDown() {
        parent::tearDown();
    }


    public function testClear() {
        $str = $this->builder->add('abc')->clear();
        $this->assertEquals('', $str);

    }

    public function testToString() {
        $str = $this->builder->add('abc')->toString();
        $this->assertEquals('abc', $str);
    }

    public function testAddRandDateTime() {
        $date = (string)$this->builder->addRandDateTime(
            '18.07.2021 13:00',
            '18.07.2021 13:05'
        );
        $this->assertEquals('18.07.2021 13:04', $date);

        $date = $this->builder->addRandDateTime(
            '01.01.2021',
            '31.12.2021',
            'd.m.y'
        )->toString();
        $this->assertEquals('07.07.21', $date);

        $date = (string)$this->builder->addRandDateTime(
            '13:00',
            '14:00',
            'H:i'
        );
        $this->assertEquals('13:58', $date);
    }

    public function testAdd() {
        $str = $this->builder->add('abc')->add('def')->toString();
        $this->assertEquals('abcdef', $str);

        $str = $this->builder->add('ghi')->add('jkl')->toString();
        $this->assertEquals('ghijkl', $str);
    }

    public function testAddRandString() {
        $str = $this->builder->addRandString(15, 15, 'AbCd')->toString();
        $this->assertEquals('CddbbddCdbbCbAA', $str);
        $this->assertEquals(15, strlen($str));

        $str = $this->builder->addRandString(1, 15, 'AbCd')->toString();
        $this->assertEquals('db', $str);
        $this->assertEquals(2, strlen($str));

        $str = $this->builder->addRandString(4, 4, 'AbCd')->toString();
        $this->assertEquals('bbbA', $str);
        $this->assertEquals(4, strlen($str));

        $str = $this->builder->addRandString(4, 4, 'AbCd')->toString();
        $this->assertEquals('AACA', $str);
        $this->assertEquals(4, strlen($str));
    }

    public function testAddRandNumber() {
        $str = $this->builder->addRandNumber(0, 1000)->toString();
        $this->assertEquals('868', $str);

        $str = $this->builder->addRandNumber(0, 1000, 10)->toString();
        $this->assertEquals('0000000515', $str);
        $this->assertEquals(10, strlen($str));
    }

    public function testAddRandStringUC() {
        $str = $this->builder->addRandStringUC(50, 50, 'abcd')->toString();
        $this->assertEquals('CDDBBDDCDBBCBAAADBABBBAAAACADCDDADDCADDAAABAACBCCD', $str);
        $this->assertEquals(50, strlen($str));
    }

    public function testAddRandStringUCFirst() {
        $str = $this->builder->addRandStringUCFirst(11, 25)->toString();
        $this->assertEquals('Ayunpuogwrtcrilgtxetuxcg', $str);
    }

    public function testAddRandStringLC() {
        $str = $this->builder->addRandStringLC(10, 15, 'ABCD')->toString();
        $this->assertEquals('cddbbddcdbbcbaa', $str);
        $this->assertEquals(15, strlen($str));
    }

    public function testAddArrayEntry() {
        $str = $this->builder->addArrayEntry(['a', 'b', 'c'])->toString();
        $this->assertEquals('c', $str);
    }

    public function test__toString() {
        $str = (string)$this->builder->addRandString(15, 15, 'AbCd');
        $this->assertEquals('CddbbddCdbbCbAA', $str);
    }

    public function testPhoneNumber() {
        $str = $this->builder
            ->addArrayEntry(['+41 76', '+41 (0) 76', '078', '0041 79'])
            ->add(' ')
            ->addRandNumber(100, 999)
            ->add(' ')
            ->addRandNumber(0, 99, 2)
            ->add(' ')
            ->addRandNumber(0, 99, 2)
            ->toString();

        $this->assertEquals('0041 79 563 96 89', $str);

        $str = $this->builder
            ->addArrayEntry(['+41 76', '+41 (0) 76', '078', '0041 79'])
            ->add(' ')
            ->addRandNumber(100, 999)
            ->add(' ')
            ->addRandNumber(0, 99, 2)
            ->add(' ')
            ->addRandNumber(0, 99, 2)
            ->toString();

        $this->assertEquals('+41 (0) 76 360 89 77', $str);
    }

    public function testEmail() {
        $str = $this->builder
            ->addRandStringLC(3, 31, Randomizer::$DEFAULT_ALPHA)
            ->addArrayEntry(['', '-', '_', '.'])
            ->addRandStringLC(3, 32, Randomizer::$DEFAULT_ALPHA)
            ->add('@')
            ->addArrayEntry(['example.com', 'example.org', 'example.net', 'example.edu', 'example.de'])
            ->toString();

        $this->assertEquals('ayunpuogwrtcrilgtxetuxcgdhhj.rncosebtrhjmqhdeydlwsv@example.org', $str);
    }

    public function testPhone() {
            $normal = $this->builder
                ->addArrayEntry(['+41 52', '+41 (0) 52', '052'])
                ->add(' ')
                ->addRandNumber(100, 999)
                ->add(' ')
                ->addRandNumber(0, 99, 2)
                ->add(' ')
                ->addRandNumber(0, 99, 2)
                ->toString();

            $free = $this->builder
                ->addArrayEntry(['0800', '0900'])
                ->add(' ')
                ->addRandNumber(0, 999, 3)
                ->add(' ')
                ->addRandNumber(0, 999, 3)
                ->toString();

            $result = $this->builder
                ->addArrayEntry([$normal, $free])->toString();

        $this->assertEquals('0800 289 897', $result);
    }

}
