<?php

namespace AR\CFM\Endpoints;

use AR\CFM\Adapter\Adapter;

interface API
{
    public function __construct(Adapter $adapter);
}
