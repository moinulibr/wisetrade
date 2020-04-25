<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    public function index(){
        $data['title'] = "Insert Customer";
        return view('admincontrol.customers.customers-reg',$data);
    }
    public function create(Request $request)
    {
    
         $validationRules =
            [
                'company' => 'required|max:100',
                'address' => 'required|max:100',
                'email' => 'required|max:50',
                'number' => 'required|max:13',
                'conperson' => 'required|max:50',
                'date' => 'required',
            ];

            $customMessage = [
                'company.required' => 'Company Name is required.',
                'address.required' => 'Address is required.',
                'email.required' => 'Email is required.',
                'number.required' => 'Contact Number is required',
                'number.required|max:13' => 'Contact Number is maximum 13 character ',
                'conperson.required' => 'Contact Person is required',
                'date'              => 'Created Date is required',
            ];

            $tableData = [
                'company_name' => $request->input('company'),
               'address' => $request->input('address'),
               'email' => $request->input('email'),
               'contact_number' => $request->input('number'),
               'contact_person' => $request->input('conperson'),
               'status' => 1,
               'verified' => 0,
               'created_at' => $request->input('date'),

           ];

           $validateFormData = request()->validate($validationRules, $customMessage);

           if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }
 
        $insert = DB::table('customers')
            ->insert($tableData);
 
        if (!$insert) {
            return redirect()->back()->with('msg', 'Invalid information, Not Inserted!!');
        }
        return redirect()->back()->with('error', 'Inserted Successfully!!');
    }

    public function view()
    {
        $data['company'] = DB::table('customers')
        ->where('customers.status','=',1)
        ->select('customers.*', DB::raw('(select sum(addproducts.stock) from addproducts where addproducts.customerid = customers.id) as totalStock'))->groupBy('customers.id')
        ->paginate(30);
        $data['title'] = "View Customer";
        return view('admincontrol.customers.all-customers', $data);
       
    }

    public function viewdetails(Request $request, $id)
    {
      $sdate =   $request->get("sdate");
      $edate =   $request->get("edate");

        $query = DB::table('addproducts')
        ->join('customers', 'addproducts.customerid', '=', 'customers.id')
        ->join('products', 'addproducts.productid', '=', 'products.id')   
        ->where("customers.id",'=', $id)
        ->select('customers.id', DB::raw('(select sum(addproducts.amount) from addproducts where addproducts.customerid = customers.id) as totalAmount'))
        ->select("addproducts.vat","addproducts.id","addproducts.price","addproducts.stock as addstok","addproducts.amount as adproPurchamount", "products.title as pname", "addproducts.created_at as adpDate",'customers.company_name as cusName','customers.contact_person as custName')
        ;
        if($sdate && $edate) {
            $query->where("addproducts.created_at", ">=",$sdate);          
            $query->where("addproducts.created_at", "<=", $edate);          
        }    
        else if($sdate){
            $query->where("addproducts.created_at", $sdate);      
        }  
        else if($edate){
            $query->where("addproducts.created_at", $date);      
        } 
        
        $data['company'] = $query->paginate(30); 
        $data['title'] = "View Search Customer";
        return view('admincontrol.customers.customers-all-product', $data);    
    }


    public function viewfrozen()
    {

        $data['company'] = DB::table('customers')
        ->where('customers.status','=',0)
        ->select('customers.*', DB::raw('(select sum(addproducts.stock) from addproducts where addproducts.customerid = customers.id) as totalStock'))->groupBy('customers.id')
        ->paginate(30);
        $data['title'] = "View Frozen Customer";
        return view('admincontrol.customers.all-frozen-customers', $data);
        /*
                $data['company'] = DB::table('customers')
                    ->select('*')
                    ->where('status','=',0)
                    ->paginate(10);
                return view('admincontrol.customers.all-frozen-customers', $data);
        */
    }

    public function edit($id)
    {

        $data['company'] = DB::table('customers')
            ->where('id', "=", $id)
            ->first();
            $data['title'] = "Update Customer";
        return view('admincontrol.customers.edit-customers', $data);
    }

    public function update(Request $request, $id)
    {
        
        
        $validationRules =
            [
                'company' => 'required|max:100',
                'address' => 'required|max:100',
                'email' => 'required|max:50',
                'number' => 'required|max:13',
                'conperson' => 'required|max:50',
                'date' => 'required',
            ];

        $customMessage = [
                'company.required' => 'Company Name is required.',
                'address.required' => 'Address is required.',
                'email.required' => 'Email is required.',
                'number.required' => 'Contact Number is required',
                'number.required' => 'Contact Number is required',
                'conperson.required' => 'Contact Person is required',
                'date.required' => 'Create Date is required',
            ];

        $tableData = [
            //'userid' => Auth::user()->id,
            /*
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'contract' => $request->input('contract'),
            //'status' => ,
            'type' => $request->input('creBy'),
            */
            'company_name' => $request->input('company'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('number'),
            'contact_person' => $request->input('conperson'),
            'status' => 1,
            'verified' => 0,
            'updated_at' => $request->input('date'),
        //'company' => $request->input('company'),
        //'userid' => $request->input('userid'),
        //'verified' => $request->input('verified'),
         
        ];

        $validateFormData = request()->validate($validationRules, $customMessage);

        if (!$validateFormData) {
            return redirect()->back()->withErrors($request->all());
        }

        $update = DB::table('customers')
            ->where('id', $id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Information Not Updated!!');
        }
        return redirect()->route('allcustomers')->with('msg', 'Information is Updated Successfully!!!');
        //return redirect()->route('allusers')->with('msg', 'Information is Updated Successfully!');
    }

    public function delete($id)
    {
        
        $delete = DB::table('customers')
            ->where("id", "=", "$id")
            ->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Not Deleted!!');
        }

        return redirect()->route('allcustomers')->with('msg', 'Deleted Successfully!');

    }
    public function frozen($id)
    {
        $tableData = [
            'status' => 0
        ];

        $update = DB::table('customers')
            ->where('id', $id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Information Not Frozen!!');
        }
        return redirect()->back()->with('msg', 'Information is Frozen Successfully!!!');

    }
   
    public function active($id)
    {
        $tableData = [
            'status' => 1
        ];

        $update = DB::table('customers')
            ->where('id', $id)
            ->update($tableData);

        if (!$update) {
            return redirect()->back()->with('error', 'Information Not Active!!');
        }
        return redirect()->back()->with('msg', 'Information is Active Successfully!!!');

    }
}
