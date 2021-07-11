<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;


class Factory {

    public static function create($locale = 'de_CH'): LocaleInterface {
        $localeClass = '\Unicate\Swindler\Locales\\' . $locale . '\Locale';
        $rp = new RandomPattern();
        echo __NAMESPACE__;
        return new $localeClass($rp);

    }

}