<?php

class OrderBuilder
{

    private CustomerEntity|null $customer = null;
    private AddressEntity|null $address = null;

    private array $orderLines = [];

    private array $data = [];
    private float|null $totalAmount;

    public function withCustomer(
        array $customerData,
    ): self
    {
        $this->customer = $this->buildCustomer($customerData);

        return $this;
    }

    public function withAddress(
        array $addressData,
    ): self
    {
        $this->address = $this->buildAddress($addressData);

        return $this;
    }

    public function withOrderLines(
        array $orderLines,
    ): self
    {
        $this->orderLines = $this->buildOrderLines($orderLines);

        return $this;
    }

    public function withGift(
        string $giftMessage,
    ): self
    {
        $this->data['isGift'] = true;
        $this->data['giftMessage'] = $giftMessage;

        return $this;
    }

    public function withExpressDelivery(): self
    {
        $this->data['isExpressDelivery'] = true;

        return $this;
    }

    public function withTotalAmount(
        float $totalAmount,
    ): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function build(): OrderEntity
    {
        $order = new OrderEntity();

        if ($this->customer) {
            $order->setCustomer($this->customer);
        }

        if ($this->address) {
            $order->setAddressEntity($this->address);
        }

        $order->setOrderLines($this->orderLines);

        if (isset($this->data['isGift'])) {
            $order->setIsGift(true);
            $order->setGiftMessage($this->data['giftMessage']);
        }

        if (isset($this->data['isExpressDelivery'])) {
            $order->setIsExpressDelivery(true);
        }

        if ($this->totalAmount) {
            $order->setTotalAmount($this->totalAmount);
        }

        return $order;
    }

    private function buildCustomer(
        array $customerData,
    ): CustomerEntity
    {
        $customer = new CustomerEntity(
            $customerData['name'],
            $customerData['email'],
        );

        return $customer;
    }

    private function buildAddress(
        array $addressData,
    ): AddressEntity
    {
        $address = new AddressEntity(
            $addressData['street'],
            $addressData['city'],
            $addressData['postcode'],
            $addressData['country'],
        );

        return $address;
    }

    private function buildOrderLines(
        array $orderLinesData,
    ): array
    {
        $orderLines = [];
        foreach ($orderLinesData as $orderLineData) {
            $orderLine = new OrderLine(
                new Product(
                    $orderLineData['id'],
                ),
                $orderLineData['qty'],
                $orderLineData['line_price'],
            );
            $orderLines[] = $orderLine;
        }

        return $orderLines;
    }
}
