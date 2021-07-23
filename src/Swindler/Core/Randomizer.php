<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;

/**
 * Class Randomizer
 * @package Unicate\Swindler\Core
 */
class Randomizer {
    /**
     * @var string
     */
    public static $DEFAULT_ALPHA = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @var string
     */
    public static $DEFAULT_ALPHANUMERIC = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /**
     * @var string
     */
    public static $DEFAULT_SPECIALCHAR = 'äöüàéèÄÖÜÀÉÈ*@|#+-_!?.,:;';

    /**
     * @var string
     */
    public static $DEFAULT_DATE_PATTERN = 'd.m.Y H:i';

    /**
     * @var
     */
    private $output;

    /**
     * Randomizer constructor.
     * @param int $seed
     */
    public function __construct(int $seed = null) {
        if (!is_null($seed)){
            $this->seed($seed);
        }
    }

    private function seed($seed) {
        mt_srand((int)$seed, MT_RAND_PHP);
    }

    /**
     * @param $from
     * @param $to
     * @return int
     */
    public function getInt($from, $to): int {
        return mt_rand($from, $to);
    }

    /**
     * @param $minLength
     * @param $maxLength
     * @param string $chars
     * @return string
     */
    public function getString($minLength, $maxLength, $chars = null): string {
        $chars = (empty($chars) ? self::$DEFAULT_ALPHA : $chars);
        $str = '';
        $length = $this->getInt($minLength, $maxLength);
        for ($i = 0; $i < $length; $i++) {
            $pos = $this->getInt(0, strlen($chars) - 1);
            $str .= substr($chars, $pos, 1);
        }
        return $str;
    }

    /**
     * @param $array
     * @return mixed
     */
    public function getArrayEntry($array) {
        $pos = $this->getInt(0, count($array) - 1);
        return $array[$pos];
    }

    /**
     * @param $dateFrom
     * @param $dateTo
     * @param null $format
     * @return string
     */
    public function getDateTime($dateFrom, $dateTo, $format = null): string {
        $min = strtotime($dateFrom);
        $max = strtotime($dateTo);
        $format = empty($format) ? self::$DEFAULT_DATE_PATTERN : $format;

        $val = $this->getInt($min, $max);

        return date($format, $val);
    }


}

