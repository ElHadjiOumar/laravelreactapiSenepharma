<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sous_therapie;
use App\Models\Therapie;
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

    public function allTherapie(Request $request)
    {
        $sous_therapie = Sous_therapie::where('status', '0')->get();
        return response()->json([
            'status' => 200,
            'sous_therapie' => $sous_therapie,
        ]);
    }
    public function render(Request $request, $id)
    {
        $therapie = Therapie::find($id);
        $sous_therapie = Sous_therapie::all();
        return response()->json([
            'status' => 200,
            'sous_therapie' => $sous_therapie,
            'therapie' => $therapie,
        ]);
    }

    public function store(Request $request)
    {
        $sous_therapie = new Sous_therapie();
        $sous_therapie->therapie_id = $request->input('therapie_id');
        $sous_therapie->nom = $request->input('nom');
        $sous_therapie->description = $request->input('description');
        $sous_therapie->status = $request->input('status') == true ? '1' : '0';

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


        $sous_therapie = Sous_therapie::find($id);
        if ($sous_therapie) {
            $sous_therapie->therapie_id = $request->input('therapie_id');
            $sous_therapie->nom = $request->input('nom');
            $sous_therapie->description = $request->input('description');
            $sous_therapie->status = $request->input('status') == true ? '1' : '0';

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

    public function searchByName($nom)
    {
        $result = Sous_therapie::where("nom", "LIKE", "%" . $nom . "%")->get();
        return response()->json([
            'status' => 200,
            'sous_therapie' => $result,
        ]);
    }
}
