<?php

class ProductBuilder implements BuilderInterface
{

    private ?Product $entity = null;

    public function build(array $data): void
    {
        $this->entity = new Product(
            $data['id'],
        );
    }

    /**
     * @return Product|null
     */
    public function getEntity(): object
    {
        return $this->entity;
    }

}
