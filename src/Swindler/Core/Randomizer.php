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
    public static string $DEFAULT_ALPHA = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @var string
     */
    public static string $DEFAULT_ALPHANUMERIC = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /**
     * @var string
     */
    public static string $DEFAULT_SPECIALCHAR = 'äöüàéèÄÖÜÀÉÈ*@|#+-_!?.,:;';

    /**
     * @var string
     */
    public static string $DEFAULT_DATE_PATTERN = 'd.m.Y H:i';

    /**
     * @var string
     */
    public static string $DEFAULT_TEXT = "Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";

    /**
     * @var string
     */
    private string $output;

    /**
     * Randomizer constructor.
     * @param int|null $seed
     */
    public function __construct(int $seed = null) {
        if (!is_null($seed)) {
            $this->seed($seed);
        }
    }

    /**
     * @param int $seed
     */
    private function seed(int $seed) {
        mt_srand((int)$seed, MT_RAND_PHP);
    }

    /**
     * @param int $from
     * @param int $to
     * @return int
     */
    public function getInt(int $from, int $to): int {
        if ($from > $to) {
            throw new \InvalidArgumentException(sprintf('Integer value $from (%s) is higher than $to (%s).', $from, $to));
        }
        return mt_rand($from, $to);
    }

    /**
     * @param int $minLength
     * @param int $maxLength
     * @param string|null $chars
     * @return string
     */
    public function getString(int $minLength, int $maxLength, string $chars = null): string {
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
     * @param int $minLength
     * @param int $maxLength
     * @param string|null $text
     * @return string
     */
    public function getText(int $minLength, int $maxLength, string $text = null): string {
        // Get text and convert it to array.
        $text = (empty($text) ? self::$DEFAULT_TEXT : $text);
        $word_array = explode(' ', $text);

        // Get random number of words in text.
        $word_array_count = count($word_array);
        $maxLength = ($maxLength > $word_array_count) ? $word_array_count : $maxLength;
        $length = $this->getInt($minLength, $maxLength);
        $word_array = array_slice($word_array, 0, $length);

        // Convert array to text.
        $text = implode(' ', $word_array);

        // Define text ending. Replace punctuation with full stop.
        $lastChar = substr($text, -1);
        if (strpos('.!?:;,', $lastChar) === false) {
            $text = $text . '.';
        } else {
            $text = substr($text, 0, -1) . '.';
        }
        return $text;
    }

    /**
     * @param array $array
     * @return mixed
     */
    public function getArrayEntry(array $array) {
        $pos = $this->getInt(0, count($array) - 1);
        return $array[$pos];
    }

    /**
     * @param string $dateFrom
     * @param string $dateTo
     * @param string|null $format
     * @return string
     */
    public function getDateTime(string $dateFrom, string $dateTo, string $format = null): string {
        $min = strtotime($dateFrom);
        $max = strtotime($dateTo);
        $format = empty($format) ? self::$DEFAULT_DATE_PATTERN : $format;

        $val = $this->getInt($min, $max);

        return date($format, $val);
    }

}

