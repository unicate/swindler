<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core\DataTypes;

/**
 * Class Address
 * @package Unicate\Swindler\Core\DataTypes
 */
class Address {

    /**
     * @var string
     */
    private string $street;

    /**
     * @var string
     */
    private string $streetNo;

    /**
     * @var string
     */
    private string $zipCode;

    /**
     * @var string
     */
    private string $place;

    /**
     * @var string
     */
    private string $country;

    /**
     * @return string
     */
    public function getStreet(): string {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getStreetNo(): string {
        return $this->streetNo;
    }

    /**
     * @param string $streetNo
     */
    public function setStreetNo(string $streetNo): void {
        $this->streetNo = $streetNo;
    }

    /**
     * @return string
     */
    public function getZipCode(): string {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getPlace(): string {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace(string $place): void {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void {
        $this->country = $country;
    }

}