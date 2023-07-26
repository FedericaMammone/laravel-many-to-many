<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    /**
     * Mass-assignable attributes for the model.
     * Attributi assegnabili in massa per il modello.
     *
     * Questo array indica gli attributi che possono essere assegnati in massa
     * quando si crea o si aggiorna un'istanza del modello Technology.
     * In questo caso, abbiamo solo l'attributo 'name' che può essere assegnato in massa.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Define the relationship between Technology and Project models.
     * Definisce la relazione tra i modelli Technology e Project.
     *
     * Questa funzione definisce la relazione many-to-many tra i modelli Technology e Project.
     * Ogni tecnologia può essere associata a molti progetti, e viceversa.
     * Il metodo belongsToMany() crea la relazione tra i modelli utilizzando una tabella di collegamento.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        // Ritorna la relazione many-to-many tra Technology e Project utilizzando la tabella di collegamento
        return $this->belongsToMany(Project::class);
    }
}
