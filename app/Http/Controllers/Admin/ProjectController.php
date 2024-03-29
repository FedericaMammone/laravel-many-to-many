<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    // Visualizza l'elenco di tutti i progetti
    public function index()
    {
        // Recupera tutti i progetti dal database
        $projects = Project::all();

        // Carica la vista 'welcome' e passa l'elenco dei progetti alla vista
        return view('home', compact('projects'));
    }


    // Mostra i dettagli di un progetto specifico
    public function show($id)
    {
        // Cerca il progetto nel database con l'ID specificato
        $project = Project::findOrFail($id);

        // Carica la vista 'show' e passa i dettagli del progetto alla vista
        return view('show', compact('project'));
    }


    // Mostra il form per creare un nuovo progetto
    public function create()
    {
        // Recupera tutti i tipi e tutte le tecnologie dal database
        $types = Type::all();
        $technologies = Technology::all();

        // Carica la vista 'create' e passa i tipi e le tecnologie alla vista
        return view('create', compact('types', 'technologies'));
    }


    // Salva un nuovo progetto nel database
    public function store(Request $request)
    {
        // Recupera i dati dal form inviato
        $data = $request->all();

        $project = Project::create($data);
        $project->technologies()->attach($data['technologies']);

        $img_path = Storage::put('uploads', $data['main_picture']);
        $data['main_picture'] = $img_path;

        $project = Project::create($data);
        return redirect()->route('project.show', $project->id);
    }


    // Mostra il form per modificare un progetto esistente
    public function edit($id)
    {
        // Cerca il progetto nel database con l'ID specificato
        $project = Project::findOrFail($id);

        // Recupera tutti i tipi e tutte le tecnologie dal database
        $types = Type::all();
        $technologies = Technology::all();

        // Carica la vista 'edit' e passa il progetto, i tipi e le tecnologie alla vista
        return view('edit', compact('project', 'types', 'technologies'));
    }


    // Aggiorna un progetto esistente nel database
    public function update(Request $request, $id)
    {
        // Cerca il progetto nel database con l'ID specificato
        $project = Project::findOrFail($id);

        // Recupera i dati dal form inviato
        $data = $request->all();



        $project->technologies()->sync(
            array_key_exists('technologies', $data)
                ? $data['technologies']
                : []
        );

        if (!array_key_exists("main_picture", $data))
            $data['main_picture'] = $project->main_picture;
        else {
            if ($project->main_picture) {

                $oldImgPath = $project->main_picture;
                Storage::delete($oldImgPath);
            }

            $data['main_picture'] = Storage::put('uploads', $data['main_picture']);
        }


        // Aggiorna i dati del progetto con i nuovi dati forniti
        $project->update($data);

        // Reindirizza all'URL della vista 'show' per visualizzare il progetto modificato
        return redirect()->route('project.show', $project->id);
    }

    public function deletePicture($id)
    {

        $project = Project::findOrFail($id);

        if ($project->main_picture) {

            $oldImgPath = $project->main_picture;
            Storage::delete($oldImgPath);
        }

        $project->main_picture = null;
        $project->save();

        return redirect()->route('project.show', $project->id);
    }


    // // Elimina un progetto dal database
    // public function destroy($id)
    // {
    //     // Cerca il progetto nel database con l'ID specificato
    //     $project = Project::findOrFail($id);

    //     // Elimina le relazioni "Many-to-Many" tra il progetto e le tecnologie
    //     $project->technologies()->detach();

    //     // Ora puoi eliminare il progetto
    //     $project->delete();

    //     // Reindirizza all'URL della vista 'home' dopo l'eliminazione del progetto
    //     return redirect()->route('home')->with('success', 'Progetto eliminato con successo!');
    // }
}
