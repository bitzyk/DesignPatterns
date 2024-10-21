<?php

class OrderEntity
{

    private ?CustomerEntity $customer;
    private ?AddressEntity $addressEntity;
    private array $orderLines = [];
    private ?float $totalAmount;

    private bool $isGift = false;
    private string $giftMessage = '';

    private bool $isExpressDelivery = false;

    public function setCustomer(CustomerEntity $customer): void
    {
        $this->customer = $customer;
    }

    public function setAddressEntity(AddressEntity $addressEntity): void
    {
        $this->addressEntity = $addressEntity;
    }

    public function setOrderLines(array $orderLines): void
    {
        $this->orderLines = $orderLines;
    }

    public function setTotalAmount(float $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    public function setIsGift(bool $isGift): void
    {
        $this->isGift = $isGift;
    }

    public function setGiftMessage(string $giftMessage): void
    {
        $this->giftMessage = $giftMessage;
    }

    public function setIsExpressDelivery(bool $isExpressDelivery): void
    {
        $this->isExpressDelivery = $isExpressDelivery;
    }


}
