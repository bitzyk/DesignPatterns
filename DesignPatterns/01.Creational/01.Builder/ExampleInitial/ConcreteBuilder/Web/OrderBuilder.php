<?php


class OrderBuilder implements BuilderInterface
{

    private ?OrderEntity $entity = null;

    public function build(array $data): void
    {
        $this->entity = new OrderEntity(
            $data['customerEntity'],
            $data['orderLines'],
            $data['order_price'],
        );
    }

    /**
     * @return OrderEntity|null
     */
    public function getEntity(): object
    {
        return $this->entity;
    }

}
