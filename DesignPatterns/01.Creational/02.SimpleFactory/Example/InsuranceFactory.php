<?php

abstract class InsuranceFactory
{
    private const array MAP_TYPES = [
        'car' => CarInsurance::class,
        'house' => HouseInsurance::class,
    ];

    public static function createInsurance(
        string $type
    )
    {
        if (!array_key_exists($type, self::MAP_TYPES)) {
            throw new \InvalidArgumentException('Invalid type');
        }

        $className = self::MAP_TYPES[$type];
        return new $className();
    }
}
