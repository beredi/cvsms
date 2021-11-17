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
                'name' => 'Customers',
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
                'delete_customer' => 'Are you sure that you want to delete customer: :name :lastname ?'
            ],
            'employees' => [
                'name' => 'Employees',
                'new-record' => 'Add employee',
                'all-records' => 'All employees'
            ],
            'user' => [
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
            'cancel' => 'Cancel'
        ],
        'validator' => [
            'required' => 'The field :field is required.',
            'integer' => 'The value of :field must be an integer.',
            'numeric' => 'The value of :field must be a number.',
            'positive_number' => 'The value of :field must be a positive number.'
        ]
    ]


];
