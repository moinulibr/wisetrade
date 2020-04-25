<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');    
    })->name('homepage');

    /*Change Password */

    Route::get('/change-password','Auth\ChangePasswordController@index')->name('changepassword');
    Route::post('/update-password','Auth\ChangePasswordController@update')->name('updatepassword');

        /* User  */
    Route::get('/home', 'Users\UserController@index')->middleware('isAdmin')->name('home');
    Route::post('/create-user','Users\UserController@create')->middleware('isAdmin')->name('user');
    Route::get('/add-new-user', 'Users\UserController@admincontrol')->middleware('isAdmin')->name('adminregister');
    Route::get('/active-user', 'Users\UserController@view')->middleware('isAdmin')->name('allusers');
    Route::get('/frozen-user', 'Users\UserController@viewFrozen')->middleware('isAdmin')->name('frozenuser');
    Route::get('/edit-user/{id}', 'Users\UserController@edit')->middleware('isAdmin')->name('edituser');
    Route::post('/update-user/{id}', 'Users\UserController@update')->middleware('isAdmin')->name('updateuser');
    Route::get('/fridge-user/{id}', 'Users\UserController@fridge')->middleware('isAdmin')->name('fridge-users');
    Route::get('/active-user/{id}', 'Users\UserController@active')->middleware('isAdmin')->name('active-users');

         /* Bank */

         Route::get('/create-bank','Bank\BankController@index')->middleware('isAdmin')->name('createbank');
         Route::post('/add-bank-info','Bank\BankController@create')->middleware('isAdmin')->name('addbank');
         Route::get('/view-all-bank','Bank\BankController@view')->middleware('isAdmin')->name('allviewbank');
         Route::get('/frozen-all-bank','Bank\BankController@frozen')->middleware('isAdmin')->name('frozenviewbank');
         Route::get('/active-all-bank/{id}','Bank\BankController@active')->middleware('isAdmin')->name('activeviewbank');
         Route::get('/edit-bank-info/{id}','Bank\BankController@edit')->middleware('isAdmin')->name('editbank');
         Route::post('/update-bank-info/{id}','Bank\BankController@update')->middleware('isAdmin')->name('updatebank');
         Route::get('/delete-bank-info/{id}','Bank\BankController@delete')->middleware('isAdmin')->name('deletebank');

        /* Person Expenses */
        Route::get('/personal-expanse-management-insert','PersonalExpenses\PersonalexpensesController@index')->middleware('isAdmin')->name('insertexpenses');
        Route::post('/personal-expanse-management-insert','PersonalExpenses\PersonalexpensesController@create')->middleware('isAdmin')->name('createexpenses');
        Route::get('/personal-expanse-management-view','PersonalExpenses\PersonalexpensesController@store')->middleware('isAdmin')->name('viewexpenses');
        Route::get('/personal-expanse-management-update/{id}','PersonalExpenses\PersonalexpensesController@edit')->middleware('isAdmin')->name('editexpenses');
        Route::post('/personal-expanse-management-update/{id}','PersonalExpenses\PersonalexpensesController@update')->middleware('isAdmin')->name('updateexpenses');
        Route::get('/personal-expanse-management-delete/{id}','PersonalExpenses\PersonalexpensesController@destroy')->middleware('isAdmin')->name('deleteexpenses');
