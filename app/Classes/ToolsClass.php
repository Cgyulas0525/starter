<?php

namespace App\Classes;

class ToolsClass
{

    public static function yesNoDDDW() {
        return ["Nem", "Igen"];
    }

    public static function yesNoAllSelect() {
        return ["Nem", "Igen", "Mind"];
    }

    public static function menWomenSelect() {
        return ["Férfi", "Nő"];
    }

    public static function getGenderName($gender) {
        return ($gender === 0) ? "Férfi" : "Nő";
    }

    public static function yesNo($value) {
        return ($value == 0 ? "Nem" : ($value == 1 ? "Igen" : "Nincs érték"));
    }

}
