<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Locales\de_DE;

use Unicate\Swindler\Core\GenericLocale;
use Unicate\Swindler\Core\LocaleInterface;

class Locale extends GenericLocale implements LocaleInterface {

    public function getSurname(): string {
        $lastName = array(
            'Müller', 'Schmitt'
        );
        return $this->randomPattern->chooseOne($lastName)->toString();
    }

    public function getFirstname(): string {
    }

    public function getStreet(): string {

    }

    public function getDateOfBirth(): string {

    }

    public function getCity(): string {

    }

    public function getZIP(): string {

    }

    public function getCountry(): string {

    }

    public function getMobileNo(): string {

    }

    public function getPhoneNo(): string {

    }


}