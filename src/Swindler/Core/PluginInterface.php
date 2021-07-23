<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;
/**
 * Interface PluginInterface
 * @package Unicate\Swindler\Core
 */
interface PluginInterface {

    /**
     * PluginInterface constructor.
     * @param Randomizer $randomizer
     */
    public function __construct(Randomizer $randomizer);

    /**
     * @return mixed
     */
    public function getData();

}