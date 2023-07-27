<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Questa funzione viene eseguita quando il seeder viene avviato.
     * Popola la tabella 'technologies' con 10 record utilizzando il factory di Technology.
     * Successivamente, collega in modo casuale 1-3 progetti a ciascuna tecnologia tramite una relazione many-to-many.
     *
     * @return void
     */
    public function run()
    {
        $technologies = Technology::factory()->count(10)->create(); // Popola la tabella 'technologies' con 10 record

        // foreach ($technologies as $technology) {
        //     $projects = Project::inRandomOrder()->limit(rand(1, 3))->get(); // Seleziona casualmente 1-3 progetti
        //     $technology->projects()->attach($projects); // Collega i progetti alla tecnologia tramite relazione many-to-many
        // }
    }
}
