<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\OurPayment;

class InvoiceController extends Controller
{
    public function index()
    {
       
        return view('admincontrol.invoice.invoice');
    }
}
