<?php

namespace AR\CFM\Auth;

class APIKey implements Auth
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getHeaders(): array
    {
        return [
            'authorization' => $this->apiKey
        ];
    }
}
