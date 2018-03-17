<?php

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class PlatformType extends AbstractEnumType
{

    public const ANDROID = 'Android';
    public const IOS = 'iOS';

    protected static $choices = [
        self::ANDROID => 'Android',
        self::IOS => 'iOS'
    ];
}