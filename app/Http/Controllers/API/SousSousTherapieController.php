<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sous_sous_therapie;
use Illuminate\Http\Request;

class SousSousTherapieController extends Controller
{
    public function index(Request $request)
    {
        $sous_sous_therapie = Sous_sous_therapie::all();
        return response()->json([
            'status' => 200,
            'sous_sous_therapie' => $sous_sous_therapie,
        ]);
    }

    public function allTherapie(Request $request)
    {
        $sous_sous_therapie = Sous_sous_therapie::where('status', '0')->get();
        return response()->json([
            'status' => 200,
            'sous_sous_therapie' => $sous_sous_therapie,
        ]);
    }

    public function store(Request $request)
    {
        $sous_sous_therapie = new Sous_sous_therapie();
        $sous_sous_therapie->sous_therapie_id = $request->input('sous_therapie_id');
        $sous_sous_therapie->nom = $request->input('nom');
        $sous_sous_therapie->description = $request->input('description');
        $sous_sous_therapie->status = $request->input('status') == true ? '1' : '0';

        $sous_sous_therapie->save();
        return response()->json([
            'status' => 200,
            'message' => 'Sous_sous_therapie Ajoutez avec Succes',
        ]);
    }


    public function edit($id)
    {
        $sous_sous_therapie = Sous_sous_therapie::find($id);
        if ($sous_sous_therapie) {
            return response()->json([
                'status' => 200,
                'sous_sous_therapie' => $sous_sous_therapie,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Sous_sous_therapie Non Trouvée',
            ]);
        }
    }

    public function update(Request $request, $id)
    {


        $sous_sous_therapie = Sous_sous_therapie::find($id);
        if ($sous_sous_therapie) {
            $sous_sous_therapie->sous_therapie_id = $request->input('sous_therapie_id');
            $sous_sous_therapie->nom = $request->input('nom');
            $sous_sous_therapie->description = $request->input('description');
            $sous_sous_therapie->status = $request->input('status') == true ? '1' : '0';

            $sous_sous_therapie->save();
            return response()->json([
                'status' => 200,
                'message' => 'Sous_sous_therapie Modifiée avec Succes',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Sous_sous_therapie Non Trouvée',
            ]);
        }
    }
    public function delete($id)
    {
        $sous_sous_therapie = Sous_sous_therapie::find($id);
        if ($sous_sous_therapie) {
            $sous_sous_therapie->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Sous_sous_therapie Supprimée avec success',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Sous_sous_therapie Non Trouvée',
            ]);
        }
    }
    public function searchByName($nom)
    {
        $result = Sous_sous_therapie::where("nom", "LIKE", "%" . $nom . "%")->get();
        return response()->json([
            'status' => 200,
            'sous_sous_therapie' => $result,
        ]);
    }
}
