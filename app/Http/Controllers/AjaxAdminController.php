<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AjaxAdminController extends Controller
{
    private function s(){

    }
    public function payment(Request $request)
    {
        if($request->payment == "order_bank_transfer"){
            $company = Company::where('type','order_bank_transfer')->first();
            $company->update([
                'content' => !$company->content,
            ]);
            if($company->save()){
                return 200;
            }else{
                return 500;
            }
        }elseif($request->payment == "order_bank_transfer_24"){
            $company = Company::where('type','order_bank_transfer_24')->first();
            $company->update([
                'content' => !$company->content,
            ]);
            if($company->save()){
                return 200;
            }else{
                return 500;
            }
        }else{
            return $request;
        }
    }
}
