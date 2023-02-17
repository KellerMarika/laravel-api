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

        // PAGINAZIONE 
        if ($request->input('paginate')) {
            $projects = Project::with('type', 'tecnologies', 'level', 'posts', 'votes')->paginate($request->input('paginate')); //quanti per pagina

        } else if ($request->input('last')) {
            $projects = Project::with('type', 'tecnologies', 'level', 'posts', 'votes')->orderBy("created_at", "DESC")->limit($request->input('last'))->get();

        }else if($request->input('last')){
            
        }


        //più recenti

        /*   Project:all()->paginate($request->input('page'))->order($request->input('order')); */
        /* 
        $queryParams=["paginate" => $request->input('page'), "order" => $request->input('order')]
        $a = Project::all();
        if ($request->impit('page')) {
        $a = Project::all()->paginate($request->impit('page'));
        } else if ($request->impit('order'))
        $a->orderBy();
        $b = Project::all(); */

        /*   $a=$request; */
        /*       return ($a->input('page')); */

        return response()->json($projects);

    }

    public function show(project $project)
    {

        $project->load('type', 'tecnologies', 'level', 'posts', 'votes');

        return response()->json($project);

    }
}