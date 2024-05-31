<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photo'=>'required|file',
            'nom' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:1',
            'etat_civil' => 'required|string|in:celibataire,marié,divorcé,veuf',
            'adresse' => 'required|string|max:255',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string',
            'nbre_personne_famille' => 'nullable|integer',
            'province_id' => 'required|exists:provinces,id',
            'territoire_id' => 'required|exists:territoires,id',
            'secteur_id' => 'required|exists:secteurs,id',
            'chefferie_id' => 'required|exists:chefferies,id',
            'niveau_etude' => 'nullable|string',
            'profession' => 'nullable|string',
            'profession_institution' => 'nullable|string|max:255',
            'nationalite' => 'nullable|string',

            /*'conjoints' => 'required_if:etat_civil,marié|array',
            'conjoints.*.conjoint_nom' => 'required_with:conjoints|string|max:255',
            'conjoints.*.conjoint_date_naissance' => 'required_with:conjoints|date',

            'enfants' => 'nullable|array',
            'enfants.*.eft_nom' => 'required_with:enfants|string|max:255',
            'enfants.*.eft_date_naissance' => 'required_with:enfants|date',

            'famille_charges' => 'nullable|array',
            'famille_charges.*.nom_membre_famille' => 'required_with:famille_charges|string|max:255',
            'famille_charges.*.lien_parent' => 'required_with:famille_charges|string|max:255',

            'etude_titres' => 'nullable|array',
            'etude_titres.*.titre_libelle' => 'required_with:etude_titres|string|max:255',
            'etude_titres.*.titre_date_obtention' => 'required_with:etude_titres|date',*/
        ];
    }
}