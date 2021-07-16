<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;


use Unicate\Swindler\Core\Address;

interface LocaleInterface {

    public function getSurname(): string;

    public function getFirstname(): string;

    public function getStreet(): string;

    public function getDateOfBirth(): string;

    public function getCity(): string;

    public function getZIP(): string;

    public function getCountry(): string;

    public function getMobileNo(): string;

    public function getPhoneNo(): string;

    public function getAddress(): AddressInterface;

    /*
     * Amount
     * Person
     */

}