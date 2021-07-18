<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;

/**
 * Class RandomOut
 * @package Unicate\Swindler\Core
 */
class RandomBuilder {

    /**
     * @var
     */
    private $randomizer;

    /**
     * @var
     */
    private $out;

    /**
     * RandomOut constructor.
     */
    public function __construct(Randomizer $randomizer) {
        $this->randomizer = $randomizer;
    }


    /**
     * @param $string
     * @return $this
     */
    public function add($string): RandomBuilder {
        $this->out .= $string;
        return $this;
    }

    public function addRandString($minLength, $maxLength, $chars = null): RandomBuilder {
        return $this->add($this->randomizer->getString($minLength, $maxLength, $chars));
    }

    public function addRandStringUC($minLength, $maxLength, $chars = null): RandomBuilder {
        return $this->add(strtoupper($this->randomizer->getString($minLength, $maxLength, $chars)));
    }

    public function addRandStringLC($minLength, $maxLength, $chars = null): RandomBuilder {
        return $this->add(strtolower($this->randomizer->getString($minLength, $maxLength, $chars)));
    }

    public function addRandStringUCFirst($minLength, $maxLength, $chars = null): RandomBuilder {
        $str = $this->randomizer->getString($minLength, $maxLength, $chars);
        return $this->add(ucfirst(strtolower($str)));
    }

    public function addRandNumber($from, $to, $pad = 0): RandomBuilder {
        $number = (string)$this->randomizer->getInt($from, $to);
        if ($pad > 0) {
            $this->add(str_pad($number, $pad, "0", STR_PAD_LEFT));
        } else {
            $this->add($number);
        }
        return $this;
    }

    public function addRandDateTime($dateFrom, $dateTo, $format = null): RandomBuilder {
        $this->add($this->randomizer->getDateTime($dateFrom, $dateTo, $format));
        return $this;
    }

    public function clear(): RandomBuilder {
        $this->out = '';
        return $this;
    }

    public function __toString(): string {
        return $this->toString();
    }

    public function toString(): string {
        $str = $this->out;
        $this->clear();
        return $str;
    }


}

