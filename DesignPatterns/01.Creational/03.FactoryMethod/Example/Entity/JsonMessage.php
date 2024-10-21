<?php

class JsonMessage implements MessageInterface
{
    public function printMessage(array $data): void
    {
        echo json_encode($data);
    }

}
