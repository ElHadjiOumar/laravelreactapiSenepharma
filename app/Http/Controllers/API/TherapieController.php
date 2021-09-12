<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Therapie;
use Illuminate\Http\Request;

class TherapieController extends Controller
{
    public function index(Request $request)
    {
        $therapie = Therapie::all();
        return response()->json([
            'status' => 200,
            'therapie' => $therapie,
        ]);
    }

    public function store(Request $request)
    {
        $therapie = new Therapie();
        $therapie->nom = $request->input('nom');
        $therapie->description = $request->input('description');

        $therapie->save();
        return response()->json([
            'status' => 200,
            'message' => 'Therapie Ajoutez avec Succes',
        ]);
    }


    public function edit($id)
    {
        $therapie = Therapie::find($id);
        if ($therapie) {
            return response()->json([
                'status' => 200,
                'therapie' => $therapie,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Therapie Non Trouvée',
            ]);
        }
    }

    public function update(Request $request, $id)
    {

        return response()->json([
            'status' => 422,
            'errors' => $validator->messages(),
        ]);

        $therapie = Therapie::find($id);
        if ($therapie) {
            $therapie->nom = $request->input('nom');
            $therapie->description = $request->input('description');

            $therapie->save();
            return response()->json([
                'status' => 200,
                'message' => 'Therapie Modifiée avec Succes',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Therapie Non Trouvée',
            ]);
        }
    }
    public function delete($id)
    {
        $therapie = Therapie::find($id);
        if ($therapie) {
            $therapie->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Therapie Supprimée avec success',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Therapie Non Trouvée',
            ]);
        }
    }
}
