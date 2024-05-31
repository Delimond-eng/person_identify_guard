<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\Conjoint;
use App\Models\Enfant;
use App\Models\EtudeTitre;
use App\Models\FamilleCharge;
use App\Models\Personne;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PersonneIDGuardController extends Controller
{
    /**
     * Permet de creer une personne dans le systeme
     * @param StorePersonRequest $request
     * @return JsonResponse
     */
    public function createPerson(StorePersonRequest $request): RedirectResponse
    {
        try {
            // Valide les données entrées
            $data = $request->validated();

            // Génère l'ID National
            $data['idnat'] = $this->generateIdnat();

            // Gère le téléchargement de la photo
            if ($request->hasFile('photo')) {
                $domain = $request->getHttpHost();
                $image = $request->file('photo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/persons'), $imageName);
                $data['photo'] = 'http://' . $domain . '/uploads/persons/' . $imageName;
            }

            // Création de la personne
            $personne = Personne::create($data);

            // Gestion des conjoints
            if ($request->has('conjoints')) {
                foreach ($request->input('conjoints') as $conjointData) {
                    if (!empty($conjointData['conjoint_nom']) && !empty($conjointData['conjoint_date_naissance'])) {
                        $conjointData['personne_id'] = $personne->id;
                        Conjoint::create($conjointData);
                    }
                }
            }

            // Gestion des enfants
            if ($request->has('enfants')) {
                foreach ($request->input('enfants') as $enfantData) {
                    if (!empty($enfantData['eft_nom']) && !empty($enfantData['eft_date_naissance'])) {
                        $enfantData['personne_id'] = $personne->id;
                        Enfant::create($enfantData);
                    }
                }
            }

            // Gestion des membres de la famille sous tutelle
            if ($request->has('famille_charges')) {
                foreach ($request->input('famille_charges') as $familleChargeData) {
                    if (!empty($familleChargeData['nom_membre_famille']) && !empty($familleChargeData['lien_parent'])) {
                        $familleChargeData['personne_id'] = $personne->id;
                        FamilleCharge::create($familleChargeData);
                    }
                }
            }

            // Gestion des titres académiques
            if ($request->has('etude_titres')) {
                foreach ($request->input('etude_titres') as $etudeTitreData) {
                    if (!empty($etudeTitreData['titre_libelle']) && !empty($etudeTitreData['titre_date_obtention'])) {
                        $etudeTitreData['personne_id'] = $personne->id;
                        EtudeTitre::create($etudeTitreData);
                    }
                }
            }

        return redirect()->back()->with('success', 'Personne créée avec succès, le numéro d\'identification est :'.$personne->idnat);

        } catch (ValidationException $e) {
            return redirect()->back()->with(['errors' => $e->validator->errors()->all()]);
        } catch (\Illuminate\Database\QueryException | \ErrorException $e) {
            return redirect()->back()->with(['errors' => [$e->getMessage()]])->withInput();
        }
    }


    private function generateIdnat()
    {
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
    }

}