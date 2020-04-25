<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddproductController extends Controller
{
    public function index(){
        echo Auth::user()->id;
         //die();
         
        $data['product'] = DB::table('products')
             ->select('*')
             ->get();

        $data['bank'] = DB::table('banks')
        ->select('*')
        ->get();

        $data['customers'] = DB::table('customers')
        ->select('*')
        ->get();

        $data['custoname'] = DB::table('addproducts')
            ->join('customers', 'addproducts.customerid', '=', 'customers.id')
            ->select('addproducts.*', 'customers.company_name')
            ->get();
             $data['title'] = "Insert Addi.Product";
         return view('admincontrol.products.addi-products',$data);
     }

     public function create(Request $request)
    {
            
         $validationRules =
            [   
                'sku' => 'required|max:200|unique:addproducts',
                'price' => 'required',
                'vat' => 'required',
                'stock' => 'required',                
                'date' => 'required',                
            ];

            $customMessage = [
                'sku.required' => 'SKU is required.',
                'price.required' => 'Price is required.',
                'vat.required' => 'Vat is required.',
                'stock.required' => 'Stock is required.',                                
                'date.required' => 'Created Date is required.',                                
            ];

            $tableData = [
                'sku' => $request->input('sku'),
               'price' => $request->input('price'),               
               'userid' => Auth::user()->id, 
               'vat' => $request->input('vat'),  
               'productid' => $request->input('product'),
               'customerid' => $request->input('customername'),
               'stock' => $request->input('stock'),
               'amount' => $request->input('amount'),          
               'created_at' => $request->input('date'),
               'verified' =>0,
           ];

           if($request->input('payment_method') == 1){
            $validationRules['payment_method'] = 'required|numeric';
            $customMessage['payment_method.required'] = 'Payment Method field must be fill';
            $validationRules['amount'] = 'required|numeric';
            $customMessage['amount.required'] = 'Amount field must be fill';
            $tableData['cash'] = $request->input('amount');
            $tableData['amount'] = $request->input('amount');
        }
        if($request->input('payment_method') == 2){
            $validationRules['payment_method'] = 'required|numeric';
            $customMessage['payment_method.required'] = 'Payment Method field must be fill';
            $validationRules['amount'] = 'required|numeric';
            $customMessage['amount.required'] = 'Amount field must be fill';
            $validationRules['only_cheque_bank_name'] = 'required|numeric';
            $customMessage['only_cheque_bank_name.required'] = 'Bank Name field must be fill';
            $tableData['amount'] = $request->input('amount');
            $tableData['bank_id'] = $request->input('only_cheque_bank_name');
            $tableData['bank_amount'] = $request->input('amount');
        }
        if($request->input('payment_method') == 3){
            $validationRules['payment_method'] = 'required|numeric';
            $customMessage['payment_method.required'] = 'Payment Method field must be fill';
            $validationRules['amount'] = 'required|numeric';
            $customMessage['amount.required'] = 'Amount field must be fill';
            $validationRules['cash_amount'] = 'required|numeric';
            $customMessage['cash_amount.required'] = 'Cash Amount  field must be fill';
            $validationRules['both_cheque_bank_name'] = 'required|numeric';
            $customMessage['both_cheque_bank_name.required'] = 'Bank Name field must be fill';
            $validationRules['both_cheque_amount'] = 'required|numeric';
            $customMessage['both_cheque_amount.required'] = 'Cheque Amount  field must be fill';
            $customMessage['both_cheque_amount.required|numeric'] = 'Cheque Amount  field must be fill';
            $tableData['amount'] = $request->input('amount');
            $tableData['cash'] = $request->input('cash_amount');
            $tableData['bank_id'] = $request->input('both_cheque_bank_name');
            $tableData['bank_amount'] = $request->input('both_cheque_amount');
        }


            $validateFormData = request()->validate($validationRules, $customMessage);

            if (!$validateFormData) {
                return redirect()->back()->withErrors($request->all());
            }

            $insert = DB::table('addproducts')
                ->insert($tableData);

            if (!$insert) {
                return redirect()->back()->with('error', 'Invalid information, Not Inserted!!');
            }
            return redirect()->back()->with('msg', 'Inserted Successfully!');;
    }

    public function view(Request $request)
    {
        $data['title'] = "View Addi.Product";
        $data['newproduct'] = DB::table('addproducts')
            ->join('customers', 'addproducts.customerid', '=', 'customers.id')
            ->join('products', 'addproducts.productid', '=', 'products.id')
            ->join('banks', 'addproducts.bank_id', '=', 'banks.id')            
            ->select('addproducts.*', 'customers.company_name' , 'products.title', 'banks.name')  
            ->paginate(30);
        return view('admincontrol.products.all-addiproducts', $data);

    }

    public function edit($id)
    {
        $data['userid'] =$id;
        $data['bank'] = DB::table('banks')
        ->select('*')
        ->get();
        $data['custoname'] = DB::table('customers')
        ->select('*')
        ->get();
        $data['pdtname'] = DB::table('products')
                 ->select('*')
                 ->get();
        $data['product'] = DB::table('addproducts')
        ->where('id', "=", $id)
        ->first();
        $data['title'] = "Update Addi.Product";
    return view('admincontrol.products.update-newproduct', $data);
    }

    public function update(Request $request, $id)
    {
        
        
        $validationRules =
            [
                'sku' => 'required',
                'price' => 'required',
                'vat' => 'required',
                'stock' => 'required',                
                'date' => 'required',                
            ];

            $customMessage = [
                'sku.required' => 'SKU is required.',
                'price.required' => 'Price is required.',
                'vat.required' => 'Vat is required.',
                'stock.required' => 'Stock is required.',                                
                'date.required' => 'Created Date is required.',                                
            ];

            $tableData = [
                'sku' => $request->input('sku'),
               'price' => $request->input('price'),               
               'userid' => Auth::user()->id, 
               'vat' => $request->input('vat'),  
               'productid' => $request->get('product'),
               'customerid' => $request->get('customername'),
               'stock' => $request->input('stock'),
               'amount' => $request->input('amount'),          
               'updated_at' => $request->input('date'),
               'verified' =>0,
           ];

           if($request->input('payment_method') == 1){
            $validationRules['payment_method'] = 'required|numeric';
            $customMessage['payment_method.required'] = 'Payment Method field must be fill';
            $validationRules['amount'] = 'required|numeric';
            $customMessage['amount.required'] = 'Amount field must be fill';
            $tableData['cash'] = $request->input('amount');
            $tableData['amount'] = $request->input('amount');
        }
        if($request->input('payment_method') == 2){
            $validationRules['payment_method'] = 'required|numeric';
            $customMessage['payment_method.required'] = 'Payment Method field must be fill';
            $validationRules['amount'] = 'required|numeric';
            $customMessage['amount.required'] = 'Amount field must be fill';
            $validationRules['only_cheque_bank_name'] = 'required|numeric';
            $customMessage['only_cheque_bank_name.required'] = 'Bank Name field must be fill';
            $tableData['amount'] = $request->input('amount');
            $tableData['bank_id'] = $request->input('only_cheque_bank_name');
            $tableData['bank_amount'] = $request->input('amount');
        }
        if($request->input('payment_method') == 3){
            $validationRules['payment_method'] = 'required|numeric';
            $customMessage['payment_method.required'] = 'Payment Method field must be fill';
            $validationRules['amount'] = 'required|numeric';
            $customMessage['amount.required'] = 'Amount field must be fill';
            $validationRules['cash_amount'] = 'required|numeric';
            $customMessage['cash_amount.required'] = 'Cash Amount  field must be fill';
            $validationRules['both_cheque_bank_name'] = 'required|numeric';
            $customMessage['both_cheque_bank_name.required'] = 'Bank Name field must be fill';
            $validationRules['both_cheque_amount'] = 'required|numeric';
            $customMessage['both_cheque_amount.required'] = 'Cheque Amount  field must be fill';
            $customMessage['both_cheque_amount.required|numeric'] = 'Cheque Amount  field must be fill';
            $tableData['amount'] = $request->input('amount');
            $tableData['cash'] = $request->input('cash_amount');
            $tableData['bank_id'] = $request->input('both_cheque_bank_name');
            $tableData['bank_amount'] = $request->input('both_cheque_amount');
        }

     

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('addproducts')
            ->where('id', $id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Information Not Updated!!');
        }
        return redirect()->back()->with('msg', 'Information is Updated Successfully!!!');
        //return redirect()->route('allusers')->with('msg', 'Information is Updated Successfully!');
    }
    public function delete($id)
    {
        $delete[] = DB::table('addproducts')
            ->where("id", "=", "$id")
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Not Deleted!!');
        }

        return redirect()->route('allnewproduct')->with('msg', 'Deleted Successfully!');

    }
}
