<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = require('faculties.php');


        foreach ($data as $faculty_item)
        {
            $faculty = Faculty::create([
                "name" => $faculty_item["name"],
                "address" => $faculty_item["address"],
                "phone" => $faculty_item["phone"],
            ]);

            foreach ($faculty_item["departements"] as $departement_item)
            {
                $department = Department::create([
                    "name" => $departement_item["name"],
                    "address" => $departement_item["address"],
                    "phone" => $departement_item["phone"],
                    "user_id" => $departement_item["chief"],
                    "faculty_id" => $faculty->id,
                ]);

                $chief = User::find($departement_item["chief"]);

                $chief->assignRole("department-chief");

                foreach ($departement_item["specialites"] as $specialite_item)
                {
                    $speciality = Speciality::create([
                        "name" => $specialite_item["name"],
                        "diploma" => $specialite_item["diploma"],
                        "department_id" => $department->id,
                    ]);
                }
            }
        }

    }
}
