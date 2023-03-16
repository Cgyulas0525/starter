<?php

namespace App\Classes\Models;

use App\Models\Partners;

class Partner
{
    private $id = NULL;
    private $partner = NULL;

    public function __construct($id) {
        $this->id = $id;
        $this->partner = Partners::find($id);
    }

    public function getPartnerName() {
        return $this->partner->name;
    }

}
