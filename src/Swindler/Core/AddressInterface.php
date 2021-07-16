<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;

interface AddressInterface {

    public function getStreet(): string;

    public function getStreetNo(): string;

    public function getZipCode(): string;

    public function getPlace(): string;

    public function loadRandomAddress(): AddressInterface;

}