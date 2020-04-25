@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-success" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
                @endif

                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h1 style="color:black; text-decoration:underline; font-style: italic;">Wise Trade</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>Zahir Mansion (3rd Floor) 476/C, D.I.T Road,</p>
                        <p>Malibagh, Dhaka-1217, Bangladesh. Tel:</p>
                        <p>+8802-49349420, Fax: +8802-78321233 E-</p>
                        <p>mail: wise.trade10@gmail.com, Web:</p>
                        <p>www.wisetradebd.com</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h4>INVOICE # 1561/EBL/BRA/11-2018, Shantinagar Priority<br />center.</h4>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <h4>Invoice To</h4>
                        <p>Eastern Bank Limited</p>
                        <p>ATTN: Head of Admin</p>
                        <p>100 Gulshan Avenue.</p>
                        <p>Dhaka 1212</p>
                        <p>Bangladesh</p>
                        <p>Phone: 9556360</p>
                        <p>Email: rahmantau@ebl-bd.com</p>
                    </div>
                    <div class="col-sm-4">
                        <h4>Invoice To</h4>
                        <p>Eastern Bank Limited</p>
                        <p>ATTN: Head of Admin</p>
                        <p>100 Gulshan Avenue.</p>
                        <p>Dhaka 1212</p>
                        <p>Bangladesh</p>
                        <p>Phone: 9556360</p>
                        <p>Email: rahmantau@ebl-bd.com</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Invoice<br />#</th>
                                        <th style="text-align:right">1561/EBL/BRA/11-2018,Shantinagar Priority center.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Status</td>
                                        <td style="text-align:right">Unpaid</td>
                                    </tr>
                                    <tr>
                                        <td>Invoice Date</td>
                                        <td style="text-align:right">15/11/2018</td>
                                    </tr>
                                    <tr>
                                        <td>Due Date</td>
                                        <td style="text-align:right">15/11/2018</td>
                                    </tr>
                                    <tr>
                                        <td>Amount Due</td>
                                        <td style="text-align:right">Tk 4,040.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">                                
                                <tr>
                                    <th style="text-align:center">Item</th>
                                    <th style="text-align:right">Price</th>
                                    <th style="text-align:right">Qty</th>
                                    <th style="text-align:right">Total</th>
                                </tr>                                
                                <tr>
                                    <td>Led Spot Light with holder new supply & fitting.(Total-3 pcs @ Tk. 380 = 1,140/-).</td>
                                    <td style="text-align:right">Tk 380.00</td>
                                    <td style="text-align:right">4</td>
                                    <td style="text-align:right">Tk 1,140.00</td>
                                </tr>
                                <tr>
                                    <td>Led Spot Light with holder new supply & fitting.(Total-3 pcs @ Tk. 380 = 1,140/-).</td>
                                    <td style="text-align:right">Tk 380.00</td>
                                    <td style="text-align:right">4</td>
                                    <td style="text-align:right">Tk 1,140.00</td>
                                </tr>
                                <tr>
                                    <td>Led Spot Light with holder new supply & fitting.(Total-3 pcs @ Tk. 380 = 1,140/-).</td>
                                    <td style="text-align:right">Tk 380.00</td>
                                    <td style="text-align:right">4</td>
                                    <td style="text-align:right">Tk 1,140.00</td>
                                </tr>
                                <tr>
                                    <td rowspan="2"></td>
                                    <td colspan="3">Sub total</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Grand total</td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="text-align:center">TERMS</td>                                    
                                </tr>
                            </table>
                            <p style="text-align:center;">Location: Shantinagar Priority center.</p>
                            <p style="text-align:center;">Challan #2500 Date: 22-10-2018</p>
                            <h4 style="text-align:center;">"Please pay the amount through cheque/P.O./cash in favour of WISE TRADE"</h4>


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
