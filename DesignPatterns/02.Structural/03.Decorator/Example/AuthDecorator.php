<?php

/*
 * AuthDecorator Class:
 *
 * Wraps the original ApiService and adds a layer of authentication checking.
 * If the request doesn’t have a valid token, it returns an "Unauthorized" exception;
 * otherwise, it forwards the request to the decorated ApiService.
 */
class AuthDecorator implements ApiTransportInterface
{

    private  const array VALID_TOKENS = [
        '123456',
        'abcdef',
    ];

    public function __construct(
        private ApiTransportInterface $apiTransport,
    )
    {

    }

    public function transport(TransportMessage $transportMessage): void
    {
        if (
            !$this->isValidToken($transportMessage)
        ) {
            throw new \Exception('Invalid token');
        }

        echo sprintf(
            "Authenticating with token: %s \n",
            $transportMessage->getAuthToken()
        );

        $this->apiTransport->transport($transportMessage);
    }


    private function isValidToken(
        TransportMessage $transportMessage
    ): bool
    {
        return in_array($transportMessage->getAuthToken(), self::VALID_TOKENS);
    }

}
