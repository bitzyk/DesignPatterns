<?php


class OrderLineBuilder implements BuilderInterface
{

    private ?OrderLine $entity = null;

    public function build(array $data): void
    {
        $this->entity = new OrderLine(
            $data['productEntity'],
            $data['qty'],
            $data['line_price'],
        );
    }

    /**
     * @return OrderLine|null
     */
    public function getEntity(): object
    {
        return $this->entity;
    }

}
