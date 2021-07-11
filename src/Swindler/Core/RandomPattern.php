<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;


class RandomPattern {
    public static $DEFAULT_ALPHA = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    public static $DEFAULT_ALPHANUMERIC = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    public static $DEFAULT_SPECIALCHAR = 'äöüàéèÄÖÜÀÉÈ*@|#+-_!?.,:;';
    public static $VOWELS = 'aeiou';
    //public static $CONSONANTS = 'bcdfgjklmnpqstvxzhrwy';
    public static $CONSONANTS = 'bcdfgklmnpstvhrw';

    private static $DEFAULT_DATE_PATTERN = 'd.m.Y H:i';

    private $string;
    private $chars;


    public function __construct($chars = null) {
        if (empty($chars)) {
            $this->chars = self::$DEFAULT_ALPHA;
        } else {
            $this->chars = $chars;
        }
        $this->seed();
    }

    public function set($string): RandomPattern {
        $this->string .= $string;
        return $this;
    }

    private function generateString($minLength, $maxLength): string {
        $str = '';
        $length = $this->random($minLength, $maxLength - 1);
        for ($i = 0; $i < $length; $i++) {
            $pos = $this->random(0, strlen($this->chars) - 1);
            $str .= substr($this->chars, $pos, 1);
        }
        return $str;
    }

    /**
     * @see https://en.wikipedia.org/wiki/Phonotactics#English_phonotactics
     * @see https://en.wikipedia.org/wiki/Consonant_cluster#English
     * https://www.yourlocalunitedway.org/sites/main/files/3-common_syllables_packet.pdf
     * https://atlasabe.org/wp-content/uploads/2019/04/102-Most-Common-Syllables.pdf
     * https://www.surnamemap.eu/unitedkingdom/most_common_surnames_ranking.php
     * https://forebears.io/europe/surnames
     * @param $minLength
     * @param $maxLength
     * @return string
     */


    public function setString($minLength, $maxLength): RandomPattern {
        $this->string .= $this->generateString($minLength, $maxLength);
        return $this;
    }

    public function setStringUC($minLength, $maxLength): RandomPattern {
        $this->string .= strtoupper($this->generateString($minLength, $maxLength));
        return $this;
    }

    public function setStringLC($minLength, $maxLength): RandomPattern {
        $this->string .= strtolower($this->generateString($minLength, $maxLength));
        return $this;
    }

    public function setStringUCFirst($minLength, $maxLength): RandomPattern {
        $this->string .= ucfirst(strtolower($this->generateString($minLength, $maxLength)));
        return $this;
    }

    public function setNumber($from, $to, $pad = 0): RandomPattern {
        $number = (string)$this->random($from, $to);
        if ($pad > 0) {
            $this->string .= str_pad($number, $pad, "0", STR_PAD_LEFT);
        } else {
            $this->string .= $number;
        }
        return $this;
    }

    public function chooseOne($choiceArray): RandomPattern {
        $pos = $this->random(0, count($choiceArray) - 1);
        $this->string .= $choiceArray[$pos];
        return $this;
    }


    public function setDateTime($dateFrom, $dateTo, $format = null): RandomPattern {
        $min = strtotime($dateFrom);
        $max = strtotime($dateTo);
        $format = empty($format) ? self::$DEFAULT_DATE_PATTERN : $format;

        $val = $this->random($min, $max);

        $this->string .= date($format, $val);
        return $this;
    }

    public function clear(): RandomPattern {
        $this->string = '';
        return $this;
    }

    public function __toString(): string {
        return $this->toString();
    }

    public function toString(): string {
        $str = $this->string;
        $this->clear();
        return $str;
    }


    private function random($from, $to) :int{
        return mt_rand($from, $to);
    }

    private function seed() {
        $seed = 3240238479;
        mt_srand((int) $seed, MT_RAND_PHP);
    }


}

