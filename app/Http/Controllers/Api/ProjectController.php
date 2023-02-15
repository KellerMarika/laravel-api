<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        /* with carica anche le relazioni(nome funzioni nel model) */
        /* paginate quanti risultati per pagina */
        $projects = Project::all()->paginate(12);

        /* QUERY */
       /*  $project = Project::where(...)->get(); */

        return response()->json($projects);
        /* esempio dati*/
      /*   return response()->json([
            'totale' => $projects->count(),
            'dati' => $projects,
        ]); */
    }
 /*    public function showConFindOrFail(Request $request, $id)
    {
         //with carica anche le relazioni(nome funzioni nel model) 
         //paginate quanti risultati per pagina 
        $project = Project::with('type','tecnologies','posts')->findOrFail($id);

         //QUERY 
         //$project = Project::where(...)->get(); 

        return response()->json($project);
         //esempio dati
         //return response()->json([
         //   'totale' => $projects->count(),
         //  'dati' => $projects,
         //]); 
    } */
    public function show(Request $request, $project)
    {
        /* with carica anche le relazioni(nome funzioni nel model) */
        /* paginate quanti risultati per pagina */
        $project->load('type','tecnologies','posts');

        /* QUERY */
       /*  $project = Project::where(...)->get(); */

        return response()->json($project);
        /* esempio dati*/
      /*   return response()->json([
            'totale' => $projects->count(),
            'dati' => $projects,
        ]); */
    }
}