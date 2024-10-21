<?php

require_once __DIR__ . '/DiscountHandlerInterface.php';
require_once __DIR__ . '/AbstractDiscountHandler.php';
require_once __DIR__ . '/Discount/StandardDiscountHandler.php';
require_once __DIR__ . '/Discount/SeasonalDiscountHandler.php';
require_once __DIR__ . '/Discount/LoyaltyDiscountHandler.php';
require_once __DIR__ . '/Entity/Order.php';


class Client {

    /**
     * First handler in the chain
     */
    private DiscountHandlerInterface $discountHandler;

    public function __construct() {

        // instantiate the discount handlers
        $standardDiscountHandler = new StandardDiscountHandler();
        $seasonalDiscountHandler = new SeasonalDiscountHandler();
        $loyaltyDiscountHandler = new LoyaltyDiscountHandler();

        // we chain the discount handlers
        $standardDiscountHandler->setNext($seasonalDiscountHandler);
        $seasonalDiscountHandler->setNext($loyaltyDiscountHandler);

        // set the first handler in the chain
        $this->discountHandler = $standardDiscountHandler;
    }

    public function handleDiscounts(Order $order): void
    {
        $this->discountHandler->handleDiscount($order);
    }
}

$order = new Order(
    totalAmount: 100,
    isFirstTimeBuyer: false,
    isLoyalCustomer: true,
    orderMonth: 12
);

$client = new Client();

$client->handleDiscounts($order);

// price to pay after discounts
echo sprintf(
    "Price to pay after discounts: %s\n",
    $order->getPriceToPay()
);

echo sprintf(
    'Applied discounts: %s',
    print_r(
        $order->getDiscounts(),
        true
    )
);
