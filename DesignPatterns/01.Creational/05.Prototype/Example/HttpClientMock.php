<?php

class HttpClientMock
{
    public function sendRequest(
        Request $request
    )
    {
        // simulate sending request
        $request->setRequestSent(true);

        echo sprintf(
            "Request with id %s sent to %s with method %s",
            $request->getRequestId(),
            $request->getUri(),
            $request->getMethod(),
        ) . PHP_EOL;
    }
}
