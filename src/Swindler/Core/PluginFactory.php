<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;

class PluginFactory {

    public static function create($pluginClass): PluginInterface {
        if (class_exists($pluginClass, true)) {
            $randomizer = new Randomizer();
            return new $pluginClass($randomizer);
        } else {
            throw new \InvalidArgumentException(sprintf('Unable to find Plugin "%s".', $pluginClass));
        }

    }


}