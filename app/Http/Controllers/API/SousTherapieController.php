<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sous_therapie;
use Illuminate\Http\Request;

class SousTherapieController extends Controller
{
    public function index(Request $request)
    {
        $sous_therapie = Sous_therapie::all();
        return response()->json([
            'status' => 200,
            'sous_therapie' => $sous_therapie,
        ]);
    }

    public function store(Request $request)
    {
        $sous_therapie = new Sous_therapie();
        $sous_therapie->therapie_id = $request->input('therapie_id');
        $sous_therapie->nom = $request->input('nom');
        $sous_therapie->description = $request->input('description');

        $sous_therapie->save();
        return response()->json([
            'status' => 200,
            'message' => 'Sous_therapie Ajoutez avec Succes',
        ]);
    }


    public function edit($id)
    {
        $sous_therapie = Sous_therapie::find($id);
        if ($sous_therapie) {
            return response()->json([
                'status' => 200,
                'sous_therapie' => $sous_therapie,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Sous_therapie Non Trouvée',
            ]);
        }
    }

    public function update(Request $request, $id)
    {

        return response()->json([
            'status' => 422,
            'errors' => $validator->messages(),
        ]);

        $sous_therapie = Sous_therapie::find($id);
        if ($sous_therapie) {
            $sous_therapie->therapie_id = $request->input('therapie_id');
            $sous_therapie->nom = $request->input('nom');
            $sous_therapie->description = $request->input('description');

            $sous_therapie->save();
            return response()->json([
                'status' => 200,
                'message' => 'Sous_therapie Modifiée avec Succes',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Sous_therapie Non Trouvée',
            ]);
        }
    }
    public function delete($id)
    {
        $sous_therapie = Sous_therapie::find($id);
        if ($sous_therapie) {
            $sous_therapie->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Sous_therapie Supprimée avec success',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Sous_therapie Non Trouvée',
            ]);
        }
    }
}
