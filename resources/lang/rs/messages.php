<?php

return [
    'admin' => [
        'dashboard' => [
            'welcome' => 'Dobro došli nazad :Name',
            'name' => 'Komandna tabla'
        ],
        'menu' => [
            'service' => [
                'name' => 'Servis',
                'new-record' => 'Nova evidencija o servisu',
                'all-records' => 'Sve evidencije o servisima'
            ],
            'vehicles' => [
                'name' => 'Vozilo',
                'plural_name' => 'Vozila',
                'new-record' => 'Dodaj vozilo',
                'update-record' => 'Ažuriraj vozilo',
                'all-records' => 'Sva vozila',
                'create_topic' => 'Dodaj vozilo :topic',
                'update_topic' => 'Ažurira vozilo :topic',
                'config' => 'Konfiguracije',
                'vehicles_config' => 'Konfiguracije vozila',
                'vehicle' => [
                    'name' => 'Naziv',
                    'types' => 'Vrste',
                    'type' => 'Vrsta',
                    'brands' => 'Marke',
                    'brand' => 'Marka',
                    'models' => 'Modeli',
                    'model' => 'Model',
                    'year' => 'Godina proizvodnje',
                    'chassis_num' => 'Broj šasije',
                    'engine' => 'Motor',
                    'engine_volume' => 'Zapremnina motora [cm3]',
                    'engine_power' => 'Snaga motora [kW]',
                    'transmission' => 'Menjač'
                ],
                'messages' => [
                    'type_deleted' => ':type je uspešno obrisan.',
                    'type_created' => ':type je uspešno dodat.',
                    'type_updated' => ':type je uspešno ažuriran.',
                    'vehicle_created' => 'Vozilo je uspešno dodato.',
                    'vehicle_deleted' => 'Vozilo je uspešno obrisano.',
                    'vehicle_updated' => 'Vozilo je uspešno ažurirano.'
                ]
            ],
            'services' => [
                'name' => 'Servis',
                'plural_name' => 'Servisi',
                'new-record' => 'Nova evidencija o servisu',
                'update-record' => 'Ažuriranje evidencije o servisu',
                'all-records' => 'Sve evidencije o servisima',
                'service' => [
                    'km' => 'Kilometraža',
                    'name' => 'Naziv',
                    'description' => 'Opis',
                    'time_spent' => 'Vreme',
                    'price' => 'Cena',
                    'paid' => 'Plaćeno',
                    'unpaid' => 'Neplaćeno',
                    'date' => 'Datum'
                ],
                'messages' => [
                    'service_created' => 'Servis je uspešno dodat.',
                    'service_deleted' => 'Servis je uspešno obrisan.',
                    'service_updated' => 'Servis je uspešno ažuriran.'
                ]
            ],
            'customers' => [
                'name' => 'Mušterija',
                'plural_name' => 'Mušterije',
                'new-record' => 'Dodaj mušteriju',
                'update-record' => 'Ažuriraj mušteriju',
                'all-records' => 'Sve mušterije',
                'customer' => [
                    'name' => 'Ime',
                    'lastname' => 'Prezime',
                    'phone' => 'Broj telefona',
                    'email' => 'Email',
                    'address' => 'Adresa',
                    'id_card' => 'Broj lične karte',
                    'owe' => 'Duguje'
                ],
                'delete_customer' => 'Da li si siguran da želiš da obrišeš mušteriju: :name :lastname ?',
                'deleted_customer' => 'Mušterija :name :lastname je uspešno obrisana.',
                'updated_customer' => 'Mušterija :name :lastname je uspešno ažurirana.',
                'created_customer' => 'Mušterija :name :lastname je uspešno dodata.'
            ],
            'employees' => [
                'name' => 'Radnik',
                'plural_name' => 'Radnici',
                'new-record' => 'Dodaj radnika',
                'all-records' => 'Svi radnici',
                'update-record' => 'Ažuriraj radnika',
                'employee' => [
                    'employed_from' => 'Zaposlen od',
                    'employed_to' => 'Zaposlen do',
                    'password' => 'Šifra',
                    'password_confirm' => 'Ponovi šifru',
                    'user-role' => 'Rola'
                ],
                'delete_employee' => 'Da li si siguran da želiš da obrišeš zaposlenog: :name :lastname ?',
                'deleted_employee' => 'Radnik :name :lastname je uspešno obrisan.',
                'created_employee' => 'Radnik :name :lastname je uspešno dodat.',
                'updated_employee' => 'Radnik :name :lastname je uspešno ažuriran.'
            ],
            'user' => [
                'name' => 'Zaposlen',
                'plural_name' => 'Zaposleni',
                'profile' => 'Profil',
                'settings' => 'Podešavanja',
                'activity-log' => 'Activity log',
                'logout' => 'Odjavi se',
                'logout_q' => 'Spremni za odjavu?',
                'logout_m' => 'Klinki "Odjavi se" ispod ako želiš da se odjaviš.'
            ]
        ],
        'general' => [
            'search-for' => 'Traži...',
            'edit' => 'Urediti',
            'delete' => 'Obrisati',
            'cancel' => 'Poništiti',
            'date' => 'Datum',
            'message' => 'Poruka',
            'admin' => 'Admin',
            'save' => 'Sačuvati',
            'update' => 'Ažurirati',
            'delete_msg' => 'Da li ste sigurni da želite da obrišete?',
            'add' => 'Dodaj',
            'version' => 'Verzija',
            'show' => 'Prikaži',
            'back_to' => 'Nazad na :where'
        ],
        'validator' => [
            'required' => 'Polje :field je obavezno.',
            'integer' => 'Vrednost polja :field mora da bude ceo broj.',
            'numeric' => 'Vrednost polja :field mora da bude broj.',
            'positive_number' => 'Vrednost polja :field mora da bude pozitivan broj.',
            'unique' => 'Vrednost polja :field se već koristi. Mora da bude unikat.',
            'min' => 'Vrednost polja :field mora da sadrži najmanje :count znakova.'
        ],
        'permissions' => [
            'name' => 'Dozvole',
            'title' => 'Dozvole za rolu',
            'updated-message' => 'Dozvole su uspešno ažurirane.'
        ],
        'settings' => [
            'language' => 'Jezik',
            'name' => 'Podešavanje',
            'plural_name' => 'Podešavanja',
            'new-record' => 'Dodaj podešavanje',
            'all-records' => 'Sva podešavanja',
            'update-record' => 'Ažuriraj podešavanja',
            'settings-for' => 'Podešavanja za :name'
        ]
    ]


];
