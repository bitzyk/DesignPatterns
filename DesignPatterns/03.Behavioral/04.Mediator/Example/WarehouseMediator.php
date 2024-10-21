<?php

class WarehouseMediator implements MediatorInterface
{

    public function __construct(
        private readonly Inventory $inventory,
        private readonly Shipment $shipment,
        private readonly Order $order,
        private readonly Notification $notification,
    )
    {
        $this->inventory->setMediator($this);
        $this->shipment->setMediator($this);
        $this->order->setMediator($this);
        $this->notification->setMediator($this);
    }

    public function notify(
        object $sender,
        EventEnum $event,
        array $context,
    ): void
    {
        switch ($event) {
            case EventEnum::ORDER_CREATED:
                $this->processOrderCreated($context);
                break;
            case EventEnum::STOCK_DECREASED:
                 $this->processStockDecreased($context);
                break;
            case EventEnum::SHIPMENT_CREATED:
                $this->processShipmentCreate($context);
                break;

        }
    }

    private function processOrderCreated(
        array $context,
    )
    {
        // reduce stock on the inventory
        $this->inventory->reduceStock(
            $context['sku'],
            $context['quantity']
        );

        // create shipment the order
        $this->shipment->createShipment(
            $context['sku'],
            $context['quantity'],
            $context['address']
        );
    }

    private function processStockDecreased(
        array $context,
    )
    {
        // // we just send a notification to the warehouse team
        $this->notification->sendNotification(
            sprintf(
                'Warehouse team: stock decreased for SKU %s by %d items.',
                $context['sku'],
                $context['quantity']
            )
        );
    }

    private function processShipmentCreate(
        array $context,
    )
    {
        $this->order->markAsShipped(true);

        // we just send a notification to the warehouse team
        $this->notification->sendNotification(
            sprintf(
                'Warehouse team: shipment created for SKU %s by %d items.',
                $context['sku'],
                $context['quantity']
            )
        );

        // another notification to the client
        $this->notification->sendNotification(
            sprintf(
                'Client: shipment created for SKU %s by %d items and it will be shipped to %s.',
                $context['sku'],
                $context['quantity'],
                $context['address']
            )
        );
    }


}
