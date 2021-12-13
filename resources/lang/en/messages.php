<?php

return [
    'admin' => [
        'dashboard' => [
            'welcome' => 'Welcome back :Name',
            'name' => 'Dashboard'
        ],
        'menu' => [
            'service' => [
                'name' => 'Service',
                'new-record' => 'Add service record',
                'all-records' => 'All service records'
            ],
            'vehicles' => [
                'name' => 'Vehicles',
                'new-record' => 'Add vehicle',
                'all-records' => 'All vehicles'
            ],
            'customers' => [
                'name' => 'Customer',
                'plural_name' => 'Customers',
                'new-record' => 'Add customer',
                'update-record' => 'Update customer',
                'all-records' => 'All customers',
                'customer' => [
                    'name' => 'Name',
                    'lastname' => 'Lastname',
                    'phone' => 'Phone number',
                    'email' => 'Email',
                    'address' => 'Address',
                    'id_card' => 'Card ID',
                    'owe' => 'Owe'
                ],
                'delete_customer' => 'Are you sure that you want to delete customer: :name :lastname ?',
                'deleted_customer' => 'Customer :name :lastname was successful deleted',
                'updated_customer' => 'Customer :name :lastname was successful updated',
                'created_customer' => 'Customer :name :lastname was successful created'
            ],
            'employees' => [
                'name' => 'Employee',
                'plural_name' => 'Employees',
                'new-record' => 'Add employee',
                'all-records' => 'All employees',
                'update-record' => 'Update employee',
                'employee' => [
                    'employed_from' => 'Employed from',
                    'password' => 'Password',
                    'password_confirm' => 'Confirm Password',
                    'user-role' => 'User role'
                ],
                'delete_employee' => 'Are you sure that you want to delete employee: :name :lastname ?',
                'deleted_employee' => 'Employee :name :lastname was successful deleted',
                'created_employee' => 'Employee :name :lastname was successful created',
                'updated_employee' => 'Employee :name :lastname was successful updated'
            ],
            'user' => [
                'name' => 'User',
                'plural_name' => 'Users',
                'profile' => 'Profile',
                'settings' => 'Settings',
                'activity-log' => 'Activity log',
                'logout' => 'Logout',
                'logout_q' => 'Ready to leave?',
                'logout_m' => 'Select "Logout" below if you are ready to end your current session.'
            ]
        ],
        'general' => [
            'search-for' => 'Search for...',
            'edit' => 'Edit',
            'delete' => 'Delete',
            'cancel' => 'Cancel',
            'date' => 'Date',
            'message' => 'Message',
            'admin' => 'Admin',
            'save' => 'Save'
        ],
        'validator' => [
            'required' => 'The field :field is required.',
            'integer' => 'The value of :field must be an integer.',
            'numeric' => 'The value of :field must be a number.',
            'positive_number' => 'The value of :field must be a positive number.',
            'unique' => 'The value of :field is already taken. It must be unique.',
            'min' => 'The value of :field must contains minimum :count characters.'
        ],
        'permissions' => [
            'name' => 'Permissions',
            'title' => 'Permissions for role',
            'updated-message' => 'Permissions have been updated.'
        ]
    ]


];
