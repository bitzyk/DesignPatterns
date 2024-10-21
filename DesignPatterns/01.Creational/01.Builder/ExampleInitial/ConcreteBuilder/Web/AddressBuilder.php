<?php

class AddressBuilder implements BuilderInterface
{

    private ?AddressEntity $entity = null;

    public function build(array $data): void
    {
        $this->entity = new AddressEntity(
            $data['street'],
            $data['city'],
            $data['zip'],
            $data['state']
        );
    }

    /**
     * @return AddressEntity|null
     */
    public function getEntity(): object
    {
        return $this->entity;
    }

}
