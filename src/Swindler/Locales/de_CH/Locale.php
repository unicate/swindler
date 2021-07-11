<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Locales\de_CH;

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