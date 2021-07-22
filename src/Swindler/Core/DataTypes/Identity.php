<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core\DataTypes;

class Identity implements IdentityInterface {


    private string $salutation;
    private string $firstName;
    private string $lastName;
    private string $email;


    public function __construct() {
        $this->salutation = 'Herr';
        $this->firstName = 'Raoul';
        $this->lastName = 'Schmid';
        $this->email = 'raoulschmid@bluewin.ch';
    }

    public function getSalutation(): string {
        return $this->salutation;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getEmail(): string {
        return $this->email;
    }


}