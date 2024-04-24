<?php

namespace Database\Seeders;

use App\Models\Project;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newProject = new Project();
        $newProject->title = "Prova";
        $newProject->description = "progetto prova";
        $newProject->img = "";
        // $newProject->tech = "laravel";
        $newProject->github_url = "";
        $newProject->devices = "";


        $newProject->save();
    }
}
