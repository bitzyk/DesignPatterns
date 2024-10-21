<?php

enum EventEnum: string
{
    case ORDER_CREATED = 'order_created';
    case STOCK_DECREASED = 'stock-decreased';
    case SHIPMENT_CREATED = 'shipment-created';
}
