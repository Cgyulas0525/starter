<?php

namespace App\Classes;

class ToolsClass
{

    public static function yesNoDDDW() {
        return ["Nem", "Igen"];
    }

    public static function yesNo($value) {
        return $value == 0 ? "Nem" : ($value == 1 ? "Igen" : "Nincs érték");
    }

}
