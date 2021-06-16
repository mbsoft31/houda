<?php

$faculties = [
    0 => [
        'name'          => 'Faculté des Sciences et de la Technologie',
        'address'      => 'Université de Souk Ahras Souk Ahras , 41000 - Algérie',
        'phone'          => '037753052',
        'departements' => [
            0 =>[
                'name'      => 'Département de Mathématiques et Informatique',
                'address'  => 'Université de Souk Ahras Souk Ahras , 41000 - Algérie',
                'phone'      => '030952935',
                'chief'      => 2,
                'specialites' => [
                    0 => [
                        'name' => 'Systeme d\'information',
                        "diploma" => "licence",
                    ],
                    1 => [
                        'name' => 'Web et Intellegence Artificiele',
                        "diploma" => "master",
                    ],
                    2 => [
                        'name' => 'Genie Logiciel',
                        "diploma" => "master",
                    ],
                    3 => [
                        'name' => 'mathematique generale',
                        "diploma" => "licence",
                    ],
                    4 => [
                        'name' => 'mathematique appliquee',
                        "diploma" => "master",
                    ]
                ]
            ]
        ]
    ]
];

return $faculties;
