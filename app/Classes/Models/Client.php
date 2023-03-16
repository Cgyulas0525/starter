<?php

namespace App\Classes\Models;

use App\Models\Clients;

class Client
{
    private $id = NULL;
    private $client = NULL;

    public function __construct($id) {
        $this->id = $id;
        $this->client = Clients::find($id);
    }

    public function getClientName() {
        return $this->client->name;
    }
}
