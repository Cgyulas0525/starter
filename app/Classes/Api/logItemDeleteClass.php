<?php

namespace App\Classes\Api;

use App\Classes\Api\apiUtilityClass;
use App\Enums\LogTypeEnum;
use App\Models\Logitems;

class logItemDeleteClass
{

    public $utility = NULL;

    function __construct() {
        require_once dirname(__DIR__, 2). "/Classes/Api/Inc/config.php";
        $this->utility = new apiUtilityClass();

        $this->outputFile = fopen(PATH_OUTPUT . 'truncate-'. uniqid() . '.txt', "w") or die("Unable to open file!");
        $this->utility->fileWrite($this->outputFile, "EGER loginDelete\n");
        $this->utility->fileWrite($this->outputFile, "Start: " . date('Y.m.d H:m:s', strtotime('now')) . "\n");

    }

    public function deleteLogin() {


        $this->utility->fileWrite($this->outputFile, "Törölt login rekord: " . Logitems::where('logitemtype', LogTypeEnum::DELETE->value)->get()->count() . "\n");

        Logitems::where('logitemtype', LogTypeEnum::DELETE->value)->forceDelete();

        $this->utility->fileWrite($this->outputFile, "OK\n");
        $this->utility->fileWrite($this->outputFile, "End: " . date('Y.m.d H:m:s', strtotime('now')) . "\n");
        fclose($this->outputFile);

    }

    public function deleteAllLog() {


        $this->utility->fileWrite($this->outputFile, "Törölt login rekord: " . Logitems::get()->count() . "\n");

        Logitems::forceDelete();

        $this->utility->fileWrite($this->outputFile, "OK\n");
        $this->utility->fileWrite($this->outputFile, "End: " . date('Y.m.d H:m:s', strtotime('now')) . "\n");
        fclose($this->outputFile);

    }
}
