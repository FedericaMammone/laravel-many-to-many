<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Mass-assignable attributes for the model.
     * Attributi assegnabili in massa per il modello.
     *
     * Questo array indica gli attributi che possono essere assegnati in massa
     * quando si crea o si aggiorna un'istanza del modello Project.
     * Gli attributi elencati qui possono essere assegnati in massa tramite il metodo create()
     * o fill() del modello.
     *
     * @var array
     */
    protected $fillable = [
        "title",
        "publish_date",
        "description",
        "accessibility",
        "type_id",
        "main_picture"
    ];

    /**
     * Define the relationship between Project and Type models.
     * Definisce la relazione tra i modelli Project e Type.
     *
     * Questa funzione definisce la relazione many-to-one tra i modelli Project e Type.
     * Ogni progetto appartiene a un unico tipo (Type), quindi il metodo belongsTo() definisce
     * la relazione di appartenenza tra i modelli.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        // Ritorna la relazione many-to-one tra Project e Type, dove il progetto appartiene a un unico tipo
        return $this->belongsTo(Type::class);
    }

    /**
     * Define the relationship between Project and Technology models.
     * Definisce la relazione tra i modelli Project e Technology.
     *
     * Questa funzione definisce la relazione many-to-many tra i modelli Project e Technology.
     * Ogni progetto può essere associato a molte tecnologie, e viceversa.
     * Il metodo belongsToMany() crea la relazione tra i modelli utilizzando una tabella di collegamento.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies()
    {
        // Ritorna la relazione many-to-many tra Project e Technology utilizzando la tabella di collegamento
        return $this->belongsToMany(Technology::class);
    }
}
