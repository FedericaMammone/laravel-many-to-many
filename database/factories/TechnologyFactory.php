<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory per il modello Technology.
 * Questa classe definisce come creare istanze del modello Technology con dati di prova.
 * Estende la classe Factory di Eloquent per generare dati di prova in modo semplice e consistente.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technology>
 */
class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * Definisce lo stato predefinito del modello.
     * Quando viene creata un'istanza di Technology utilizzando il factory,
     * verrà utilizzato questo metodo per fornire i valori predefiniti degli attributi.
     * In questo caso, il factory genererà un nome casuale di una parola (singola) per la tecnologia.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->unique()->randomElement([
                "Java", "PHP", "C++", "JS", "Bash", "Python", "Perl", "C#", "HTML/CSS", "SQL"
            ]),
        ];
    }
}
