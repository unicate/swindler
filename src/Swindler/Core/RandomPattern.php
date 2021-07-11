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
    }

    public function set($string): RandomPattern {
        $this->string .= $string;
        return $this;
    }

    private function generateString($minLength, $maxLength): string {
        $str = '';
        $length = mt_rand($minLength, $maxLength - 1);
        for ($i = 0; $i < $length; $i++) {
            $pos = mt_rand(0, strlen($this->chars) - 1);
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
    public function generateName(): string {
        $commonSyllables = ['ing', 'er', 'i', 'y', 'ter', 'al', 'ed', 'es', 'e', 'tion', 're', 'o', 'oth', 'ry', 'de', 'ver', 'ex', 'en', 'di', 'bout', 'com', 'ple', 'u', 'con', 'per', 'un', 'der', 'tle', 'ber', 'ty', 'num', 'peo', 'ble', 'af', 'ers', 'mer', 'wa', 'ment', 'pro', 'ar', 'ma', 'ri', 'sen', 'ture', 'fer', 'dif', 'pa', 'tions', 'ther', 'fore', 'est', 'fa', 'la', 'ei', 'not', 'si', 'ent', 'ven', 'ev', 'ac', 'ca', 'fol', 'ful', 'na', 'tain', 'ning', 'col', 'par', 'dis', 'ern', 'ny', 'cit', 'po', 'cal', 'mu', 'moth', 'pic', 'im', 'coun', 'mon', 'pe', 'lar', 'por', 'fi', 'bers', 'sec', 'ap', 'stud', 'ad', 'tween', 'gan', 'bod', 'tence', 'ward', 'hap', 'nev', 'ure', 'mem', 'ters', 'cov', 'ger', 'nit'];
        $commonSurnames = ['smith', 'jones', 'brown', 'taylor', 'wilson', 'davies', 'evans', 'johnson', 'thomas', 'roberts', 'walker', 'wright', 'thompson', 'robinson', 'white', 'hall', 'hughes', 'green', 'edwards', 'martin', 'wood', 'clarke', 'harris', 'jackson', 'lewis', 'clark', 'turner', 'scott', 'hill', 'moore', 'williams', 'cooper', 'ward', 'morris', 'king', 'watson', 'harrison', 'baker', 'young', 'allen', 'morgan', 'anderson', 'mitchell', 'phillips', 'james', 'bell', 'campbell', 'lee', 'kelly', 'davis', 'parker', 'bennett', 'miller', 'shaw', 'cook', 'simpson', 'richardson', 'price', 'marshall', 'collins', 'carter', 'stewart', 'bailey', 'griffiths', 'gray', 'murphy', 'murray', 'cox', 'adams', 'richards', 'graham', 'ellis', 'wilkinson', 'foster', 'russell', 'chapman', 'robertson', 'mason', 'webb', 'rogers', 'powell', 'gibson', 'hunt', 'mills', 'holmes', 'palmer', 'matthews', 'reid', 'fisher', 'barnes', 'knight', 'owen', 'harvey', 'lloyd', 'butler', 'thomson', 'barker', 'pearson', 'stevens', 'jenkins'];
        $startChunks = ['smi', 'jo', 'will', 'tay', 'bro', 'dav', 'eve', 'tho'];
        $endChunks = ['th', 'nes', 'ams', 'lor', 'wn', 'ies', 'ans', 'son', 'mas'];

        $firstChunk = $startChunks[mt_rand(0, count($startChunks) - 1)];
        $lastChunk = $endChunks[mt_rand(0, count($endChunks) - 1)];

        $randomName1 = $commonSurnames[mt_rand(0, count($commonSurnames) - 1)];
        $randomName2 = $commonSurnames[mt_rand(0, count($commonSurnames) - 1)];
        $pos = mt_rand(2, 5);
        $namePart1 = substr($randomName1, 0, $pos);
        $namePart2 = substr($randomName1, $pos);

        $randomSylable = $commonSyllables[mt_rand(0, count($commonSyllables) - 1)];


        $counter = mt_rand(1, 3);
        $middleChunk = '';

        for ($i = 0; $i < $counter; $i++) {
            $middleChunk .= $commonSyllables[mt_rand(0, count($commonSyllables) - 1)];
        }

        $randVowel1 = substr(self::$VOWELS, mt_rand(0, strlen(self::$VOWELS) - 1), 1);
        $randVowel2 = substr(self::$VOWELS, mt_rand(0, strlen(self::$VOWELS) - 1), 1);
        $randConso = substr(self::$CONSONANTS, mt_rand(0, strlen(self::$CONSONANTS) - 1), 1);

        $out = str_replace('e', $randVowel2, $randomName1);
        $out = str_replace('o', $randVowel2, $randomName1);
        $out = str_replace('a', $randVowel2, $randomName1);

        echo $randomName1;

        return '';

    }


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
        $number = (string)mt_rand($from, $to);
        if ($pad > 0) {
            $this->string .= str_pad($number, $pad, "0", STR_PAD_LEFT);
        } else {
            $this->string .= $number;
        }
        return $this;
    }

    public function chooseOne($choiceArray): RandomPattern {
        $pos = mt_rand(0, count($choiceArray) - 1);
        $this->string .= $choiceArray[$pos];
        return $this;
    }


    public function setDateTime($dateFrom, $dateTo, $format = null): RandomPattern {
        $min = strtotime($dateFrom);
        $max = strtotime($dateTo);
        $format = empty($format) ? self::$DEFAULT_DATE_PATTERN : $format;

        $val = mt_rand($min, $max);

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


}

