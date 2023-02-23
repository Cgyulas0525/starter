<?php

namespace App\Classes;

use DB;

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

    public static function modelCount($model) {
        $model_name = 'App\Models\\'.$model;
        return $model_name::where('active', 1)->get()->count();
    }

    public static function usedQuestionnaireCount($id) {
        return DB::table('clientquestionnaries')
            ->where('questionnarie_id', $id)
            ->whereNull('deleted_at')
            ->get()
            ->count();
    }

    public static function tfSelect() {
        return ["Hamis", "Igaz"];
    }

    public static function getTFName($tf) {
        return ($tf === 0) ? "Hamis" : "Igaz";
    }

    public static function partnersLocalActive(Array $active, Array $vpactive) {
        return DB::table('partners as t1')
            ->whereNull('t1.deleted_at')
            ->whereIn('t1.postcode', function ($query) use($vpactive){
                return $query->from('validpostcodes as t2')->select('t2.postcode')->whereNull('t2.deleted_at')->whereIn('t2.active', $vpactive)->get();
            })
            ->whereIn('t1.active', $active)
            ->get();
    }

    public static function partnersNonLocalActive(Array $active, Array $vpactive) {
        return DB::table('partners as t1')
            ->whereNull('t1.deleted_at')
            ->whereNotIn('t1.postcode', function ($query) use($vpactive){
                return $query->from('validpostcodes as t2')->select('t2.postcode')->whereNull('t2.deleted_at')->whereIn('t2.active', $vpactive)->get();
            })
            ->whereIn('t1.active', $active)
            ->get();
    }

    public static function toBeValidated() {
        return DB::table('clients as t1')
            ->whereNull('t1.deleted_at')
            ->where('t1.active', '=', 1)
            ->where( 't1.validated', '=', 0)
            ->get();
    }

}
