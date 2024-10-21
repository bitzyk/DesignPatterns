<?php

class Director
{

    public function __construct(
        private readonly BuilderInterface $orderBuilder,
        private readonly BuilderInterface $addressBuilder,
        private readonly BuilderInterface $customerBuilder,
        private readonly BuilderInterface $productBuilder,
        private readonly BuilderInterface $orderLineBuilder,
    )
    {

    }

    public function createOrder(
        array $data,
    )
    {
        // build address
        $this->addressBuilder->build($data['shipToAddress']);

        // build customer
        $this->customerBuilder->build(
            array_merge(
                $data['client'],
                [
                    'addressEntity' => $this->addressBuilder->getEntity(),
                ]
            )
        );

        // build order lines
        $orderLines = $this->buildOrderLines($data);


        // build order
        $this->orderBuilder->build(
            [
                'customerEntity' => $this->customerBuilder->getEntity(),
                'orderLines' => $orderLines,
                'order_price' => $data['order_price'],
            ]
        );

        // return order entity
        return $this->orderBuilder->getEntity();
    }

    /**
     * @param array $data
     * @return OrderLine[]
     */
    private function buildOrderLines(
        array $data,
    )
    {
        $orderLines = [];

        foreach ($data['products'] as $productData) {
            $this->productBuilder->build($productData);

            $productEntity = $this->productBuilder->getEntity();

            $this->orderLineBuilder->build(
                [
                    'productEntity' => $productEntity,
                    'qty' => $productData['qty'],
                    'line_price' => $productData['line_price'],
                ]
            );

            $orderLines[] = $this->orderLineBuilder->getEntity();
        }

        return $orderLines;
    }
}
