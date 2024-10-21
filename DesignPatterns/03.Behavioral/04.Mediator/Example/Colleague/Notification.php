<?php


class Notification extends AbstractColleague
{
    public function sendNotification(
        string $message
    )
    {
        echo sprintf(
            "Sending notification with message: `%s`.\n",
            $message,
        ); // simulate sending notification

       // we don't notify the mediator here, as this is a one-way operation
    }
}
