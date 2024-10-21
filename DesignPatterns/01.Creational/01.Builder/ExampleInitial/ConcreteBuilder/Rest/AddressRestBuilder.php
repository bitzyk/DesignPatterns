<?php


class AddressRestBuilder implements BuilderInterface
{

    private ?AddressEntity $entity = null;

    public function build(array $data): void
    {
        $this->entity = new AddressEntity(
            $data['rest']['street'],
            $data['rest']['city'],
            $data['rest']['zip'],
            $data['rest']['state']
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
