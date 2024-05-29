<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\Conjoint;
use App\Models\Enfant;
use App\Models\EtudeTitre;
use App\Models\FamilleCharge;
use App\Models\Personne;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PersonneIDGuardController extends Controller
{
    /**
     * Permet de creer une personne dans le systeme
     * @param StorePersonRequest $request
     * @return JsonResponse
     */
    public function createPerson(StorePersonRequest $request): JsonResponse
    {
        try {
            //Valide les données entrées
            $data = $request->validated();

            //Creation de la personne
            $personne = Personne::create($data);

            if ($request->filled('conjoints')) {
                foreach ($request->conjoints as $conjointData) {
                    $conjointData['personne_id'] = $personne->id;
                    Conjoint::create($conjointData);
                }
            }

            if ($request->filled('enfants')) {
                foreach ($request->enfants as $enfantData) {
                    $enfantData['personne_id'] = $personne->id;
                    Enfant::create($enfantData);
                }
            }

            if ($request->filled('famille_charges')) {
                foreach ($request->famille_charges as $familleChargeData) {
                    $familleChargeData['personne_id'] = $personne->id;
                    FamilleCharge::create($familleChargeData);
                }
            }

            if ($request->filled('etude_titres')) {
                foreach ($request->etude_titres as $etudeTitreData) {
                    $etudeTitreData['personne_id'] = $personne->id;
                    EtudeTitre::create($etudeTitreData);
                }
            }

            return response()->json([
                'status'=>'success',
                'message' => 'Personne créée avec succès!'
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
}
