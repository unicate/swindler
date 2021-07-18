<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Locales\de_CH;

use Unicate\Swindler\Core\AddressInterface;

class Address implements AddressInterface {

    private $data;

    private $street;
    private $streetNo;
    private $zipCode;
    private $place;

    /**
     * Address constructor.
     */
    public function __construct() {
        $f_contents = file_get_contents(__DIR__ . "/data/adresses.json");
        $arr = json_decode($f_contents, true);
        $this->data = $arr['data'];
    }

    public function loadRandomAddress(): AddressInterface {

        $pos = mt_rand(0, count($this->data) - 1);
        $randAddress = $this->data[$pos];

        $mapColumn = [
            'place' => 'DPLZNAME',
            'zipCode' => 'DPLZ4',
            'street' => 'STRNAME',
            'streetNo' => 'DEINR'
        ];

        foreach ($mapColumn as $key => $value) {
            $this->$key = $randAddress[$value];
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string {
        return !empty ($this->street) ? $this->street : '';
    }

    /**
     * @return string
     */
    public function getStreetNo(): string {
        return !empty ($this->streetNo) ? $this->streetNo : '';
    }

    /**
     * @return string
     */
    public function getZipCode(): string {
        return !empty ($this->zipCode) ? $this->zipCode : '';
    }

    /**
     * @return string
     */
    public function getPlace(): string {
        return !empty ($this->place) ? $this->place : '';
    }


}