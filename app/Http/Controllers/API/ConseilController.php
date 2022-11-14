<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Conseil;
use Illuminate\Http\Request;

class ConseilController extends Controller
{
    public function index(Request $request)
    {
        $conseil = Conseil::all();
        return response()->json([
            'status' => 200,
            'conseil' => $conseil,
        ]);
    }

    public function store(Request $request)
    {
        $conseil = new Conseil();
        $conseil->titre = $request->input('titre');
        $conseil->description = $request->input('description');
        $conseil->resume = $request->input('resume');

        $conseil->save();
        return response()->json([
            'status' => 200,
            'message' => 'Conseil Ajoutez avec Succes',
        ]);
    }


    public function edit($id)
    {
        $conseil = Conseil::find($id);
        if ($conseil) {
            return response()->json([
                'status' => 200,
                'conseil' => $conseil,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Conseil Non Trouvée',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $conseil = Conseil::find($id);
        if ($conseil) {
            $conseil->titre = $request->input('titre');
            $conseil->description = $request->input('description');
            $conseil->resume = $request->input('resume');

            $conseil->save();
            return response()->json([
                'status' => 200,
                'message' => 'Conseil Modifiée avec Succes',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Conseil Non Trouvée',
            ]);
        }
    }
    public function delete($id)
    {
        $conseil = Conseil::find($id);
        if ($conseil) {
            $conseil->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Conseil Supprimée avec success',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Conseil Non Trouvée',
            ]);
        }
    }

    public function searchByTitre($titre)
    {
        $result = Conseil::where("titre", "LIKE", "%" . $titre . "%")->get();
        return response()->json([
            'status' => 200,
            'conseil' => $result,
        ]);
    }

    public function listAll($sk, $tk)
    {
        $result = Conseil::offset($sk)->limit($tk)->get();
        return response()->json([
            'status' => 200,
            'conseil' => $result,
        ]);

    }
}
