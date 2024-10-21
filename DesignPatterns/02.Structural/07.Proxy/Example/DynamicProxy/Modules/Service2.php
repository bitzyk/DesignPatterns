<?php

class Service2
{
    public function method1()
    {
        usleep(200000); // simulate processing

        echo sprintf(
            "Service2 method1\n"
        );
    }

    public function method2()
    {
        usleep(200000); // simulate processing

        echo sprintf(
            "Service2 method2\n"
        );
    }

    public function method3()
    {
        usleep(200000); // simulate processing

        echo sprintf(
            "Service2 method3\n"
        );
    }
}
