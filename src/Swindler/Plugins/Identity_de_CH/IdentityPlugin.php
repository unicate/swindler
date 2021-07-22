<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Plugins\Identity_de_CH;

use Unicate\Swindler\Core\PluginInterface;
use Unicate\Swindler\Core\Randomizer;
use Unicate\Swindler\Core\DataTypes\Identity;

class IdentityPlugin implements PluginInterface {

    private Randomizer $randomizer;
    /**
     * AddressPlugin constructor.
     */
    public function __construct(Randomizer $randomizer) {
        $this->randomizer = $randomizer;
    }

    public function getData() : Identity {
        return new Identity();
    }



}