<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Locales\de_CH;

use Unicate\Swindler\Core\AddressInterface;
use Unicate\Swindler\Core\GenericLocale;
use Unicate\Swindler\Core\LocaleInterface;

class Locale extends GenericLocale implements LocaleInterface {


    public function getSurname(): string {
        $lastName = array(
            'Achermann', 'Ackermann', 'Aeschlimann', 'Ammann', 'Arnold',
            'Bachmann', 'Baumann', 'Baumgartner', 'Beck', 'Benz', 'Berger', 'Betschart', 'Bieri', 'Bischof', 'Blaser', 'Blum', 'Bolliger', 'Bosshard', 'Brunner', 'Bucher', 'Burri', 'Bärtschi', 'Bösch', 'Bühler', 'Bühlmann', 'Bürgi', 'Bürki',
            'Christen',
            'Eberle', 'Egger', 'Egli', 'Eichenberger', 'Erni', 'Eugster',
            'Fankhauser', 'Fehr', 'Fischer', 'Flury', 'Flückiger', 'Frei', 'Frey', 'Friedli', 'Frischknecht', 'Fuchs', 'Furrer', 'Fässler',
            'Gasser', 'Gerber', 'Giger', 'Gisler', 'Gloor', 'Graber', 'Graf', 'Grob', 'Gut',
            'Haas', 'Haller', 'Hartmann', 'Hasler', 'Hauser', 'Heiniger', 'Herzog', 'Hess', 'Hofer', 'Hofmann', 'Hofstetter', 'Hostettler', 'Huber', 'Hug', 'Hunziker', 'Häfliger', 'Hänni', 'Hürlimann',
            'Imhof', 'Iten',
            'Jenni', 'Jost', 'Jäggi',
            'Kaiser', 'Kaufmann', 'Keller', 'Kessler', 'Knecht', 'Koch', 'Kohler', 'Koller', 'Krebs', 'Kuhn', 'Kunz', 'Kuster', 'Kälin', 'Käser', 'Küng',
            'Lang', 'Lanz', 'Lehmann', 'Leuenberger', 'Liechti', 'Locher', 'Lutz', 'Lüscher', 'Lüthi',
            'Marti', 'Marty', 'Mathis', 'Mathys', 'Maurer', 'Meier', 'Meister', 'Merz', 'Mettler', 'Meyer', 'Michel', 'Moser', 'Mäder', 'Müller',
            'Niederberger', 'Nussbaumer', 'Näf',
            'Odermatt', 'Ott',
            'Peter', 'Pfister', 'Portmann', 'Probst',
            'Reber', 'Rohner', 'Rohrer', 'Roth', 'Röthlisberger', 'Rüegg',
            'Schaub', 'Scheidegger', 'Schenk', 'Scherrer', 'Schmid', 'Schmidt', 'Schneider', 'Schnyder', 'Schuler', 'Schumacher', 'Schwab', 'Schwarz', 'Schweizer', 'Schär', 'Schärer', 'Schüpbach', 'Schütz', 'Seiler', 'Senn', 'Sieber', 'Siegenthaler', 'Siegrist', 'Sigrist', 'Sommer', 'Stadelmann', 'Stalder', 'Staub', 'Steffen', 'Steiger', 'Steiner', 'Steinmann', 'Stettler', 'Stocker', 'Stucki', 'Studer', 'Stutz', 'Stöckli', 'Suter', 'Sutter',
            'Tanner', 'Tobler', 'Trachsel',
            'Ulrich',
            'Vogel', 'Vogt',
            'Wagner', 'Walker', 'Walser', 'Weber', 'Wehrli', 'Weibel', 'Weiss', 'Wenger', 'Wicki', 'Widmer', 'Willi', 'Wirth', 'Wirz', 'Wittwer', 'Wolf', 'Wyss', 'Wüthrich',
            'Zaugg', 'Zbinden', 'Zehnder', 'Ziegler', 'Zimmermann', 'Zwahlen', 'Zürcher',
        );
        return $this->randomPattern->chooseOne($lastName)->toString();
    }

    public function getFirstname(): string {
    }

    public function getStreet(): string {
        return $this->randomPattern
            //->setStringUCFirst(3, 10)
            //->chooseOne(['-Gasse', '-Platz', '-Strasse', 'strasse', 'str.', 'weg', 'allee', '-Allee'])
            ->set(' ')
            ->setNumber(1, 999)
            ->setStringLC(0, 1)
            ->toString();
    }

    public function getDateOfBirth(): string {
        return $this->randomPattern->setDateTime(
            '01.01.1900',
            '31.12.2005',
            'd.m.Y'
        )->toString();
    }

    public function getCity(): string {

    }

    public function getZIP(): string {

    }

    public function getCountry(): string {

    }

    public function getMobileNo(): string {
        return $this->randomPattern->chooseOne(
            [
                /**
                 * Example: +41 79 611 91 52
                 */
                $this->randomPattern
                    ->set('+41 ')
                    ->chooseOne(['75', '76', '77', '78', '79'])
                    ->set(' ')
                    ->setNumber(100, 999)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->toString(),
                /**
                 * Example: +41 (0)79 611 91 52
                 */
                $this->randomPattern
                    ->set('+41 (0)')
                    ->chooseOne(['75', '76', '77', '78', '79'])
                    ->set(' ')
                    ->setNumber(100, 999)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->toString(),
                /**
                 * Example: 079 611 91 52
                 */
                $this->randomPattern
                    ->chooseOne(['075', '076', '077', '078', '079'])
                    ->set(' ')
                    ->setNumber(100, 999)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->toString()
            ]
        )->toString();
    }

    public function getPhoneNo(): string {
        return $this->randomPattern->chooseOne(
            [
                /**
                 * Example: +41 52 611 91 52
                 */
                $this->randomPattern
                    ->set('+41 ')
                    ->chooseOne(['21', '22', '24', '26', '27', '31', '32', '33', '34', '41', '43', '44', '51', '52', '55', '56', '61', '62', '71', '81', '91'])
                    ->set(' ')
                    ->setNumber(100, 999)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->toString(),

                /**
                 * Example: 052 611 91 52
                 */
                $this->randomPattern
                    ->chooseOne(['021', '022', '024', '026', '027', '031', '032', '033', '034', '041', '043', '044', '051', '052', '055', '056', '061', '062', '071', '081', '091'])
                    ->set(' ')
                    ->setNumber(100, 999)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->set(' ')
                    ->setNumber(0, 99, 2)
                    ->toString(),
            ]
        )->toString();
    }

    public function getAddress(): AddressInterface {
        return $this->address->loadRandomAddress();
    }


}