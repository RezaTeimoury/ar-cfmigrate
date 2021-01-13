<?php

namespace AR\CFM\Endpoints;

use AR\CFM\Adapter\Adapter;
use AR\CFM\Traits\BodyAccessorTrait;

class CloudflareDns implements API
{
    use BodyAccessorTrait;

    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function listRecords(string $zoneID): \stdClass
    {
        $user = $this->adapter->get('zones/' . $zoneID . '/dns_records');
        $this->body = json_decode($user->getBody());
        return (object)['result' => $this->body->result, 'result_info' => $this->body->result_info];
    }



}
