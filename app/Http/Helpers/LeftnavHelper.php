<?php

function leftMenu()
{

    $arr = [

       /*
        [
            'text' => 'Only Admins',
            'url' => '#',
            'icon' => 'reply',
            'can' => [2],
            'submenu' => [
                [
                    'text' => 'only admin',
                    'url' => route('adminregister'),
                    'can' => [2],
                ],
                [
                    'text' => 'only user',
                    'url' => route('allusers'),
                    'can' => [1],
                ],
            ],
        ],
         */

        [
            'text' => 'Dashboard',
            'url' => '#',
        ],/*
        [
            'text' => 'Posts',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Sub Menu 1',
                    'url' => '#',

                ],
                [
                    'text' => 'Sub Menu 2',
                    'url' => '#',
                    'submenu' => [
                        [
                            'text' => 'post 1',
                            'url' => '#',
                        ],
                        [
                            'text' => 'Sub Menu 2.2',
                            'url' => '#',
                        ],
                    ],
                ],
            ],
        ],*/
        [
            'text' => 'Invoice',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Ivnoice view',
                    'url' => route('invoice'),

                ],               
                
                
            ],
        ],
        [
            'text' => 'Users',
            'url' => '#',
            'icon' => 'reply',
            'can' => [2],
            'submenu' => [
                [
                    'text' => 'Add  User',
                    'url' => route('adminregister'),

                ],
                [
                    'text' => 'Active Users',
                    'url' => route('allusers'),
                ],
                [
                    'text' => 'Frozen Users',
                    'url' => route('frozenuser'),
                ],
            ],
        ],
        [
            'text' => 'Personal Expenses',
            'url' => '#',
            'icon' => 'reply',
            'can' => [2],
            'submenu' => [
                [
                    'text' => 'Add  Expenses',
                    'url' => route('insertexpenses'),

                ],
                [
                    'text' => 'View Expenses',
                    'url' => route('viewexpenses'),
                ],
            ],
        ],
        [
            'text' => 'Employees',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add  Employee',
                    'url' => route('employee'),

                ],
                [
                    'text' => 'Active Employees',
                    'url' => route('allemployee'),
                ],
                [
                    'text' => 'Frozen Employees',
                    'url' => route('frozonemployee'),
                ],
            ],
        ],

        [
            'text' => 'Bank',
            'url' => '#',
            'icon' => 'reply',
            'can' => [2],
            'submenu' => [
                [
                    'text' => 'Add Bank Account',
                    'url' => route('createbank'),

                ],
                [
                    'text' => 'Active Bank Account',
                    'url' => route('allviewbank'),
                ],
                [
                    'text' => 'Frozen Bank Account',
                    'url' => route('frozenviewbank'),
                ],
            ],
        ],
        [
            'text' => 'Customers',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Customer',
                    'url' => route('createcustomers'),

                ],               
                [
                    'text' => 'Active Customer',
                    'url' => route('allcustomers'),
                ],
                [
                    'text' => 'Frozen Customer',
                    'url' => route('allfrozencustomers'),
                ],
                
            ],
        ],
        [
            'text' => 'Projects',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Project',
                    'url' => route('createprojects'),

                ],
                [
                    'text' => 'Active Projects',
                    'url' => route('viewprojects'),
                ],
                [
                    'text' => 'Frozen Projects',
                    'url' => route('viewfrozenprojects'),
                ],
            ],
        ],
        [
            'text' => 'Products',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Products',
                    'url' => route('insertproducts'),

                ],               
                [
                    'text' => 'Active Product',
                    'url' => route('allproduct'),
                ],
                [
                    'text' => 'Frozen Product',
                    'url' => route('allproduct'),
                ],
                
            ],
        ],
        [
            'text' => 'Additional Products',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Products',
                    'url' => route('addiproducts'),

                ],               
                [
                    'text' => 'Active Product',
                    'url' => route('allnewproduct'),
                ],
                [
                    'text' => 'Frozen Product',
                    'url' => route('allnewproduct'),
                ],
                
            ],
        ],
        [
            'text' => 'Payment',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Payment',
                    'url' => route('payments'),

                ],               
                [
                    'text' => 'Active Payment',
                    'url' => route('paymentview'),
                ],
                [
                    'text' => 'Frozen Payment',
                    'url' => route('paymentview'),
                ],
                
            ],
        ],
        [
            'text' => 'Sells',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                /*
                [
                'text' => 'Sales Product',
                'url' => route('createsales'),

                ], */
                [
                    'text' => 'New Sells',
                    'url' => route('createsales'),
                ],
                [
                    'text' => 'Active Sells Product',
                    'url' => route('viewallsalesproducts'),
                ],
                [
                    'text' => 'Frozen Sells Product',
                    'url' => route('viewallsalesproducts'),
                ],
            ],
        ],
        [
            'text' => 'Salary',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Salary',
                    'url' => route('addsalary'),
                ],
                [
                    'text' => 'Active Salary',
                    'url' => route('viewsalary'),
                ],
                [
                    'text' => 'Frozen Salary',
                    'url' => route('viewFrozenSalary'),
                ],
            ],
        ],
        [
            'text' => 'Daly Expenses',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Expense',
                    'url' => route('addexpense'),
                ],
                [
                    'text' => 'Active Expense',
                    'url' => route('viewexpense'),
                ],/*
                [
                    'text' => 'Frozen Expense',
                    'url' => '#',
                ],*/
            ],
        ],
        [
            'text' => 'Service Men',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Service Men',
                    'url' => route('addservicemen'),
                ],
                [
                    'text' => 'Active Service Men',
                    'url' => route('viewservicemen'),
                ],
                
                [
                    'text' => 'Frozen Service Men',
                    'url' => route('frozenservicemen'),
                ],
            ],
        ],
        [
            'text' => 'Bank Deposit',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Add Deposit',
                    'url' => route('createbankdeposit'),
                ],
                [
                    'text' => 'Active Deposit',
                    'url' => route('viewbankdeposit'),
                ],
                [
                    'text' => 'Frozen Deposit',
                    'url' => route('frozenallbankdeposit'),
                ],
            ],
        ],
        [
            'text' => 'Units',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Insert Units',
                    'url' => route('createunits'),

                ],
                [
                    'text' => 'Units View',
                    'url' => route('allunits'),
                ],               
                
                
            ],
        ],
        [
            'text' => 'Demo',
            'url' => '#',
            'icon' => 'reply',
            'submenu' => [
                [
                    'text' => 'Demo Page',
                    'url' => route('demo'),

                ],
                              
                
                
            ],
        ],
    ];
    return $arr;

}

//echo '<pre>';
//print_r(leftMenu());
//echo '</pre>';
