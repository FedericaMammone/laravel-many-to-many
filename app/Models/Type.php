<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    /**
     * Mass-assignable attributes for the model.
     * Attributi assegnabili in massa per il modello.
     *
     * Questo array indica gli attributi che possono essere assegnati in massa
     * quando si crea o si aggiorna un'istanza del modello Type.
     * In questo caso, abbiamo solo l'attributo 'type_name' che può essere assegnato in massa.
     *
     * @var array
     */
    protected $fillable = [
        "type_name"
    ];

    /**
     * Define the relationship between Type and Project models.
     * Definisce la relazione tra i modelli Type e Project.
     *
     * Questa funzione definisce la relazione one-to-many tra i modelli Type e Project.
     * Ogni tipo (Type) può avere molti progetti associati ad esso.
     * Il metodo hasMany() crea la relazione tra i modelli, utilizzando la colonna 'type_id'
     * nella tabella dei progetti come chiave esterna.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        // Ritorna la relazione one-to-many tra Type e Project, dove un tipo può avere molti progetti associati
        return $this->hasMany(Project::class);
    }
}
