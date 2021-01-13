<?php

namespace AR\CFM\Auth;

class APICloudFlareToken implements Auth
{
    private $apiToken;
    private $apiEmail;



    public function __construct(string $apiToken,string $apiEmail)
    {
        $this->apiToken = $apiToken;
        $this->apiEmail = $apiEmail;
    }

    public function getHeaders(): array
    {
        return [
            'X-Auth-Key' => $this->apiToken,
            'X-Auth-Email' => $this->apiEmail,
            'Content-Type' => "application/json",
        ];
    }
}
