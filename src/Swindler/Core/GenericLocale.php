<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;


class GenericLocale {
    protected $randomPattern;

    public function __construct(RandomPattern $randomPattern) {
        $this->randomPattern = $randomPattern;
    }
}