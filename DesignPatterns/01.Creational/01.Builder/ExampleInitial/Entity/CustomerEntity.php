<?php

class CustomerEntity
{
    public function __construct(
        private string $name,
        private string $email,
        private AddressEntity $address
    )
    {
    }
}
