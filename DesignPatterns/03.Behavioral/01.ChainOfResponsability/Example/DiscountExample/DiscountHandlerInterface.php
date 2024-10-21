<?php

interface DiscountHandlerInterface
{

    public function handleDiscount(Order $order): void;

    public function setNext(DiscountHandlerInterface $handler): DiscountHandlerInterface;

}
