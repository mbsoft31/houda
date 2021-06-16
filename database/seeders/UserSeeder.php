<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = require('users.php');

        $permissions = $data["permissions"];

        // creating roles and permissions
        foreach ($permissions as $model => $permissions)
        {

            foreach ($permissions as $permission) {
                Permission::create([
                    "name" => $permission . " " . $model,
                ]);
            }

        }

        $roless = $data["roles"];

        // creating roles and permissions
        foreach ($roless as $role => $role_permissions)
        {

            $role = Role::create([
                "name" => $role,
            ]);

            foreach ($role_permissions as $model => $permissions) {
                foreach ($permissions as $permission) {
                    $role->givePermissionTo($permission . " " . $model);
                }
            }

        }

        // creating users

        $user = User::create([
            "name" => "admin" . " " . "admin",
            "email" => "admin@mail.com",
            "password" => Hash::make("admin1234"),
        ]);

        $user->assignRole("admin");

        foreach ($data["teachers"] as $teacher_item)
        {
            $user = User::create([
                "name" => $teacher_item["lastname"] . " " . $teacher_item["firstname"],
                "email" => $teacher_item["email"],
                "password" => Hash::make($teacher_item["password"]),
            ]);

            $teacher = Teacher::create([
                "speciality" => $teacher_item["speciality"],
                "grade" => $teacher_item["grade"],
                "phone" => $teacher_item["phone"],
                "user_id" => $user->id,
            ]);

            $department = Department::find($teacher_item["department_id"]);

            $teacher->departments()->attach($department);

            $user->assignRole("teacher");
        }

        $number = 1;
        $avg = 17;
        foreach ($data["students"] as $student_item)
        {
            $user = User::create([
                "name" => $student_item["lastname"] . " " . $student_item["firstname"],
                "email" => $student_item["email"],
                "password" => Hash::make($student_item["password"]),
            ]);

            $student = Student::create([
                "registration_number" => "2019-" . $number,
                "phone" => $student_item["phone"],
                "average" => $avg,
                "user_id" => $user->id,
                "speciality_id" => $student_item["speciality_id"],
                "theme_id" => null,
            ]);

            $user->assignRole("student");
            $avg = $avg - 0.5;
            $number = $number + 1;
        }



    }
}
