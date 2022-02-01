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
                'name' => 'Vehicle',
                'plural_name' => 'Vehicles',
                'new-record' => 'Add vehicle',
                'update-record' => 'Update vehicle',
                'all-records' => 'All vehicles',
                'create_topic' => 'Create vehicle :topic',
                'update_topic' => 'Update vehicle :topic',
                'config' => 'Configurations',
                'vehicles_config' => 'Vehicles configuration',
                'vehicle' => [
                    'name' => 'Name',
                    'types' => 'Types',
                    'type' => 'Type',
                    'brands' => 'Brands',
                    'brand' => 'Brand',
                    'models' => 'Models',
                    'model' => 'Model',
                    'year' => 'Year of production',
                    'chassis_num' => 'Chassis number',
                    'engine' => 'Enginge',
                    'engine_volume' => 'Engine volume [cm3]',
                    'engine_power' => 'Engine power [kW]',
                    'transmission' => 'Transmission'
                ],
                'messages' => [
                    'type_deleted' => ':type has been successfully deleted',
                    'type_created' => ':type has been successfully created',
                    'type_updated' => ':type has been successfully updated',
                    'vehicle_created' => 'Vehicle has been successfully created.',
                    'vehicle_deleted' => 'Vehicle has been successfully deleted.',
                    'vehicle_updated' => 'Vehicle has been successfully updated.'
                ]
            ],
            'services' => [
                'name' => 'Service',
                'plural_name' => 'Services',
                'new-record' => 'Add service',
                'update-record' => 'Update service',
                'all-records' => 'All services',
                'service' => [
                    'km' => 'Actual km',
                    'name' => 'Name',
                    'description' => 'Description',
                    'time_spent' => 'Time spent',
                    'price' => 'Price',
                    'paid' => 'Paid',
                    'unpaid' => 'Unpaid',
                    'date' => 'Date'
                ],
                'messages' => [
                    'service_created' => 'Service has been successfully created.',
                    'service_deleted' => 'Service has been successfully deleted.',
                    'service_updated' => 'Service has been successfully updated.'
                ]
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
                    'employed_to' => 'Employed to',
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
            'save' => 'Save',
            'update' => 'Update',
            'delete_msg' => 'Are you sure that you want to delete?',
            'add' => 'Add',
            'version' => 'Version',
            'show' => 'Show',
            'back_to' => 'Back to :where'
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
        ],
        'settings' => [
            'language' => 'Language',
            'name' => 'Setting',
            'plural_name' => 'Settings',
            'new-record' => 'Add setting',
            'all-records' => 'All settings',
            'update-record' => 'Update setting',
            'settings-for' => 'Settings for :name'
        ]
    ]


];
