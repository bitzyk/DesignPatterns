<?php

class AddressEntity
{
    public function __construct(
        private readonly string $street,
        private readonly string $city,
        private readonly string $zipCode,
        private readonly string $country
    )
    {

    }
}
