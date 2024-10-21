<?php

class Service1
{
    public function method1()
    {
        usleep(200000); // simulate processing

        echo sprintf(
            "Service1 method1\n"
        );
    }

    public function method2()
    {
        usleep(200000); // simulate processing

        echo sprintf(
            "Service1 method2\n"
        );
    }

    public function method3()
    {
        usleep(200000); // simulate processing

        echo sprintf(
            "Service1 method3\n"
        );
    }
}
