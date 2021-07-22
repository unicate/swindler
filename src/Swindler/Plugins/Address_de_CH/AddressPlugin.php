<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Plugins\Address_de_CH;

use Unicate\Swindler\Core\PluginInterface;
use Unicate\Swindler\Core\Randomizer;
use Unicate\Swindler\Core\DataTypes\Address;

class AddressPlugin implements PluginInterface {

    private Randomizer $randomizer;

    public function __construct(Randomizer $randomizer) {
        $this->randomizer = $randomizer;
    }

    public function getData(): Address {
        $addr = new Address();
        $addr->loadRandomAddress();
        return $addr;
    }


}