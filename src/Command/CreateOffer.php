<?php

namespace App\Command;

class CreateOffer extends CreateEntity
{

    private $apiUrl = 'http://127.0.0.1:8000/api/data';

    private $consoleName = 'app:create-offer';

    private $host = '127.0.0.1:8000';
    private $schema = 'http';
    private $localRout = 'create_offer';


    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function getConsoleName(): string
    {
        return $this->consoleName;
    }

    public function getSchema(): string
    {
        return $this->schema;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getLocalRout(): string
    {
        return $this->localRout;
    }

}