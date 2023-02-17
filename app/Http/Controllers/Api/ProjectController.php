<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tecnology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        $paginate = "null";
        $paginate = $request->input('paginate');

        /* LAST*/
        if ($request->input('last')) {
            $projects = Project::with('type', 'tecnologies', 'level', 'posts', 'votes')->orderBy("created_at", "DESC")->limit($request->input('last'))->get();


            /*FILTER LEVEL  */
        } else if ($request->input('levelFilter')) {

            $projects = Project::with('type', 'tecnologies', 'level', 'posts', 'votes')->where("type_id", $request->input('levelFilter'))->paginate($paginate ?: 12);



            /*FILTER TYPE  */
        } else if ($request->input('typeFilter')) {

            $projects = Project::with('type', 'tecnologies', 'level', 'posts', 'votes')->where("type_id", $request->input('typeFilter'))->paginate($paginate ?: 12);

            /*FILTER TECNOLOGY SENZ'H  */
        } else if ($request->input('tecnologiesFilter')) {

            $projects = Tecnology::findOrFail($request->input('tecnologiesFilter'))->projects()->with('type', 'level', 'posts', 'votes','tecnologies')->paginate($paginate ?: 12);

        } else {
            $projects = Project::with('type', 'tecnologies', 'level', 'posts', 'votes')->paginate($paginate ?: 12);

        }
        // ALLA FINE SE C'è DA PAGINARE PAGINO 

        //quanti per pagina

        return response()->json($projects);

    }

    public function show(project $project)
    {

        $project->load('type', 'tecnologies', 'level', 'posts', 'votes');

        return response()->json($project);

    }
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