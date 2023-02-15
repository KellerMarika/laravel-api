<?php

namespace App\Http\Controllers;

use App\Models\Path;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\For_;

class PathController extends Controller
{

    /* da un progetto personale in vanilla javascript ho recuperato a ritroso da un svg pronta un file.json (collezione di phat dell'svg)
    attraverso la chiamata api fatta da quel progetto ad una rotta api di questo passo il json file e lo utilizzo per popolare la tabella associata al controller. 
    visto che non guasta, salvo una copia del json file nello store: preparo anche un seeder che popola allo stesso modo la tabella, perchè se faccio poi casini non devo dipendere da un'altra applicazione. sono molto felice */
    /* :::::::::::::::::::::::::::::::::::::::::::::::::: */

    public function uploadWorldMap(Request $request)
    {

        $paths = $request->json()->all();

        $StoredPath = Storage::put("worldPaths.json", json_encode($paths));

      /*   foreach ($paths as $path) {
            $newPath = new Path([
                'title' => $path['title'],
                'code' => $path['id'],
                'path' => $path['d']
            ]);
            $newPath->save();
        } */
    }
}

/* SNIPPED CODE  

        // tutte le path della mappa 
        const svg_paths = document.querySelectorAll("path");

        //array

        let paths_List = [];
        svg_paths.forEach(path => {

            let path_El = {}
            for (let attribute = 0; attribute < path.attributes.length; attribute++) {

                path_El[path.attributes[attribute].name] = path.attributes[attribute].nodeValue
            }

            paths_List.push(path_El)
        });

        let json_Phats = JSON.stringify(paths_List)

        function putContent_1D() {

            axios.post("http://localhost:8000/api/world", json_Phats)
                .then((response) => {
                    console.log(response);
                });
        }
        putContent_1D()  */