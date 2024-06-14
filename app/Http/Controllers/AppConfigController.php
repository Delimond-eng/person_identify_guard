<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Secteur;
use App\Models\Territoire;
use App\Models\Chefferie;
use App\Models\Personne;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AppConfigController extends Controller
{
    /**
     * Permet de créer les provinces par masse en envoyant une liste des province
     * @param Request $request
     * @return JsonResponse
     */
    public function createProvinces(Request $request):JsonResponse
    {
        try {
            $data = $request->validate([
                'provinces'=>'array',
                'provinces.province_libelle'=>'required|string',
            ]);
            $provinces = $data['provinces'];
            foreach ($provinces as $item){
                Province::updateOrCreate(['province_libelle'=>$item['province_libelle']], $item);
            }
            return response()->json([
                "status"=>"success",
                "message"=>"provinces créée avec succès !"
            ]);

        }
        catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors ]);
        }
        catch (\Illuminate\Database\QueryException | \ErrorException $e){
            return response()->json(['errors' => $e->getMessage() ]);
        }
    }


    /**
     * Permet des creer les territoires liés à une provinces par masse
     * @param Request $request
     * @return JsonResponse
    */
    public function createTerritories(Request $request):JsonResponse
    {
        try {
            $data = $request->validate([
                'territoires'=>'array',
                'province_id'=>'required|int|exists:provinces,id',
                'territoires.*.territoire_libelle'=>'required|string',
            ]);
            $territoires = $data['territoires'];
            foreach ($territoires as $item){
                $item['province_id'] = $data['province_id'];
                Territoire::updateOrCreate(
                    [
                        'territoire_libelle'=>$item['province_libelle'],
                        'province_id'=>$item['province_id'],
                    ],
                    [
                        'territoire_libelle'=>$item['province_libelle'],
                        'province_id'=>$item['province_id'],
                    ],
                );
            }
            return response()->json([
                "status"=>"success",
                "message"=>"territoires créé avec succès !"
            ]);

        }
        catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors ]);
        }
        catch (\Illuminate\Database\QueryException | \ErrorException $e){
            return response()->json(['errors' => $e->getMessage() ]);
        }
    }


    /**
     * Permet des creer les secteurs liés à une territoires par masses
     * @param Request $request
     * @return JsonResponse
    */
    public function createSectors(Request $request):JsonResponse
    {
        try {
            $data = $request->validate([
                'secteurs'=>'array',
                'territoire_id'=>'required|int|exists:territoires,id',
                'secteurs.*.secteur_libelle'=>'required|string',
            ]);
            $secteurs = $data['secteurs'];
            foreach ($secteurs as $item){
                $item['territoire_id'] = $data['territoire_id'];
                Secteur::updateOrCreate(
                    [
                        'secteur_libelle'=>$item['secteur_libelle'],
                        'territoire_id'=>$item['territoire_id'],
                    ],
                    [
                        'secteur_libelle'=>$item['secteur_libelle'],
                        'territoire_id'=>$item['territoire_id'],
                    ],
                );
            }
            return response()->json([
                "status"=>"success",
                "message"=>"territoires créé avec succès !"
            ]);

        }
        catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors ]);
        }
        catch (\Illuminate\Database\QueryException | \ErrorException $e){
            return response()->json(['errors' => $e->getMessage() ]);
        }
    }



    /**
     * Permet des creer les chefferies liées à un secteur par masses
     * @param Request $request
     * @return JsonResponse
     */
    public function createChefferies(Request $request):JsonResponse
    {
        try {
            $data = $request->validate([
                'chefferies'=>'array',
                'secteur_id'=>'required|int|exists:secteurs,id',
                'chefferies.*.chefferie_libelle'=>'required|string',
            ]);
            $chefferies = $data['chefferies'];
            foreach ($chefferies as $item){
                $item['secteur_id'] = $data['secteur_id'];
                Secteur::updateOrCreate(
                    [
                        'chefferie_libelle'=>$item['chefferie_libelle'],
                        'secteur_id'=>$item['secteur_id'],
                    ],
                    [
                        'chefferie_libelle'=>$item['chefferie_libelle'],
                        'secteur_id'=>$item['secteur_id'],
                    ],
                );
            }
            return response()->json([
                "status"=>"success",
                "message"=>"secteurs créé avec succès !"
            ]);

        }
        catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors ]);
        }
        catch (\Illuminate\Database\QueryException | \ErrorException $e){
            return response()->json(['errors' => $e->getMessage() ]);
        }
    }

    /**
     * Voir les données de configuration
     * @return JsonResponse
    */
    public function viewConfigDatas(): JsonResponse
    {
        $results = Province::with('territoires.secteurs.chefferies')->get();
        return response()->json([
            "status"=>"success",
            "results"=>$results
        ]);
    }

    /**
     * Summary of getProvinces
     * @return JsonResponse|mixed
     */
    public function getProvinces()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }

    /**
     * *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse|mixed
     */
    public function getTerritoires(Request $request)
    {
        $provinceId = $request->query('province_id');
        if ($provinceId) {
            $territoires = Territoire::where('province_id', $provinceId)->get();
        } else {
            $territoires = Territoire::all();
        }
        return response()->json($territoires);
    }
    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse|mixed
     */
    public function getSecteurs(Request $request)
    {
        $territoireId = $request->query('territoire_id');
        if ($territoireId) {
            $secteurs = Secteur::where('territoire_id', $territoireId)->get();
        } else {
            $secteurs = Secteur::all();
        }
        return response()->json($secteurs);
    }

    /**
     * Summary of getChefferies
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse|mixed
     */
    public function getChefferies(Request $request)
    {
        $secteurId = $request->query('secteur_id');
        if ($secteurId) {
            $chefferies = Chefferie::where('secteur_id', $secteurId)->get();
        } else {
            $chefferies = Chefferie::all();
        }
        return response()->json($chefferies);
    }



    /**
     * Verifie la validité d'un NPI
     * @param mixed $npi
     * @return JsonResponse|mixed
     */
    public function checkNPI($npi){
        $person = Personne::where("idnat", $npi)->first();
        if ($person) {
            return response()->json([
                "status"=> "success",
                "personne"=>$person
            ]);
        }
        else{
            return response()->json([
                "status"=> "error",
            ]);
        }
    }
}