<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;


use Unicate\Swindler\Locales\de_CH\Address;

class Factory {

    public static function create($locale = 'de_CH'): LocaleInterface {
        $localeClass = self::getLocaleClass($locale);
        $rp = new RandomPattern();
        $addr = new Address();
        return new $localeClass($rp, $addr);

    }

    private static function getLocaleClass(string $locale): string {
        $className = sprintf('\Unicate\Swindler\Locales\%s\Locale', $locale);
        if (class_exists($className, true)) {
            return $className;
        } else {
            throw new \InvalidArgumentException(sprintf('Unable to find class "%s".', $className));
        }

    }

}