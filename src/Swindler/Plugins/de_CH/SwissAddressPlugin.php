<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Plugins\de_CH;

use Unicate\Swindler\Core\DataTypes\AddressInterface;
use Unicate\Swindler\Core\PluginInterface;
use Unicate\Swindler\Core\Randomizer;
use Unicate\Swindler\Core\DataTypes\Address;

class SwissAddressPlugin implements PluginInterface {

    private Randomizer $randomizer;
    private array $data;

    public function __construct(Randomizer $randomizer) {
        $this->randomizer = $randomizer;
        $this->data = $this->loadJson()['data'];
    }

    private function loadJson(): array {
        $content = file_get_contents(__DIR__ . '/data/adresses.json');
        return json_decode($content, true);
    }

    public function getData(): Address {
        $randAddress = $this->randomizer->getArrayEntry($this->data);

        $address = new Address();;
        $address->setStreet($randAddress['STRNAME']);
        $address->setStreetNo($randAddress['DEINR']);
        $address->setPlace($randAddress['DPLZNAME']);
        $address->setZipCode($randAddress['DPLZ4']);
        $address->setCountry('CH');

        return $address;
    }


}