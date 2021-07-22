<?php
/**
 * @author https://unicate.ch
 * @copyright Copyright (c) 2021
 * @license Released under the MIT license
 */

declare(strict_types=1);

namespace Unicate\Swindler\Core\DataTypes;

interface IdentityInterface {

    public function getSalutation(): string;
    public function getFirstName(): string;
    public function getLastName(): string;
    public function getEmail(): string;




}