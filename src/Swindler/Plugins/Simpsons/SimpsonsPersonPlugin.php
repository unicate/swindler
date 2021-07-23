<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Plugins\Simpsons;

use Unicate\Swindler\Core\PluginInterface;
use Unicate\Swindler\Core\Randomizer;
use Unicate\Swindler\Core\DataTypes\Person;

/**
 * Class SimpsonsPersonPlugin
 * @package Unicate\Swindler\Plugins\Identity_Simpsons
 */
class SimpsonsPersonPlugin implements PluginInterface {
    /**
     * @var Randomizer
     */
    private Randomizer $randomizer;

    /**
     * @var array|mixed
     */
    private array $data;

    /**
     * SimpsonsIdentityPlugin constructor.
     * @param Randomizer $randomizer
     */
    public function __construct(Randomizer $randomizer) {
        $this->randomizer = $randomizer;
        $this->data = $this->loadJson()['data'];
    }

    /**
     * @return array
     */
    private function loadJson(): array {
        $content = file_get_contents(__DIR__ . '/data/simpsons.json');
        return json_decode($content, true);
    }

    /**
     * @return Person
     */
    public function getData(): Person {
        $randAddress = $this->randomizer->getArrayEntry($this->data);
        $salutation = $randAddress['salutation'];
        $firstname = $randAddress['firstname'];
        $lastname = $randAddress['lastname'];
        $mailDomain = $this->randomizer->getArrayEntry(['@example.com', '@example.org']);
        $mailSeparator = $this->randomizer->getArrayEntry(['-', '_', '.', '']);
        $email = strtolower($firstname . $mailSeparator . $lastname . $mailDomain);

        $identity = new Person();;
        $identity->setSalutation($salutation);
        $identity->setFirstName($firstname);
        $identity->setLastName($lastname);
        $identity->setEmail($email);
        return $identity;
    }


}