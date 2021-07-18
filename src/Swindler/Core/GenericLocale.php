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
    protected $address;

    public function __construct(Randomizer $randomPattern, AddressInterface $address) {
        $this->randomPattern = $randomPattern;
        $this->address = $address;

    }
}