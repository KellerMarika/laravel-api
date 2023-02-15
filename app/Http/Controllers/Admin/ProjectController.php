<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;

use App\Models\Level;
use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

$levels_list = Level::all();
$Types = Type::all();

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $levels = Level::all();
        $types = Type::all();
        $tecnologies = Tecnology::all();


        return view('admin.projects.index', compact("projects", 'levels', 'types', "tecnologies"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $types = Type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.create', compact('levels', 'types', "tecnologies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
       
        /* 
        usa le rules dello store project request per validare la creazione dell'elemento */

        $data = $request->validated();

        if (key_exists("cover_img", $data)) {

            $path = Storage::put("projects", $data["cover_img"]);
        }
        /* formattazione checkbox  (on : "")  non serve più abbiamo messo checkbox supplementare*/
        /*        $data["completed"] = key_exists("completed", $data) ? true : false; ____*/

        $project = Project::create([
            ...$data,
            'cover_img' => $path ?? '', /* lo faccio a monitor di mettere un'immagine di default senno salverei sempre cover_img 404 nf nel db */
        ]);

        /* per aggiungere alla tabella ponte la relazione tra progetto e tecnologie */

        if ($request->has("tecnologies")) {
            // if (key_exists("tecnologies", $data)) {
            $project->tecnologies()->attach($data["tecnologies"]);
        }

        return redirect()->route('admin.projects.show', $project->id);

        /*      ->with([
        'status' => 'success',
        'message' => 'hai creato un nuovo progetto: #' . $project->id
        ]); */

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $levels = Level::all();
        $types = Type::all();
        $tecnologies = Tecnology::all();
        return view("admin.projects.edit", compact("project", "levels", "types", "tecnologies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $data = $request->validated();

        if (key_exists("cover_img", $data)) {
            $path = Storage::put("projects", $data["cover_img"]);
            Storage::delete($project->cover_img);
        }


        $project->update([
            ...$data,
            'cover_img' => $path ?? $project->cover_img /* lo faccio a monitor di mettere un'immagine di default senno salverei sempre cover_img 404 nf nel db */
        ]);

        $project->tecnologies()->sync($data['tecnologies']);
        
        return redirect()->route('admin.projects.show', $project->id); 

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->cover_img);

        $project->tecnologies()->detach();
        $project->delete();
        return redirect()->route("admin.projects.index");
    }
}