//--------------------------------------------------------------------------------------------------------------------- -----

            /* Employees  */
            Route::get('/create-employee','Employee\EmployeeController@index')->name('employee');
            Route::post('/create-employee','Employee\EmployeeController@create')->name('addemployee');
            Route::get('/all-employee', 'Employee\EmployeeController@view')->name('allemployee');
            Route::get('/frozon-employee', 'Employee\EmployeeController@frozon')->name('frozonemployee');
            Route::get('/edit-employee/{id}', 'Employee\EmployeeController@edit')->name('editemployee');
            Route::post('/edit-users/{id}', 'Employee\EmployeeController@update')->name('updateemployee');
            Route::get('/delete-employee/{id}', 'Employee\EmployeeController@delete')->name('deleteemployee');
            Route::get('/frozen-employee/{id}', 'Employee\EmployeeController@frozen')->name('frozenEmployee');
            Route::get('/unfrozen-employee/{id}', 'Employee\EmployeeController@unfrozen')->name('unfrozenEmployee');


        /* Projects */
            
        Route::get('/create-project','Projects\ProjectsController@index')->name('createprojects');
        Route::post('/add-project','Projects\ProjectsController@insert')->name('insertprojects');
        Route::get('/all-project','Projects\ProjectsController@view')->name('viewprojects');
        Route::get('/all-frozen-project','Projects\ProjectsController@frozen')->name('viewfrozenprojects');
        Route::get('/edit-project/{id}','Projects\ProjectsController@edit')->name('editprojects');
        Route::post('/update-project/{id}','Projects\ProjectsController@update')->name('updateprojects');
        Route::get('/fridge-project/{id}','Projects\ProjectsController@fridge')->name('fridgeprojects');
        Route::get('/active-project/{id}','Projects\ProjectsController@active')->name('activeprojects');
        Route::get('/delete-project/{id}','Projects\ProjectsController@delete')->name('deleteprojects');

      /* Sales */ 
      
        Route::get('/create-sales','Sales\SalesController@index')->name('createsales');
        Route::get('/view-all-sales-prod','Sales\SalesController@view')->name('viewallsalesproducts');
        Route::get('/edit-sales-prod/{id}','Sales\SalesController@edit')->name('editsalesproducts');
        Route::post('/update-sales-prod/{id}','Sales\SalesController@update')->name('updatesalesproducts');
        Route::get('/delete-sales-prod/{id}','Sales\SalesController@delete')->name('deletesalesproducts');

        /* Salary */

        Route::get('/add-salary','Salary\SalaryController@index')->name('addsalary');
        Route::post('/create-salary','Salary\SalaryController@create')->name('createsalary');
        Route::get('/view-salary','Salary\SalaryController@view')->name('viewsalary');
        Route::get('/view-frozen-salary','Salary\SalaryController@viewfrozen')->name('viewFrozenSalary');
        Route::get('/edit-salary/{id}','Salary\SalaryController@edit')->name('editsalary');
        Route::post('/update-salary/{id}','Salary\SalaryController@update')->name('updatesalary');
        Route::get('/fridge-salary/{id}','Salary\SalaryController@fridge')->name('fridgesalary');
        Route::get('/delete-salary/{id}','Salary\SalaryController@delete')->name('deletetsalary');


        /* Daly Expenses */

        Route::get('/add-expense','DalyExpense\DalyexpenseController@index')->name('addexpense');
        Route::post('/create-expense','DalyExpense\DalyexpenseController@create')->name('createexpense');
        Route::get('/view-expense','DalyExpense\DalyexpenseController@view')->name('viewexpense');
        Route::get('/edit-expense/{id}','DalyExpense\DalyexpenseController@edit')->name('editwexpense');
        Route::post('/update-expense/{id}','DalyExpense\DalyexpenseController@update')->name('updateexpense'); 
        Route::get('/delete-expense/{id}','DalyExpense\DalyexpenseController@delete')->name('deleteexpense');

         /* service_men */

        Route::get('/add-service-men','Servicemen\ServicemenController@index')->name('addservicemen');
        Route::post('/create-service-men','Servicemen\ServicemenController@create')->name('createservicemen');
        Route::get('/view-service-men','Servicemen\ServicemenController@view')->name('viewservicemen');
        Route::get('/frozen-service-men','Servicemen\ServicemenController@frozen')->name('frozenservicemen');
        Route::get('/edit-service-men/{id}','Servicemen\ServicemenController@edit')->name('editservicemen');
        Route::post('/update-service-men/{id}','Servicemen\ServicemenController@update')->name('updateservicemen');
        Route::get('/fridge-service-men/{id}','Servicemen\ServicemenController@fridge')->name('fridgeservicemen');
        Route::get('/active-service-men/{id}','Servicemen\ServicemenController@active')->name('activeservicemen');
        //Route::get('/delete-service-men/{id}','Servicemen\ServicemenController@delete')->name('deleteservicemen');

        /* Bank Deposit */

        Route::get('/create-bank-deposit','BankDeposit\BankDepositController@index')->name('createbankdeposit');
        Route::post('/add-bank-deposit','BankDeposit\BankDepositController@insert')->name('insertbankdeposit');
        Route::get('/view-bank-deposit','BankDeposit\BankDepositController@view')->name('viewbankdeposit');
        Route::get('/all-frozen-bank-deposit','BankDeposit\BankDepositController@allfrozen')->name('frozenallbankdeposit');
        Route::get('/edit-bank-deposit/{id}','BankDeposit\BankDepositController@edit')->name('editbankdeposit');
        Route::post('/update-bank-deposit/{id}','BankDeposit\BankDepositController@update')->name('updatetbankdeposit');
        Route::get('/frozen-bank-deposit/{id}','BankDeposit\BankDepositController@frozen')->name('frozenbankdeposit');
        Route::get('/unfrozen-bank-deposit/{id}','BankDeposit\BankDepositController@unfrozen')->name('unfrozenbankdeposit');
        Route::get('/delete-bank-deposit/{id}','BankDeposit\BankDepositController@delete')->name('deletebankdeposit');



            // Customers //
        // Route::get('/create-customers','Customers\CustomersController@index')->name('addecustomers');
        Route::get('/create-customers','Customers\CustomersController@index')->name('createcustomers');
        Route::post('/add-customers','Customers\CustomersController@create')->name('addcustomer');
        Route::get('/all-customers', 'Customers\CustomersController@view')->name('allcustomers');

        Route::get('/view-detalis/{id}', 'Customers\CustomersController@viewdetails')->name('viewdetailthiscustomers');

        Route::get('/all-frozen-customers', 'Customers\CustomersController@viewfrozen')->name('allfrozencustomers');
        Route::get('/edit-customers/{id}', 'Customers\CustomersController@edit')->name('editcustomers');
        Route::post('/update-customers/{id}', 'Customers\CustomersController@update')->name('updatecustomers');
        Route::get('/delete-customers/{id}', 'Customers\CustomersController@delete')->name('deletecustomers');
        Route::get('/frozen-customers/{id}', 'Customers\CustomersController@frozen')->name('frozencustomers');
        Route::get('/active-customers/{id}', 'Customers\CustomersController@active')->name('activecustomers');
        //////END CUSTOMER///////


       $arr = array(
            "Products\ProductsController" => "products-management|insertproducts|addproduct|allproduct|editproducts|updateproduct|deleteproducts",
            "Products\AddproductController" => "additional-products-management|addiproducts|addproduct|allproduct|editproducts|updateproduct|deleteproducts"
        );

        foreach($arr as $key=>$value){
                $route = explode("|", $value);
                Route::get("/{$route[0]}/insert", "$key@index")->name($route[1]);
                /*
                Route::post("/{$route}/insert", "$key@create")->name($route[2]);
                Route::get("/{$route}/view", "$key@index")->name($route[3]);
                Route::get("/{$route}/update/{id}", "$key@index")->name($route[4]);
                Route::post("/{$route}/update/{id}", "$key@index")->name($route[5]);
                Route::get("/{$route}/delete/{id}", "$key@index")->name($route[6]);
                */
        }


       ///PRODUCTS
       
      // Route::get('/insert-products','Products\ProductsController@index')->name('insertproducts');
       Route::post('/add-products','Products\ProductsController@create')->name('addproduct');
       Route::get('/all-products', 'Products\ProductsController@view')->name('allproduct');
       Route::get('/seller-report/{id}', 'Products\ProductsController@sellerReport')->name('kre');
       Route::get('/edit-products/{id}', 'Products\ProductsController@edit')->name('editproducts');
       Route::post('/update-products/{id}', 'Products\ProductsController@update')->name('updateproduct');
       Route::get('/delete-products/{id}', 'Products\ProductsController@delete')->name('deleteproducts');

       ///END PRODUCTS



       ///ADDITIONAL PRODUCTS
       
       Route::get('/addi-products','Products\AddproductController@index')->name('addiproducts');
       Route::post('/new-products','Products\AddproductController@create')->name('newproducts');
       Route::get('/allnew-products', 'Products\AddproductController@view')->name('allnewproduct');
       Route::get('/edit-newproducts/{id}', 'Products\AddproductController@edit')->name('editnewproducts');
       Route::post('/update-newproducts/{id}', 'Products\AddproductController@update')->name('updatenewproducts');
       Route::get('/delete-newproducts/{id}', 'Products\AddproductController@delete')->name('deletenewproducts');

       ///END ADDITIONAL PRODUCTS

       ///PAYMENT

       Route::get('/payments','Payment\PaymentController@index')->name('payments');
       Route::post('/payment-inserts','Payment\PaymentController@create')->name('insertpayments');
       Route::get('/payments-view','Payment\PaymentController@view')->name('paymentview');
       Route::get('/payments-edit/{id}','Payment\PaymentController@edit')->name('editpayment');
       Route::get('/payment-delete/{id}','Payment\PaymentController@delete')->name('deletepayments');
       Route::post('/payment-update/{id}','Payment\PaymentController@update')->name('updatepayment');

       //Invoice

       Route::get('/invoice','Invoice\InvoiceController@index')->name('invoice');


       ///UNITS TABLE

       Route::get('/create-unit','Units\UnitsController@index')->name('createunits');
       Route::post('/add-units','Units\UnitsController@create')->name('addunits');
       Route::get('/all-units', 'Units\UnitsController@view')->name('allunits');
       Route::get('/edit-units/{id}', 'Units\UnitsController@edit')->name('editunits');
       Route::post('/update-units/{id}', 'Units\UnitsController@update')->name('updateunits');
       Route::get('/delete-units/{id}', 'Units\UnitsController@delete')->name('deleteunits');

       ///DEMO PAGE START
       Route::get('/demo-page','Demo\DemoController@index')->name('demo');
       //Route::post('/insert-demo','Demo\DemoController@insert')->name('insert');




       ////DEMO PAGE END


});



//Route::resource('newuser','NewuserController');


