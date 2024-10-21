<?php


class CustomerBuilder implements BuilderInterface
{

    private ?CustomerEntity $entity = null;

    public function build(array $data): void
    {
        $this->entity = new CustomerEntity(
            $data['name'],
            $data['email'],
            $data['addressEntity'],
        );
    }


    /**
     * @return CustomerEntity|null
     */
    public function getEntity(): object
    {
        return $this->entity;
    }

}
