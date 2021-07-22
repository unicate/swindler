<?php

use PHPUnit\Framework\TestCase;
use Unicate\Swindler\Core\PluginFactory;
use Unicate\Swindler\Plugins\Address_de_CH\AddressPlugin;
use Unicate\Swindler\Plugins\Identity_de_CH\IdentityPlugin;

class PluginTest extends TestCase {

    private AddressPlugin $plugin;

    public function testPlugin() {
        /**
         * @var Address $address
         */

        /**
         * @var Identity $identity
         */

/*
        $plugin = PluginFactory::create(AddressPlugin::class);
        $address = $plugin->getData();
        echo $address->getStreet();
*/

        $plugin = PluginFactory::create(IdentityPlugin::class);
        $identity = $plugin->getData();
        echo $identity->getEmail();


        $this->assertEquals(1, 1);
    }


}
