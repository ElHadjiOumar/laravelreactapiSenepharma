<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MedicamentController extends Controller
{
    public function index(Request $request)
    {
        $medicament = Medicament::all();
        return response()->json([
            'status' => 200,
            'medicament' => $medicament,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'medicament_nom' => 'required|max:191',
            'medicament_categorie' => 'required|max:191',
            'medicament_reference' => 'required|max:191',
            'medicament_prix' => 'required|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $medicament = new Medicament();
            $medicament->sous_sous_therapie_id = $request->input('sous_sous_therapie_id');
            $medicament->medicament_nom = $request->input('medicament_nom');
            $medicament->medicament_categorie = $request->input('medicament_categorie');
            $medicament->medicament_reference = $request->input('medicament_reference');
            $medicament->medicament_prix = $request->input('medicament_prix');
            $medicament->status = $request->input('status') == true ? '1' : '0';
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/medicament/', $filename);
                $medicament->image = 'uploads/medicament/' . $filename;
            }

            $medicament->save();
            return response()->json([
                'status' => 200,
                'message' => 'Medicament Ajoutez avec Succes',
            ]);
        }
    }


    public function edit($id)
    {
        $medicament = Medicament::find($id);
        if ($medicament) {
            return response()->json([
                'status' => 200,
                'medicament' => $medicament,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Medicament Non Trouvée',
            ]);
        }
    }

    public function update(Request $request, $id)
    {

        $medicament = Medicament::find($id);
        if ($medicament) {
            $medicament->sous_sous_therapie_id = $request->input('sous_sous_therapie_id');
            $medicament->medicament_nom = $request->input('medicament_nom');
            $medicament->medicament_categorie = $request->input('medicament_categorie');
            $medicament->medicament_reference = $request->input('medicament_reference');
            $medicament->medicament_prix = $request->input('medicament_prix');
            $medicament->status = $request->input('status') == true ? '1' : '0';
            if ($request->hasFile('image')) {
                $path = $medicament->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/medicament/', $filename);
                $medicament->image = 'uploads/medicament/' . $filename;
            }


            $medicament->save();
            return response()->json([
                'status' => 200,
                'message' => 'Medicament Modifiée avec Succes',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Medicament Pas Modifié',
            ]);
        }
    }
    public function delete($id)
    {
        $medicament = Medicament::find($id);
        if ($medicament) {
            $medicament->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Medicament Supprimée avec success',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Medicament Non Trouvée',
            ]);
        }
    }
    public function searchByName($medicament_nom)
    {
        $result = Medicament::where("medicament_nom", "LIKE", "%" . $medicament_nom . "%")->get();
        return response()->json([
            'status' => 200,
            'medicament' => $result,
        ]);
    }
    public function searchByAll(Request $request)
    {

        $query = Medicament::query();
        if ($s = $request->input('s')) {
            $query->whereRaw("medicament_nom LIKE '%" . $s . "%'")
                ->orWhereRaw("medicament_reference LIKE '%" . $s . "%'");
        }
        return $query->get();
    }
}
