<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class settingPaymentController extends Controller
{
    public function payPage(){

    return view('admin.payAnimation.paySucces');
    }


}
