<?php

namespace App\Http\Controllers;

use App\Classes\SWAlertClass;
use App\Classes\ToolsClass;
use Illuminate\Http\Request;
use App\Http\Controllers\VoucherToolController;
use PDF;
use Mail;
use QrCode;
use App\Models\Clientvouchers;

class ChangeActiveController extends Controller
{
    public function beforeActivation($id, $table, $route) {
        $view = 'layouts.show';
        $model_name = 'App\Models\\'.$table;
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztosan változtatni akarja az aktívitás jelzőt?', '/'.$route, 'Kilép', '/Activation/'.$id.'/'.$table.'/'.$route, 'Váltás');

        return view($view)->with('table', $data);
    }

    public function Activation($id, $table, $route) {
        $route .= '.index';
        $model_name = 'App\Models\\'.$table;
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route($route));
        }

        $record->active = $record->active == 0 ? 1 : 0;
        $record->save();

        return redirect(route($route));
    }

    public function beforeActivationWithParam($table, $id, $route, $param = null) {
        $view = 'layouts.show';
        $model_name = 'App\Models\\'.$table;
        $record = $model_name::find($id);

        SWAlertClass::choice($id, 'Biztosan változtatni akarja az aktívitás jelzőt?', '/'.$route. '/' . $param, 'Kilép', '/ActivationWithParam/'.$table.'/'.$id.'/'.$route. '/'.$param, 'Váltás');
        return view($view)->with('table', $record);
    }

    public function ActivationWithParam($table, $id, $route, $param) {
        $model_name = 'App\Models\\'.$table;
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route($route, $param));
        }

        $record->active = $record->active == 0 ? 1 : 0;
        $record->save();

        return redirect(route($route,  $param));
    }

    public function beforeValidation($id, $table, $route) {
        $view = 'layouts.show';
        $model_name = 'App\Models\\'.$table;
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztosan validálja az ügyfelet?', '/'.$route, 'Kilép', '/Validation/'.$id.'/'.$table.'/'.$route, 'Váltás');

        return view($view)->with('table', $data);
    }

    public function Validation($id, $table, $route) {
        $route .= '.index';
        $model_name = 'App\Models\\'.$table;
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route($route));
        }

        $record->validated = $record->validated == 0 ? 1 : 0;
        $record->local = ClientToolsController::localCheck($record->postcode);
        $record->save();

        return redirect(route($route));
    }

    public function beforeValidatingValidation($id, $table) {
        $view = 'layouts.show';
        $model_name = 'App\Models\\'.$table;
        $data = $model_name::find($id);
        SWAlertClass::choice($id, 'Biztosan validálja az ügyfelet?', '/validating/1/0', 'Kilép', '/validatingValidation/'.$id.'/'.$table, 'Váltás');

        return view($view)->with('table', $data);
    }

    public function validatingValidation($id, $table) {
        $route = '/validating/1/0';

        $model_name = 'App\Models\\'.$table;
        $record = $model_name::find($id);

        if (empty($record)) {
            return redirect(route('validating', [1,0]));
        }


        // alap voucherek kiküldése
        $vouchers = VoucherToolController::validFundVouchers();
        if (!empty($vouchers)) {
            $files = [];
            foreach ($vouchers as $voucher) {
                array_push($files, $this->voucherPDF($record, $voucher));
                $this->clientVoucherInsert($record, $voucher);
            }
            $this->voucherEmail($record, $files);
        }


        $record->validated = $record->validated == 0 ? 1 : 0;
        $record->local = ClientToolsController::localCheck($record->postcode);
        $record->save();

        if (ToolsClass::toBeValidated()->count() > 0) {
            return redirect(route('validating', [1,0]));
        } else {
            return redirect(route('dashboard'));
        }
    }

    public function clientVoucherInsert($client, $voucher) {
        $clientvoucher = new Clientvouchers();
        $clientvoucher->client_id = $client->id;
        $clientvoucher->voucher_id = $voucher->id;
        $clientvoucher->posted = \Carbon\Carbon::now();
        $clientvoucher->created_at = \Carbon\Carbon::now();
        $clientvoucher->save();
    }

    public function voucherPDF($client, $voucher)
    {

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('printing.voucherPrintingEmail', ['voucher' => $voucher, 'client' => $client]);

        $fileName = $voucher->partnerName . '-' . $client->name . '-' . $voucher->name . '-' . date('Y-m-d',strtotime('today')) .'-voucher.pdf';
        $path = public_path('print/'.$fileName);

        $pdf->save($path, 'UTF-8');

        return $path;

    }

    public function voucherEmail($client, $files) {

        $data["client"] = $client->name;
        $data["email"] = $client->email;
        $data["title"] = 'Eger voucher alkalmazás!';
        $data["body"] = 'Az Eger alakalmazás új vouchert, vochereket küldött Önnek.';
        $data["datum"] = date('Y-m-d');

        Mail::send('emails.voucherMail', $data, function($message) use($files, $data) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"]);

            foreach ($files as $file) {
                $message->attach($file);
            }

        });

        return back();

    }

}
