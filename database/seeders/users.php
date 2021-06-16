<?php

$permissions = [
    "faculty" => ["create", "edit", "delete"],
    "department" => ["create", "edit", "delete"],
    "speciality" => ["create", "edit", "delete"],
    "student" => ["create", "edit", "delete"],
    "theme" => ["create", "edit", "delete"],
];

$roles = [
    "admin" => [
        "faculty" => ["create", "edit", "delete"],
        "department" => ["create", "edit", "delete"],
        "speciality" => ["create", "edit", "delete"],
    ],
    "department-chief" => [
        "student" => ["edit"],
    ],
    "teacher" => [
        "theme" => ["create", "edit", "delete"],
    ],
    "student" => [],
];

$etudiants = [
    [
        'lastname' => 'Aggoun',
        'firstname' => 'Houda',
        'role' => 'student',
        'email' => 'houda@mail.com',
        'password' => 'houda123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'Sissaoui',
        'firstname' => 'Nedjma',
        'role' => 'student',
        'email' => 'nedjma@mail.com',
        'password' => 'nedjma123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'Ghezail',
        'firstname' => 'Ikhlas',
        'role' => 'student',
        'email' => 'ikhlas@mail.com',
        'password' => 'ikhlas123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'Benredjem',
        'firstname' => 'Ridha',
        'role' => 'student',
        'email' => 'ridha@mail.com',
        'password' => 'ridha123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'Guerfi',
        'firstname' => 'Manel',
        'role' => 'student',
        'email' => 'manel@mail.com',
        'password' => 'manel123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'Zeghadnia',
        'firstname' => 'Feriel',
        'role' => 'student',
        'email' => 'feriel@mail.com',
        'password' => 'saleh',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'harrati',
        'firstname' => 'rania',
        'role' => 'student',
        'email' => 'rania@mail.com',
        'password' => 'rania123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'Boughani',
        'firstname' => 'Mariem',
        'role' => 'student',
        'email' => 'mariem@mail.com',
        'password' => 'mariem123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'oulaceb',
        'firstname' => 'amina',
        'role' => 'student',
        'email' => 'amina@mail.com',
        'password' => 'amina123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'bousri',
        'firstname' => 'maroua',
        'role' => 'student',
        'email' => 'maroua@mail.com',
        'password' => 'maroua123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'remadnia',
        'firstname' => 'aissam',
        'role' => 'student',
        'email' => 'aissam@mail.com',
        'password' => 'aissam123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ],
    [
        'lastname' => 'benradouene',
        'firstname' => 'houaida',
        'role' => 'student',
        'email' => 'houaida@mail.com',
        'password' => 'houaida123',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'diploma' => 'master',
        'speciality_id' => 3,
    ]
];

$enseignants = [
    [
        'lastname' => 'abdelkrim',
        'firstname' => 'amirat',
        'role' => 'teacher',
        'email' => 'abdkrim@mail.com',
        'password' => 'abdelkrim',
        'address' => 'souk ahras',
        'speciality' => 'génie logiciel',
        'grade' => 'Professeur',
        'phone' => '0664646464',
        "department_id" => 1,
    ],
    [
        'lastname' => 'bouchrika',
        'firstname' => 'imad',
        'role' => 'teacher',
        'email' => 'imad@mail.com',
        'password' => 'imad',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'grade' => 'Professeur',
        'speciality' => 'Intellegence Artificiele',
        "department_id" => 1,
    ],

    [
        'lastname' => 'khedairia',
        'firstname' => 'sofiane',
        'role' => 'teacher',
        'email' => 'sofiane@mail.com',
        'password' => 'sofiane',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'grade' => 'MCA',
        'speciality' => 'Intellegence Artificiele',
        "department_id" => 1,
    ],
    [
        'lastname' => 'Bekhouch',
        'firstname' => 'amara',
        'role' => 'teacher',
        'email' => 'amara@mail.com',
        'password' => 'amara',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'grade' => 'MCA',
        'speciality' => 'Intellegence Artificiele',
        "department_id" => 1,
    ],
    [
        'lastname' => 'ben mohammed',
        'firstname' => 'abdrahim',
        'role' => 'teacher',
        'email' => 'abdrahim@mail.com',
        'password' => 'abderahim',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'grade' => 'MCB',
        'speciality' => 'Intellegence Artificiele',
        "department_id" => 1,
    ],
    [
        'lastname' => 'cherait',
        'firstname' => 'hanene',
        'role' => 'teacher',
        'email' => 'hanene@mail.com',
        'password' => 'hanene',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'grade' => 'MCB',
        'speciality' => 'génie logiciel',
        "department_id" => 1,
    ],
    [
        'lastname' => 'chefrour',
        'firstname' => 'jalel',
        'role' => 'teacher',
        'email' => 'jalel@mail.com',
        'password' => 'jalel',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'grade' => 'MCB',
        'speciality' => 'génie logiciel',
        "department_id" => 1,
    ],
    [
        'lastname' => 'mezred',
        'firstname' => 'youcef',
        'role' => 'teacher',
        'email' => 'youcef@mail.com',
        'password' => 'youcef',
        'phone' => '0664646464',
        'address' => 'souk ahras',
        'grade' => 'MCB',
        'speciality' => 'génie logiciel',
        "department_id" => 1,
    ]
];


return [
    "permissions" => $permissions,
    "roles" => $roles,
    "students" => $etudiants,
    "teachers" => $enseignants,
];