<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core;

interface PluginInterface {

    public function __construct(Randomizer $randomizer);

    public function getData();



}