<?php


/**
 * RateLimiterDecorator Class:
 *
 * Holds a reference to an ApiService instance and implements the rate limiting logic.
 */
class RateLimiterDecorator implements ApiTransportInterface
{

    public function __construct(
        private ApiTransportInterface $apiTransport,
        private int $rateLimit,
        private int $timeFrame,
    )
    {

    }

    public function transport(TransportMessage $transportMessage): void
    {
        // Simulate rate limit logic
        $this->simulateRateLimitLogic();

        echo sprintf(
            "Simulating rate limit logic: %d requests per %d seconds \n",
            $this->rateLimit,
            $this->timeFrame
        );

        $this->apiTransport->transport($transportMessage);
    }


    private function simulateRateLimitLogic()
    {
        // simulate rate limit logic
    }

}
