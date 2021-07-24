<?php

use PHPUnit\Framework\TestCase;
use Unicate\Swindler\Core\PluginFactory;
use Unicate\Swindler\Core\DataTypes\Address;
use Unicate\Swindler\Core\DataTypes\Person;
use Unicate\Swindler\Plugins\de_CH\SwissAddressPlugin;
use Unicate\Swindler\Plugins\de_CH\SwissPersonPlugin;
use Unicate\Swindler\Plugins\Simpsons\SimpsonsPersonPlugin;

class PluginTest extends TestCase {

    public function testPlugin() {

        /**
         * @var Person $identity
         */
        $plugin = PluginFactory::create(SwissPersonPlugin::class);
        $person = $plugin->getData();
        $str = $person->getSalutation() ."\n";
        $str .=  $person->getFirstName() . ' ' . $person->getLastName() . "\n";
        $str .= $person->getEmail() ."\n";
        echo $str;

        /**
         * @var Address $address
         */
        $plugin = PluginFactory::create(SwissAddressPlugin::class);
        $address = $plugin->getData();
        $str = $address->getStreet() . " " . $address->getStreetNo() . "\n";
        $str .= $address->getCountry() . "-" . $address->getZipCode() . " " . $address->getPlace() . "\n";
        echo $str;
        echo "-------------------------- \n";

        /**
         * @var Person $person
         */
        $plugin = PluginFactory::create(SimpsonsPersonPlugin::class);
        $n= 0;
        while ($n < 100) {
            $person = $plugin->getData();
            echo $person->getFirstName() . ' ' . $person->getLastName() . "\n";
            echo $person->getEmail() ."\n";
            $n++;
        }




        $this->assertEquals(1, 1);
    }


}
