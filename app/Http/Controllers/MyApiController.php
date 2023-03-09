<?php

namespace App\Http\Controllers;

use App\Models\Settlements;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Validpostcodes;
use Response;
use DB;

use App\Models\Partnerquestionnaries;
use App\Classes\LogitemClass;

class MyApiController extends Controller
{
    public static function insertValidPostcodesRecord(Request $request) {
        $s = Settlements::where('name', $request->get('settlement'))->first();
        foreach (Settlements::where('name', $request->get('settlement'))->get() as $settlemen) {
            $validpostcodes = new Validpostcodes();
            $validpostcodes->settlement_id = $s->id;
            $validpostcodes->postcode = $settlemen->postcode;
            $validpostcodes->active = 1;
            $validpostcodes->created_at = Carbon::now();
            $validpostcodes->save();
            $logitem = new LogitemClass();
            $logitem->iudRecord(3, $validpostcodes->getTable(), $validpostcodes->id);

        }
    }

    /**
     * Partner attaching to the questionnarie
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function partnerAttachQuestionnarie(Request $request) {

        $partnerQuestionnarie = DB::table('partnerquestionnaries')
                    ->where('partner_id', $request->get('partner'))
                    ->where('questionnarie_id', $request->get('questionnaire'))
                    ->first();

        if (!empty($partnerQuestionnarie)) {
            DB::table('partnerquestionnaries')
                ->where('partner_id', $request->get('partner'))
                ->where('questionnarie_id', $request->get('questionnaire'))
                ->update([
                    'deleted_at' => null
                ]);
        } else {
            $partnerQuestionnarie = new Partnerquestionnaries();

            $partnerQuestionnarie->partner_id = $request->get('partner');
            $partnerQuestionnarie->questionnarie_id = $request->get('questionnaire');
            $partnerQuestionnarie->created_at = Carbon::now();

            $partnerQuestionnarie->save();
            $logitem = new LogitemClass();
            $logitem->iudRecord(3, $partnerQuestionnarie->getTable(), $partnerQuestionnarie->id);
        }

        return back();
    }

    /**
     * Partner unhooking from the questionnarie
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function partnerUnhookQuestionnarie(Request $request) {

        DB::table('partnerquestionnaries')
            ->where('partner_id', $request->get('partner'))
            ->where('questionnarie_id', $request->get('questionnaire'))
            ->update([
                'deleted_at' => Carbon::now()
            ]);

        return back();
    }
}
