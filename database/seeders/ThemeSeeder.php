<?php

namespace Database\Seeders;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = require('themes.php');

        foreach ($data as $theme_item)
        {

            $teacher = User::where("email", $theme_item["teacher"])
                ->first()->teacher->id;


            $theme = Theme::create([
                "title" => $theme_item["title"],
                "objective" => $theme_item["objective"],
                "resume" => $theme_item["resume"],
                "speciality_id" => $theme_item["speciality_id"],
                "teacher_id" => $teacher,
            ]);
        }
    }
}
