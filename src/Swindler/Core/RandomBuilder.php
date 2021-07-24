<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;

use Unicate\Swindler\Plugins\SamplePlugin\AddressPlugin;

/**
 * Class RandomOut
 * @package Unicate\Swindler\Core
 */
class RandomBuilder {

    /**
     * @var Randomizer
     */
    private Randomizer $randomizer;

    /**
     * @var string
     */
    private string $out;

    /**
     * RandomBuilder constructor.
     * @param Randomizer $randomizer
     */
    public function __construct(Randomizer $randomizer) {
        $this->randomizer = $randomizer;
        $this->out = '';
    }

    /**
     * @param string $string
     * @return $this
     */
    public function add(string $string): RandomBuilder {
        $this->out .= $string;
        return $this;
    }

    /**
     * @param int $minLength
     * @param int $maxLength
     * @param string|null $chars
     * @return $this
     */
    public function addRandString(int $minLength, int $maxLength, string $chars = null): RandomBuilder {
        $str = $this->randomizer->getString($minLength, $maxLength, $chars);
        return $this->add($str);
    }

    /**
     * @param int $minLength
     * @param int $maxLength
     * @param string|null $chars
     * @return $this
     */
    public function addRandStringUC(int $minLength, int $maxLength, string $chars = null): RandomBuilder {
        $str = $this->randomizer->getString($minLength, $maxLength, $chars);
        return $this->add(strtoupper($str));
    }

    /**
     * @param int $minLength
     * @param int $maxLength
     * @param string|null $chars
     * @return $this
     */
    public function addRandStringLC(int $minLength, int $maxLength, string $chars = null): RandomBuilder {
        $str = $this->randomizer->getString($minLength, $maxLength, $chars);
        return $this->add(strtolower($str));
    }

    /**
     * @param int $minLength
     * @param int $maxLength
     * @param string|null $chars
     * @return $this
     */
    public function addRandStringUCFirst(int $minLength, int $maxLength, string $chars = null): RandomBuilder {
        $str = $this->randomizer->getString($minLength, $maxLength, $chars);
        return $this->add(ucfirst(strtolower($str)));
    }

    /**
     * @param int $minLength
     * @param int $maxLength
     * @param string|null $text
     * @return $this
     */
    public function addRandText(int $minLength, int $maxLength, string $text = null) : RandomBuilder{
        $str = $this->randomizer->getText($minLength, $maxLength, $text);
        return $this->add($str);
    }

    /**
     * @param int $from
     * @param int $to
     * @param int $pad
     * @return $this
     */
    public function addRandNumber(int $from, int $to, int $pad = 0): RandomBuilder {
        $number = (string)$this->randomizer->getInt($from, $to);
        if ($pad > 0) {
            $this->add(str_pad($number, $pad, "0", STR_PAD_LEFT));
        } else {
            $this->add($number);
        }
        return $this;
    }

    /**
     * @param array $array
     * @return $this
     */
    public function addArrayEntry(array $array) {
        $this->add($this->randomizer->getArrayEntry($array));
        return $this;
    }

    /**
     * @param string $dateFrom
     * @param string $dateTo
     * @param string|null $format
     * @return $this
     */
    public function addRandDateTime(string $dateFrom, string $dateTo, string $format = null): RandomBuilder {
        $this->add($this->randomizer->getDateTime($dateFrom, $dateTo, $format));
        return $this;
    }

    /**
     * @return $this
     */
    public function clear(): RandomBuilder {
        $this->out = '';
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString(): string {
        $str = $this->out;
        $this->clear();
        return $str;
    }


}

