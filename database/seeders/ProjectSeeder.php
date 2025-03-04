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
        $projects = [
            [
                'name'=>"Take over the World",
                'description'=>'A short biography of Tronald Dump',
            ],
            [
                'name'=>"How I really took over the World",
                'description'=>'Pladimir Vutin',
            ],
            [
                'name'=>"In the heat of the moment",
                'description'=>null,
            ],
        ];

        Project::insert($projects);
    }
}
