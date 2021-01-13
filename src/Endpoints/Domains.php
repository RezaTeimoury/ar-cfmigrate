<?php

namespace AR\CFM\Endpoints;

use AR\CFM\Adapter\Adapter;
use AR\CFM\Traits\BodyAccessorTrait;

class Domains implements API
{
    use BodyAccessorTrait;

    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getUserDomains(): \stdClass
    {
        $user = $this->adapter->get('domains');
        $this->body = json_decode($user->getBody());
        return $this->body;
//        return $this;
    }

    public function addNewDomain(string $domain)
    {
        $options = [];
        $options['domain'] = $domain;
        $user = $this->adapter->post('domains/dns-service', $options);
        $this->body = json_decode($user->getBody());
        return $this->body;
    }

    public function removeDomain(string $domain, string $id)
    {
        $options = [];
        $options['domain'] = $domain;
        $options['id'] = $id;

        $user = $this->adapter->delete('domains/' . $domain, $options);
        $this->body = json_decode($user->getBody());
        return $this->body;
    }


    public function getDomainInfo(string $domain): \stdClass
    {
        $user = $this->adapter->get('domains/' . $domain);
        $this->body = json_decode($user->getBody());
        return $this->body;
    }

    public function getDnsList(string $domain)
    {
        $user = $this->adapter->get('domains/' . $domain.'/dns-records');
        $this->body = json_decode($user->getBody());
        return $this->body;
    }

    public function addRecordToDomain(
        string $domain,
        string $type,
        string $name,
        $value,
        int $ttl = 120,
        bool $cloud = true,
        string $upstream_https = 'default'
    )
    {
        $options = array(
            'type' => $type,
            'ttl' => $ttl,
            'name' => $name,
            'cloud' => $cloud,
            'value' => $value
        );

        $user = $this->adapter->post('domains/'.$domain.'/dns-records',$options);
        $this->body = json_decode($user->getBody());

        if(isset($this->body->data))
        {
            $messageType = 'success';
        }
        else{
            $messageType = 'danger';
        }
        return array(
            "message"=>"$type $name : ".$this->body->message,
            "type"=>$messageType,
        );
    }


}
