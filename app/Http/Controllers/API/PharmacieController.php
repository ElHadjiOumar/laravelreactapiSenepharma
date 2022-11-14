<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PharmacieController extends Controller
{

    public function index(Request $request)
    {
        $pharmacie = Pharmacie::all();
        return response()->json([
            'status' => 200,
            'pharmacie' => $pharmacie,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pharmacie_nom' => 'required|max:191',
            'pharmacie_adresse' => 'required|max:191',
            'pharmacie_numero' => 'required|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $pharmacie = new Pharmacie();
            $pharmacie->pharmacie_nom = $request->input('pharmacie_nom');
            $pharmacie->pharmacie_adresse = $request->input('pharmacie_adresse');
            $pharmacie->pharmacie_numero = $request->input('pharmacie_numero');
            $pharmacie->longitude = $request->input('longitude');
            $pharmacie->lattitude = $request->input('lattitude');
            $pharmacie->region = $request->input('region');
            $pharmacie->commune = $request->input('commune');
            $pharmacie->department = $request->input('department');
            $pharmacie->map_link = $request->input('map_link');


            $pharmacie->save();
            return response()->json([
                'status' => 200,
                'message' => 'Pharmacie Ajoutez avec Succes',
            ]);
        }
    }


    public function edit($id)
    {
        $pharmacie = Pharmacie::find($id);
        if ($pharmacie) {
            return response()->json([
                'status' => 200,
                'pharmacie' => $pharmacie,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Pharmacie Non Trouvée',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pharmacie_nom' => 'required|max:191',
            'pharmacie_adresse' => 'required|max:191',
            'pharmacie_numero' => 'required|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
            $pharmacie = Pharmacie::find($id);
            if ($pharmacie) {
                $pharmacie->pharmacie_nom = $request->input('pharmacie_nom');
                $pharmacie->pharmacie_adresse = $request->input('pharmacie_adresse');
                $pharmacie->pharmacie_numero = $request->input('pharmacie_numero');
                $pharmacie->longitude = $request->input('longitude');
                $pharmacie->lattitude = $request->input('lattitude');
                $pharmacie->region = $request->input('region');
                $pharmacie->commune = $request->input('commune');
                $pharmacie->department = $request->input('department');
                $pharmacie->map_link = $request->input('map_link');
                $pharmacie->status = $request->input('status');

                $pharmacie->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Pharmacie Modifiée avec Succes',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Pharmacie Non Trouvée',
                ]);
            }
        }
    }
    public function delete($id)
    {
        $pharmacie = Pharmacie::find($id);
        if ($pharmacie) {
            $pharmacie->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Pharmacie Supprimée avec success',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Pharmacie Non Trouvée',
            ]);
        }
    }

    public function searchByName($pharmacie_nom)
    {
        $result = Pharmacie::where("pharmacie_nom", "LIKE", "%" . $pharmacie_nom . "%")->get();
        return response()->json([
            'status' => 200,
            'pharmacie' => $result,
        ]);
    }

    public function list_allPharmacie($sk, $tk){
        $result = Pharmacie::offset($sk)->limit($tk)->get();
        return response()->json([
            'status' => 200,
            'pharmacie' => $result,
        ]);

    }
}
